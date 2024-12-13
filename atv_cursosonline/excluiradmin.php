<?php
include 'functions.php'; // Incluindo o arquivo que contém as funções

if (isset($_POST['excluir'])) {
    $id_aluno = $_POST['id_aluno'];
    $aluno = obterAlunoPorID($connect, $id_aluno);

    if ($aluno) {
        $sql = "DELETE FROM alunos WHERE id_aluno = ?";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_aluno);
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='alert success'>Aluno excluído com sucesso!</div>";
        } else {
            echo "<div class='alert error'>Erro ao excluir aluno: " . mysqli_error($connect) . "</div>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class='alert error'>Aluno com ID $id_aluno não encontrado.</div>";
    }
}

$alunos = [];
if (isset($_POST['mostrar_tabela'])) {
    $alunos = obterDadosAlunos($connect);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<header class='header'>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="pageadmin.php" class='navitem'>Págin inicial admin</a></li>
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Editar Aluno</a></li>
                <li class="nave" id="login"><a href="addadmin.php" class='navitem'>Adicionar Aluno</a></li>
                <li class="nave" id="login"><a href="avisosadmin.php" class='navitem'>Criar Aviso</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="form-container">
        <h1>Excluir Aluno</h1>
        <form action="" method="post">
            <label for="id_aluno">Digite o ID do aluno:</label>
            <input type="text" name="id_aluno" id="id_aluno" required>
            <input type="submit" name="excluir" value="Excluir">
        </form>
    
        <form action="" method="post">
            <input type="submit" name="mostrar_tabela" value="Mostrar Tabela de Alunos">
        </form>
    </div>

    <?php if (!empty($alunos)) { ?>
        <div class="tablecontainer">
            <!--COMEÇO TABELA-->
            <h1>Lista de Alunos</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($alunos as $aluno) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($aluno['id_aluno']) . "</td>";
                        echo "<td>" . htmlspecialchars($aluno['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($aluno['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($aluno['senha']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <footer>
    <ul class='navlist'>
                <li class="nave"><a href="pageadmin.php" class='navitem'>Págin inicial admin</a></li>
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Editar Aluno</a></li>
                <li class="nave" id="login"><a href="addadmin.php" class='navitem'>Adicionar Aluno</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
    </footer>
</body>
</html>
