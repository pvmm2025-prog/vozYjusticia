VOZ Y JUSTICIA - PROTOTIPO LOCAL PHP + MYSQL

1. Copia la carpeta voz-y-justicia en C:\xampp\htdocs\
2. Inicia Apache y MySQL en XAMPP.
3. Entra a http://localhost/phpmyadmin e importa database/voz_justicia.sql
4. Revisa config/conexion.php (root sin contraseña es el valor inicial común de XAMPP).
5. Abre http://localhost/voz-y-justicia/setup-admin.php UNA SOLA VEZ para crear el administrador.
6. Elimina setup-admin.php después de ejecutarlo.
7. Entra a http://localhost/voz-y-justicia/

ADMIN DEMO
Correo: admin@vozyjusticia.local
Contraseña: DemoVJ2026!

Incluye registro de denuncia de cinco pasos, anónima/no anónima, folio, secreto, consulta de estatus, login institucional, dashboard y actualización de estatus.
La contraseña del administrador y el secreto se almacenan mediante password_hash. Los archivos admitidos son PDF/JPG/PNG hasta 5 MB.
El selector Náhuatl es una preparación visual: los textos requieren validación por hablantes de Náhuatl de Morelos. SpeechSynthesis ofrece lectura en español disponible en el navegador, no traducción al Náhuatl.
Usar exclusivamente con datos ficticios. No desplegar públicamente ni recibir denuncias reales.
