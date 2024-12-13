<?php
include 'functions.php'; // Incluindo o arquivo que contém as funções

$aluno = null;
$message = "";

if (isset($_POST['buscar'])) {
    $id_aluno = $_POST['id_aluno'];
    $aluno = obterAlunoPorID($connect, $id_aluno);
    if (!$aluno) {
        $message = "Aluno com ID $id_aluno não encontrado.";
    }
}

if (isset($_POST['atualizar'])) {
    $id_aluno = $_POST['id_aluno'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    
    if (!camposPreenchidos($nome, $email, $senha, $confirmar_senha)) {
        $message = "Todos os campos devem ser preenchidos.";
    } elseif (!validarEmail($email)) {
        $message = "E-mail inválido.";
    } elseif (!senhasIguais($senha, $confirmar_senha)) {
        $message = "As senhas digitadas não são as mesmas.";
    } else {
        if (atualizarAluno($connect, $id_aluno, $nome, $email, $senha)) {
            $message = "Aluno atualizado com sucesso!";
        } else {
            $message = "Erro ao atualizar aluno: " . mysqli_error($connect);
        }
    }
}
// PERMITINDO MUDAR FOTO DO USUÁRIO
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/'; // Diretório onde as fotos serão salvas
    $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
    $fileName = basename($_FILES['profile_picture']['name']);
    $fileSize = $_FILES['profile_picture']['size'];
    $fileType = mime_content_type($fileTmpPath);

    // Verifica tipo de arquivo
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
    if (!in_array($fileType, $allowedTypes)) {
        $message = 'Erro: Tipo de arquivo não suportado.';
    } elseif ($fileSize > 2 * 1024 * 1024) {  // Verifica tamanho
        $message = 'Erro: O arquivo excede o tamanho permitido de 2MB.';
    } else {
        $newFileName = $id_aluno . '_' . uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $destPath = $uploadDir . $newFileName;

        // Move o arquivo para o diretório 'uploads'
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Atualiza a foto no banco de dados
            if (atualizarAluno($connect, $id_aluno, $nome, $email, $senha, $newFileName)) {
                $message = 'Foto atualizada com sucesso!';
            } else {
                $message = 'Erro ao atualizar a foto.';
            }
        } else {
            $message = 'Erro ao mover o arquivo.';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Excluir Aluno</a></li>
                <li class="nave" id="login"><a href="addadmin.php" class='navitem'>Adicionar Aluno</a></li>
                <li class="nave" id="login"><a href="resultadmin.php" class='navitem'>Listar Alunos</a></li>
                <li class="nave" id="login"><a href="avisosadmin.php" class='navitem'>Criar Aviso</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="editmenu">
        <h1>Editar Aluno</h1>
        
        <form action="" method="post">
            <label for="id_aluno">Digite o ID ou nome do aluno:</label>
            <input type="text" name="id_aluno" id="id_aluno" required>
            <input type="submit" name="buscar" value="Buscar">
        </form>
        
        <?php if ($aluno) { ?>
        <h2>Editando informações de: <?php echo htmlspecialchars($aluno['nome']); ?></h2><br>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_aluno" value="<?php echo htmlspecialchars($aluno['id_aluno']); ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($aluno['email']);?>" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha" required>

            <!-- ESPAÇO PARA UPLOAD DE FOTO -->
            <label for="profile_picture">Escolher nova foto:</label>
            <input type="file" name="profile_picture" id="profile_picture" accept="image/*"><br><br>

            <input type="submit" name="atualizar" value="Atualizar">
        </form>
        <?php } ?>

        <?php if ($message) { ?>
        <div class="alert <?php echo strpos($message, 'sucesso') !== false ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
        <?php } ?>
    </div>
    <footer>
    <ul class='navlist'>
                <li class="nave"><a href="pageadmin.php" class='navitem'>Págin inicial admin</a></li>
                <li class="nave"><a href="excluiradmin.php" class='navitem'>Excluir Aluno</a></li>
                <li class="nave" id="login"><a href="addadmin.php" class='navitem'>Adicionar Aluno</a></li>
                <li class="nave" id="login"><a href="resultadmin.php" class='navitem'>Listar Aluno</a></li>
                <li class="nave" id="login"><a href="avisosadmin.php" class='navitem'>Criar Aviso</a></li>
                <li class="nave" id="login"><a href="logout.php" class='navitem'>Sair</a></li>
            </ul>
    </footer>
</body>
</html>