<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base?>"><h1 class=logo-h1>SIRS</h1></a>
        </div>
    </header>
    <section class="container main">
        <form class="cadastrar" method="POST" action="<?=$base;?>/signup_action.php">
            <?php if(!empty($_SESSION['flash'])): ?>
                <?=$_SESSION['flash'];?>
                <?=$_SESSION['flash'] = '';?>   
            <?php endif; ?>

            <input placeholder="Digite seu Nome Completo" class="input" type="text" name="name" />

            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua senha" class="input" type="password" name="password" />

            <input placeholder="Digite sua Data de Nascimento" class="input" type="text" name="data_nasc" id="data_nasc" />

            <input placeholder="Digite seu Telefone " class="input" type="text" name="telefone" id="telefone" />

            <input class="button" type="submit" value="Fazer Cadastro" />

            <a class="cadas" href="<?=$base;?>/login.php">Já tem uma conta? Faça login </a>
        </form>
    </section>

    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(
            document.getElementById("data_nasc"),
            {mask:'00/00/0000'}      
            );
        IMask(
            document.getElementById("telefone"),
            {mask:'(00) 0000-00009'} 
        );  
    </script>    
</body>
</html>