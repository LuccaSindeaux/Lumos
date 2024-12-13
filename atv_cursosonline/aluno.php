<?php
session_start();
require_once 'functions.php'; // Inclui o arquivo com as funções

if (!isset($_SESSION['email']) || !isset($_SESSION['nome']) || !isset($_SESSION['id_aluno']) || $_SESSION['tipo_usuario'] != 'aluno') {
    // Se não estiver logado como aluno, redireciona para o login
    header("location: login.php");
    exit;
}

// Obtendo o ID do aluno da sessão
$id_aluno = $_SESSION['id_aluno']; // Certifique-se de que o id_aluno está armazenado na sessão

// Obtendo os avisos do banco de dados
$avisos = buscarAvisos($connect, $id_aluno);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .alunoEmail{
            text-align: right;
            font-size: 20px;
    }
        .alunoWelcome{
        text-align: center;
        margin: 12%;
        font-size: 42px;
    }
        .profilePic {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-left: 45%;
        margin-top: 8%;
    }

    </style>
</head>
<body>
<header>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="#sobre" class='navitem'>Sobre nós</a></li>
                <li class="nave"><a href="paginacursos1.php" class='navitem'>Conferir cursos</a></li>
                <li class="nave" id="logout"><a href="logout.php" class='navitem'>Fazer logout</a></li>
            </ul>
        </nav>
    </header>

    <p class='alunoEmail'>Logou com: <?php echo $_SESSION['email']; ?></p>

    <img 
    src="<?php echo isset($_SESSION['foto']) && !empty($_SESSION['foto']) ? 'uploads/' . htmlspecialchars($_SESSION['foto']) : 'uploads/default.png'; ?>" 
    alt="Foto do aluno" 
    class="profilePic">

    <h1 class='alunoWelcome'>Bem vindo <?php echo $_SESSION['nome']; ?>!</h1>

    <h2>Seus avisos:</h2>
    <p>
        <?php
        if (!isset($avisos) || empty($avisos)) {
            echo "Nenhum aviso.";
        } else {
            echo htmlspecialchars($avisos);
        }
        ?>
    </p>
</body>
</html>