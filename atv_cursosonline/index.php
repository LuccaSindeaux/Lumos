<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Lumos Cursos Online</title>
</head>
<body>
    <!-- HEADER COM NAVEGAÇÃO -->
    <header class='header'>
        <nav>
            <ul class='navlist'>
                <li class="nave"><a href="#sobre" class='navitem'>Sobre nós</a></li>
                <li class="nave"><a href="paginacursos1.php" class='navitem'>Conferir cursos</a></li>
                <li class="nave" id="login"><a href="login.php" class='navitem'>Fazer Login</a></li>
            </ul>
        </nav>
    </header>
    <!-- BEM VINDO AO SITE -->
    <main> <!--Parte principal da página-->
        <section id="cursos">
            <h1 class='welcome'>Bem-vindo à Lumos Cursos Online</h1>
            <p class='explore'>Explore nossos cursos de programação para elevar suas habilidades!</p>
            <div class='buttoncur'>
                <a href="paginacursos1.php"class='contentcur'>Conferir cursos</a>
            </div>
        </section>
    </main>
    <!-- CONFERIR CURSOS SEM MUDAR DE PÁGINA -->
    <section>
        <div class='nosso'>
            <h2 class='conf'>Nossos Cursos</h2>
            <p class='confe'>Confira nossa seleção de cursos de programação</p>
            <div class='buttoncur' id='saibamais'>
                <a href="#"class='contentcur'>Saiba mais</a>
            </div>
        </div>
    </section>
    <!-- MOSTRANDO TODOS OS CURSOS -->
    <section class='cursos'>
        <div class="curso">
            <h2>Curso de HTML e CSS</h2>
                <p class='cursotexto'>Aprenda os fundamentos para criar websites incríveis.</p>
        </div>
        <div class="curso">
            <h2>Curso de JavaScript</h2>
            <p class='cursotexto'>Domine a lógica e os fundamentos da programação web.</p>
        </div>
        <div class="curso">
            <h2>Curso de Python</h2>
            <p class='cursotexto'>Masterize a lingugaem de programção em ascensão no mercado.</p>
        </div>
    </section>

    <section id="sobre">
        <h2>Sobre Nós</h2>
        <p>A Lumos é uma plataforma dedicada a oferecer cursos online de programação de alta qualidade.</p>

    <footer id="contato">
        <h2>Fale Conosco</h2>
        <p>Email: contato@lumos.com | Telefone: (51) 90000-0000</p>
        <p>&copy; 2024 Lumos Cursos Online LTDA. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
