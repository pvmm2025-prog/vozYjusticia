<?php
require 'config/conexion.php';
$email='admin@vozyjusticia.local';$hash=password_hash('DemoVJ2026!',PASSWORD_DEFAULT);
$q=$pdo->prepare("INSERT INTO usuarios(nombre,email,password_hash,rol) VALUES('Administrador de demostración',?,?, 'admin') ON DUPLICATE KEY UPDATE password_hash=VALUES(password_hash),activo=1");
$q->execute([$email,$hash]);echo 'Administrador de demostración creado. Elimina setup-admin.php ahora. Correo: '.$email.' Contraseña: DemoVJ2026!';
