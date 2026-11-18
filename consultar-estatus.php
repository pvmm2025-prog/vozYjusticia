<?php
require 'config/funciones.php';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Consultar estatus</title>
</head>
<body>
    <main class="form">
        <section class="panel">
            <small>SEGUIMIENTO CONFIDENCIAL</small>
            <h1>Consulta tu denuncia</h1>

            <form method="post" action="seguimiento/consultar.php">
                <input type="hidden" name="csrf"
                    value="<?=e(token())?>">

                <label>
                    Código de seguimiento
                    <input
                        name="codigo"
                        placeholder="VJ-20261117-A4B2C1-K7M"
                        required
                    >
                </label>

                <button class="btn">
                    Consultar mi denuncia
                </button>
            </form>
        </section>
    </main>
</body>
</html>