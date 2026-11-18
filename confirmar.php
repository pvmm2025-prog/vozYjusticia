<?php
require 'config/conexion.php';
require 'config/funciones.php';

$d = $_SESSION['d'] ?? [];

if (empty($d['municipio']) || mb_strlen($d['relato'] ?? '') < 15) {
    header('Location: presentar-denuncia.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf();

    $folio = 'VJ-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));

    // Generar 3 caracteres aleatorios
    $caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $sufijo = '';

    for ($i = 0; $i < 3; $i++) {
        $sufijo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
    }

    // Crear un único código de seguimiento
    $secret = $folio . '-' . $sufijo;
    

    $s = $pdo->prepare("
        INSERT INTO denuncias (
            folio, secreto_hash, anonima, nombre, correo, municipio,
            localidad, fecha_hechos, lugar, tipo_persona, ambito,
            institucion, persona, pista, clasificacion, relato,
            evidencia, archivo, estatus, fecha_registro
        ) VALUES (
            ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?,
            ?, ?, 'Recibida', NOW()
        )
    ");

    $s->execute([
        $folio,
        password_hash($secret, PASSWORD_DEFAULT),
        (int)($d['anonima'] ?? 1),
        $d['nombre'] ?? null,
        $d['correo'] ?? null,
        $d['municipio'],
        $d['localidad'] ?? null,
        $d['fecha_hechos'] ?: null,
        $d['lugar'] ?? null,
        $d['tipo_persona'] ?? null,
        $d['ambito'] ?? null,
        $d['institucion'] ?? null,
        $d['persona'] ?? null,
        $d['pista'] ?? null,
        $d['clasificacion'] ?? null,
        $d['relato'],
        $d['evidencia'] ?? null,
        $d['archivo'] ?? null,
    ]);

    $_SESSION['receipt'] = [$folio, $secret];
    unset($_SESSION['d']);

    header('Location: comprobante.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Confirmar</title>
</head>
<body>
    <main class="form">
        <section class="panel">
            <small>REVISIÓN FINAL</small>
            <h1>Confirmar envío</h1>

            <p><b>Municipio:</b> <?= e($d['municipio']) ?></p>
            <p><b>Clasificación:</b> <?= e($d['clasificacion'] ?? 'Sin clasificar') ?></p>
            <p><b>Relato:</b> <?= e(mb_substr($d['relato'], 0, 300)) ?></p>

            <form method="post">
                <input type="hidden" name="csrf" value="<?= e(token()) ?>">

                <label class="choice">
                    <input type="checkbox" required>
                    Confirmo que la información es verídica según mi conocimiento.
                </label>

                <div class="actions">
                    <a class="btn alt" href="presentar-denuncia.php?paso=5">Regresar</a>
                    <button class="btn">Confirmar y enviar</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>