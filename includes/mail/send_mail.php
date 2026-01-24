<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer (igual que tú)
require __DIR__ . "/../vendor/phpmailer/PHPMailer.php";
require __DIR__ . "/../vendor/phpmailer/SMTP.php";
require __DIR__ . "/../vendor/phpmailer/Exception.php";

// BD + helpers safe
require_once __DIR__ . "/../core/db.php";       // define $pdo (o null si falla)
require_once __DIR__ . "/../core/db-safe.php";  // db_ok()

function clean(string $v): string {
  return trim(str_replace(["\r", "\n"], " ", $v));
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: /webMSI/contacto.php?err=method");
  exit;
}

$nombre   = clean($_POST["nombre"] ?? "");
$email    = clean($_POST["email"] ?? "");
$telefono = clean($_POST["telefono"] ?? "");
$servicio = clean($_POST["servicio"] ?? "");
$mensaje  = trim($_POST["mensaje"] ?? "");

if ($nombre === "" || $email === "" || $telefono === "" || $servicio === "" || $mensaje === "") {
  header("Location: /webMSI/contacto.php?err=campos");
  exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: /webMSI/contacto.php?err=email");
  exit;
}

// -------------------------------
// 1) Intentar guardar en BD (solo si hay conexión)
// -------------------------------
$bd_ok = false;

if (db_ok()) {
  try {
    // ✅ tu INSERT original, SIN cambiar tabla/columnas
    $stmt = $GLOBALS["pdo"]->prepare("
      INSERT INTO contactos (nombre, email, telefono, servicio, mensaje)
      VALUES (:nombre, :email, :telefono, :servicio, :mensaje)
    ");
    $stmt->execute([
      ":nombre"   => $nombre,
      ":email"    => $email,
      ":telefono" => $telefono,
      ":servicio" => $servicio,
      ":mensaje"  => $mensaje
    ]);

    $bd_ok = true;
  } catch (Throwable $e) {
    // BD falló: no rompemos el flujo, solo marcamos false
    $bd_ok = false;
  }
}

// -------------------------------
// 2) Enviar correo (independiente de la BD)
// -------------------------------
$mail_ok = false;

$cfg = require "C:/xampp/secure/msi_mail.php";

$smtpHost = $cfg["SMTP_HOST"] ?? "";
$smtpPort = (int)($cfg["SMTP_PORT"] ?? 0);
$smtpUser = $cfg["SMTP_USER"] ?? "";
$smtpPass = $cfg["SMTP_PASS"] ?? "";
$destino  = ($cfg["SMTP_TO"] ?? "") ?: $smtpUser;

if ($smtpHost === "" || $smtpPort === 0 || $smtpUser === "" || $smtpPass === "") {
  // Si config SMTP está mal, igual puede haber BD guardada -> decide con fallback
  if ($bd_ok) {
    header("Location: /webMSI/contacto.php?ok=1");
    exit;
  }
  header("Location: /webMSI/contacto.php?err=smtp");
  exit;
}

$mail = new PHPMailer(true);

try {
  $mail->isSMTP();
  $mail->Host = $smtpHost;
  $mail->SMTPAuth = true;
  $mail->Username = $smtpUser;
  $mail->Password = $smtpPass;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port = $smtpPort;

  $mail->SMTPOptions = [
    'ssl' => [
      'verify_peer'       => false,
      'verify_peer_name'  => false,
      'allow_self_signed' => true,
    ],
  ];

  $mail->setFrom($smtpUser, "MSI Maquinados y Servicios Industriales Web");
  $mail->addAddress($destino, "MSI Ventas");
  $mail->addReplyTo($email, $nombre);

  $mail->CharSet = "UTF-8";
  $mail->isHTML(true);

  $mail->Subject = "Nueva solicitud de cotización - $servicio";

  $safeMensaje = nl2br(htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8"));
  $safeNombre  = htmlspecialchars($nombre, ENT_QUOTES, "UTF-8");
  $safeEmail   = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
  $safeTel     = htmlspecialchars($telefono, ENT_QUOTES, "UTF-8");
  $safeServ    = htmlspecialchars($servicio, ENT_QUOTES, "UTF-8");

  $mail->Body = "
    <h2>Nueva solicitud de cotización</h2>
    <p><b>Nombre:</b> {$safeNombre}</p>
    <p><b>Email:</b> {$safeEmail}</p>
    <p><b>Teléfono:</b> {$safeTel}</p>
    <p><b>Servicio:</b> {$safeServ}</p>
    <hr>
    <p><b>Mensaje:</b></p>
    <p>{$safeMensaje}</p>
  ";

  $mail->AltBody =
    "Nombre: $nombre\nEmail: $email\nTeléfono: $telefono\nServicio: $servicio\n\nMensaje:\n$mensaje";

  $mail->send();
  $mail_ok = true;

} catch (Exception $e) {
  $mail_ok = false;
}

// -------------------------------
// 3) Resultado final (cualquiera de las 2 basta)
// -------------------------------
if ($mail_ok || $bd_ok) {
  header("Location: /webMSI/contacto.php?ok=1");
  exit;
}

// Si ambas fallaron:
header("Location: /webMSI/contacto.php?err=mail");
exit;
