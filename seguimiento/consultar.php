<?php
require '../config/conexion.php';
require '../config/funciones.php';

csrf();

// Recibir código completo
$codigo = strtoupper(trim($_POST['codigo'] ?? ''));

// Separar folio y caracteres adicionales
if (!preg_match('/^(.+)-([A-Z0-9]{3})$/', $codigo, $partes)) {
    exit('Código de seguimiento incorrecto.');
}

$folio = $partes[1];

// Buscar denuncia
$q = $pdo->prepare(
    "SELECT folio, secreto_hash, estatus,
    fecha_registro, nota_publica
    FROM denuncias WHERE folio = ?"
);

$q->execute([$folio]);
$d = $q->fetch();

// Verificar código completo
if (!$d || !password_verify($codigo, $d['secreto_hash'])) {
    exit('Código incorrecto. Verifica tus datos.');
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <title>Seguimiento</title>
</head>
<body>
    <main class="form">
        <section class="panel">
            <small>ESTATUS</small>
            <h1><?= e($d['estatus']) ?></h1>

            <p>Folio: <?= e($d['folio']) ?></p>
            <p>Fecha de registro: <?= e($d['fecha_registro']) ?></p>
            <p><?= e($d['nota_publica'] ?: 'Tu denuncia fue recibida y está registrada.') ?></p>

            <a class="btn" href="../index.php">Inicio</a>
        </section>
    </main>
</body>
</html>