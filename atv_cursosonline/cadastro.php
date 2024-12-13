<?php
session_start();
require "functions.php";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Primeiro, insere o usuário no banco de dados e obtém o ID do aluno
    $id_aluno = insertUser($connect);

    if ($id_aluno) {
        // Depois de cadastrar o usuário, processa o upload da foto
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/'; // Diretório onde as fotos serão salvas
            $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
            $fileName = basename($_FILES['profile_picture']['name']);
            $fileSize = $_FILES['profile_picture']['size'];
            $fileType = mime_content_type($fileTmpPath);

            // Verifica o tipo do arquivo
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/jfif', 'image/webp'];
            if (!in_array($fileType, $allowedTypes)) {
                echo 'Erro: Tipo de arquivo não suportado.';
            } elseif ($fileSize > 2 * 1024 * 1024) {
                echo 'Erro: O arquivo excede o tamanho permitido de 2MB.';
            } else {
                // Gera um nome único para o arquivo
                $newFileName = $id_aluno . '_' . uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                $destPath = $uploadDir . $newFileName;

                // Move o arquivo para o diretório de upload
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    // Atualiza o caminho da foto no banco de dados
                    updateUserPhoto($connect, $id_aluno, $newFileName);
                    echo 'Cadastro e foto enviados com sucesso!';

                    // Redireciona para a página cadastrologout.php após o cadastro e upload da foto
                    header("Location: cadastrologout.php");
                    exit(); // Garantir que o código não continue executando após o redirecionamento
                } else {
                    echo 'Erro ao mover o arquivo.';
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastro Lumos</title>
</head>
<body class='adminbody'>
    <!-- HEADER COM NAVEGAÇÃO -->
    <header>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="#sobre" class='navitem'>Sobre nós</a></li>
                <li class="nave"><a href="paginacursos1.php" class='navitem'>Conferir cursos</a></li>
                <li class="nave"><a href="index.php" class='navitem'>Página Inicial</a></li>
            </ul>
        </nav>
    </header>

    <h1 class='welcome'>Faça seu cadastro na Lumos!</h1>
    <p class='cadastroInstruction'>Digite abaixo seu nome com sobrenome, seu email e crie uma senha.</p>

    <div class='formularioCadastro'>
        <!-- FORMULÁRIO PARA INSERIR USUÁRIO E UPLOAD DA FOTO -->
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="nome" placeholder="Seu Nome" required><br>
            <input type="text" name="email" placeholder="Seu E-Mail" required><br>
            <input type="password" name="senha" placeholder="Sua Senha" required><br>
            <input type="password" name="confirmar_senha" placeholder="Confirme sua Senha" required><br>
            <label for="profile_picture">Escolha uma foto:</label><br>
            <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required><br><br>
            <input type="submit" name="cadastrar" value="Cadastrar" class='button'>
            <a href="login.php" class='footlink'>Já possui cadastro?</a>
        </form>
    </div>

</body>
</html>
