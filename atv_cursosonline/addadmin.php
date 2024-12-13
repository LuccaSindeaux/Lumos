<?php
session_start();
require "functions.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    insertUserAdmin($connect); // Executa antes de enviar o HTML
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionando Aluno</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class='header'>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="pageadmin.php" class='navitem'>Págin inicial admin</a></li>
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Excluir Aluno</a></li>
                <li class="nave" id="login"><a href="editaradmin.php" class='navitem'>Editar Aluno</a></li>
                <li class="nave" id="login"><a href="resultadmin.php" class='navitem'>Listar Alunos</a></li>
                <li class="nave" id="login"><a href="avisosadmin.php" class='navitem'>Criar Aviso</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
        </nav>
    </header>

    <h1 class='welcome'>Insira os dados do aluno que será adicionado.</h1>
        

    <div class='formularioCadastro'>
            <form action="" method="post">
                <input type="text" name="nome" placeholder="Nome do aluno" required><br>
                <input type="text" name="email" placeholder="E-Mail do aluno" required><br>
                <input type="password" name="senha" placeholder="Senha" required><br>
                <input type="password" name="confirmar_senha" placeholder="Confirmar enha" required><br>
                <input type="submit" name="cadastrar" value="Cadastrar" class='button'>
            </form>
        </div>
</body>
</html>