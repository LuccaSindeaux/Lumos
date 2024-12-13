<?php  
    include 'functions.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aviso</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0px;
            font-family: Helvetica, sans-serif;
        }
        body {
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            color: #222;
            margin-bottom: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }
        button:hover {
            background-color: #EA9B33;
            transform: translateY(-7px);
            box-shadow: 0px 15px 20px #05103079;
        }
    </style>
</head>
<body>
<header class='header'>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="pageadmin.php" class='navitem'>Págin inicial admin</a></li>
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Excluir Aluno</a></li>
                <li class="nave" id="login"><a href="editaradmin.php" class='navitem'>Editar Aluno</a></li>
                <li class="nave" id="login"><a href="resultadmin.php" class='navitem'>Listar Alunos</a></li>
                <li class="nave" id="login"><a href="addadmin.php" class='navitem'>Adicionar Aluno</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
        </nav>
    </header>
    <h1>Adicionar Aviso</h1>
    <form action="avisosadmin.php" method="POST">
        <label for="id_aluno">ID do Aluno:</label>
        <input type="text" name="id_aluno" id="id_aluno" required>

        <label for="aviso">Aviso:</label>
        <textarea name="aviso" id="aviso" required></textarea>

        <button type="submit">Enviar Aviso</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_aluno = $_POST['id_aluno'];
        $aviso = $_POST['aviso'];

        adicionarAviso($connect, $id_aluno, $aviso);

    }
    ?>
</body>
</html>