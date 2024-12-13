<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class='header'>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="pageadmin.php" class='navitem'>Págin inicial admin</a></li>
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Excluir Aluno</a></li>
                <li class="nave" id="login"><a href="addadmin.php" class='navitem'>Adicionar Aluno</a></li>
                <li class="nave" id="login"><a href="editaradmin.php" class='navitem'>Editar Aluno</a></li>
                <li class="nave" id="login"><a href="avisosadmin.php" class='navitem'>Criar Aviso</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <?php
        include 'functions.php';

        // Verifica a conexão com o banco de dados
        if (!$connect) {
            die("Falha na conexão: " . mysqli_connect_error());
        }
        
        $alunos = obterDadosAlunos($connect);
        ?>
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
    <footer>
    <ul class='navlist'>
                <li class="nave"><a href="#pageadmin.php" class='navitem'>Págin inicial admin</a></li>
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Excluir Aluno</a></li>
                <li class="nave" id="login"><a href="addadmin.php" class='navitem'>Adicionar Aluno</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
    </footer>
</body>
</html>
