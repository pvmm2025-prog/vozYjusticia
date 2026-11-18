<?php
require 'config/funciones.php';

$r = $_SESSION['receipt'] ?? null;

if (!$r) {
    header('Location: index.php');
    exit;
}

unset($_SESSION['receipt']);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Denuncia recibida</title>
</head>
<body>
    <main class="form">
        <section class="panel center">
            <div class="success">✓</div>
            <small>DENUNCIA RECIBIDA</small>
            <h1>Tu voz ha sido registrada.</h1>
            <p>Guarda ambos datos: el secreto solo se muestra una vez.</p>

            <div class="secret">
                <small>GUARDA TU CÓDIGO DE SEGUIMIENTO</small>

                <strong><?=e($r[1])?></strong>

                <button class="btn alt copy">
                    Copiar código
                </button>
            </div>

            <a class="btn" href="consultar-estatus.php">Consultar estatus</a>
        </section>
    </main>
    <script src="assets/js/app.js"></script>
</body>
</html>