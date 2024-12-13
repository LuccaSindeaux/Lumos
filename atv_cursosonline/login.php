<?php require "functions.php";?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Lumos Login</title>
</head>
<body>
<header>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="#sobre" class='navitem'>Sobre nós</a></li>
                <li class="nave"><a href="paginacursos1.php" class='navitem'>Conferir cursos</a></li>
                <li class="nave" id="login"><a href="index.php" class='navitem'>Página Inicial</a></li>
            </ul>
        </nav>
    </header>
    <h1 class='welcome'>Digite seus E-mail e senha:</h1>
    <?php logar($connect); ?>
    <div class='formularioCadastro'>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Digite seu E-mail para Login." required><br>
            <input type="password" name="senha" placeholder="Digite a sua Senha." required><br>
            <!-- TIPO DE USUÁRIO: ALUNO OU ADM -->
            <select name="tipo_usuario" required>
                <option value="aluno">Aluno</option>
                <option value="admin">Administrador</option>
            </select>
            <input type="submit" name="logar" value="Login">
        </form>
    </div>

    <p class="textofoot"> Não possui cadastro?
        <a href="cadastro.php" class="navitem">Clique aqui!</a>
    </p>

</body>
</html>