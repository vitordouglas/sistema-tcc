<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

echo 'Aqui é a Página do Index.php';
?>