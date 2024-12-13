<?php

session_start();
session_unset();
//encerra a sessão
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro realizado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="#sobre" class='navitem'>Sobre nós</a></li>
                <li class="nave"><a href="#cursos" class='navitem'>Nossos cursos</a></li>
                <li class="nave" id="login"><a href="index.php" class='navitem'>Página Inicial</a></li>
            </ul>
        </nav>
    </header>
    <div class='logoutcard'>
    <h1 class='logtitle'>Cadastro realizado com sucesso!</h1>
        <a href="index.php" class='loglink' id='link1lout'>Página inicial</a>
        <a href="aluno.php" class='loglink'>Acessar cursos</a>
    </div>
</body>
</html>