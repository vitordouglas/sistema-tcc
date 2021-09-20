<?php
require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$telefone = filter_input(INPUT_POST, 'telefone');
$data_nasc = filter_input(INPUT_POST, 'data_nasc'); //00/00/0000

if($name && $email && $password && $telefone && $data_nasc) {

    $auth = new Auth($pdo, $base);

    $data_nasc = explode('/', $data_nasc);
    if(count($data_nasc) !=3) {
        $_SESSION['flash'] = 'Data de Nascimento inválida!';
        header("Location: ".$base."/signup.php");
        exit;
    }

    $data_nasc = $data_nasc[2].'-'.$data_nasc[1].'-'.$data_nasc[0];
    if(strtotime($data_nasc) === false) {
        $_SESSION['flash'] = 'Data de Nascimento inválida!';
        header("Location: ".$base."/signup.php");
        exit;
    }

    if($auth->emailExists($email) === false) {

       $auth->registerUser($name, $email, $password, $telefone, $data_nasc); 
       header("Location: ".$base);
       exit;

    } else {
        $_SESSION['flash'] ='E-mail já cadastrado!';
    header("Location: ".$base."/signup.php");
    exit;
    }

}

$_SESSION['flash'] ='Preencha todos os campos!';
header("Location: ".$base."/signup.php");
exit;