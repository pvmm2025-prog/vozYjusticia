<?php
if(session_status()!==PHP_SESSION_ACTIVE)session_start();
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8');}
function token(){if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function csrf(){if($_SERVER['REQUEST_METHOD']==='POST'&&!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??'')){http_response_code(419);exit('Sesión vencida.');}}
function admin(){if(empty($_SESSION['admin'])){header('Location: login.php');exit;}}
