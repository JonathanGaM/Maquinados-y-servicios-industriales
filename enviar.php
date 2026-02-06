<?php
declare(strict_types=1);

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: /contacto.php?err=method');
  exit;
}

// Ejecuta el handler real (protegido)
require_once __DIR__ . '/includes/mail/send_mail.php';