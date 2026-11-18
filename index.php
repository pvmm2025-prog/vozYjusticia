<?php
require 'config/funciones.php';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Voz y Justicia</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <a class="brand" href="index.php"><b>VJ</b> Voz y Justicia</a>
        <div>
            <select id="idioma">
                <option>Español</option>
                <option>Náhuatl de Morelos</option>
            </select>
            <button id="a11y">A+</button>
        </div>
    </header>

    <main class="wrap">
        <section class="hero">
            <div>
                <small>PLATAFORMA PÚBLICA · MORELOS, MÉXICO</small>
                <h1>Voz y  <em>Justicia.</em></h1>
                <p>Un espacio accesible y confidencial para presentar denuncias, consultar su seguimiento y conocer información pública.</p>

                <a class="btn" href="presentar-denuncia.php">Presentar denuncia →</a>
                <a class="btn alt" href="consultar-estatus.php">Consultar estatus</a>

                <p>◈ Puedes presentar una denuncia de forma anónima.</p>
            </div>

            <div class="visual">
                <div class="glass">
                    <b><img src="imagen1.png" alt="imagen1.png" width="200" height="200" sizes="auto, (max-width: 30em) 100vw, (max-width: 50em) 50vw, calc(33vw - 100px)" ></b>
                    <h2>Tu voz importa</h2>
                    <p>Escuchamos. Registramos. Damos seguimiento.</p>
                </div>
            </div>
        </section>

        <h2 class="center">¿Qué deseas hacer?</h2>

        <section class="cards">
            <a href="presentar-denuncia.php">
                <b class="bubble">＋</b>
                <h3>Presentar denuncia</h3>
                <p>Cuéntanos qué sucedió mediante un formulario guiado.</p>
                <strong>Comenzar →</strong>
            </a>

            <a href="consultar-estatus.php">
                <b class="bubble purple">⌕</b>
                <h3>Consultar estatus</h3>
                <p>Revisa el avance con tu folio y secreto de seguimiento.</p>
                <strong>Consultar →</strong>
            </a>

            <a href="estadisticas.php">
                <b class="bubble gold">▥</b>
                <h3>Estadísticas</h3>
                <p>Consulta indicadores generales de esta demostración.</p>
                <strong>Ver estadísticas →</strong>
            </a>
        </section>

        <section class="band">
            <div>
                <small>UN ESPACIO PARA TODAS LAS VOCES</small>
                <h2>Accesible, claro e incluyente.</h2>
                <p>Navegación sencilla, lectura de voz y experiencia adaptable.</p>
            </div>

            <div>
                <button class="btn" id="leer">▶ Leer contenido</button>
                <button class="btn alt" id="stop">■ Detener</button>
                <p><a href="admin/login.php">Acceso institucional</a></p>
            </div>
        </section>
    </main>

    <footer>© <?= date('Y') ?> Voz y Justicia · Prototipo local</footer>
    <script src="assets/js/app.js"></script>
</body>
</html>