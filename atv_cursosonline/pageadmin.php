<?php
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['nome']) && $_SESSION['tipo_usuario'] != 'admin') {
    // Se não estiver logado como admin, redireciona para o login
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administração</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="logout.php" class="button" id='exit'>Sair</a>
    <div class="container">
        <h1>Página de Administração</h1>
        <p>Bem-vindo, <?php echo $_SESSION['nome']; ?>! Aqui você pode gerenciar os alunos.</p>
        <div class="button-container">
            <a href="resultadmin.php" class="button">Alunos</a>
            <a href="excluiradmin.php" class="button">Excluir</a>
            <a href="editaradmin.php" class="button">Editar</a>
            <a href="addadmin.php" class="button">Adicionar</a>
            <a href="avisosadmin.php" class="button">Avisos</a>
        </div>
    </div>

</body>
</html>
