<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/phpmailer/PHPMailer.php";
require __DIR__ . "/phpmailer/SMTP.php";
require __DIR__ . "/phpmailer/Exception.php";

require_once __DIR__ . "/db.php"; // crea $pdo

function clean(string $v): string
{
  return trim(str_replace(["\r", "\n"], " ", $v));
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: ../contacto.php?err=method");
  exit;
}


$nombre   = clean($_POST["nombre"] ?? "");
$email    = clean($_POST["email"] ?? "");
$telefono = clean($_POST["telefono"] ?? "");
$servicio = clean($_POST["servicio"] ?? "");
$mensaje  = trim($_POST["mensaje"] ?? "");

if ($nombre === "" || $email === "" || $telefono === "" || $servicio === "" || $mensaje === "") {
  header("Location: ../contacto.php?err=campos");
  exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../contacto.php?err=email");
  exit;
}

/* 1) GUARDAR SIEMPRE EN BD (ANTES del SMTP) */
$stmt = $pdo->prepare("
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

/* 2) CONFIG SMTP */
$cfg = require "C:/xampp/secure/msi_mail.php";

$smtpHost = $cfg["SMTP_HOST"] ?? "";
$smtpPort = (int)($cfg["SMTP_PORT"] ?? 0);
$smtpUser = $cfg["SMTP_USER"] ?? "";
$smtpPass = $cfg["SMTP_PASS"] ?? "";
$destino  = ($cfg["SMTP_TO"] ?? "") ?: $smtpUser;

if ($smtpHost === "" || $smtpPort === 0 || $smtpUser === "" || $smtpPass === "") {
  header("Location: ../contacto.php?err=smtp");
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

  $mail->Body = "
    <h2>Nueva solicitud de cotización</h2>
    <p><b>Nombre:</b> {$nombre}</p>
    <p><b>Email:</b> {$email}</p>
    <p><b>Teléfono:</b> {$telefono}</p>
    <p><b>Servicio:</b> {$servicio}</p>
    <hr>
    <p><b>Mensaje:</b></p>
    <p>{$safeMensaje}</p>
  ";

  $mail->AltBody =
    "Nombre: $nombre\nEmail: $email\nTeléfono: $telefono\nServicio: $servicio\n\nMensaje:\n$mensaje";

  $mail->send();

  header("Location: ../contacto.php?ok=1");
  exit;
} catch (Exception $e) {
  header("Location: ../contacto.php?err=mail");
  exit;
}
