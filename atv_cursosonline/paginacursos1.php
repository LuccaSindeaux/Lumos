<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cursos</title>
    <style>
        
.title {
    width: 520px;
    position: relative;
    line-height: 48px;
    display: inline-block;
}
.descricao {
    width: 520px;
    position: relative;
    font-size: 16px;
    line-height: 24px;
    display: inline-block;
}
.container {
display: flex;
flex-wrap: wrap;
justify-content: center;
align-items: center;
gap: 20px;
padding: 20px;
}
.section {
    align-self: stretch;
    background-color: rgba(0, 0, 0, 0.6);
    overflow: hidden;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 60px 170px;
    position: relative;
    gap: 60px;
    z-index: 0;
    color: #fff;
}
.container1 {
    align-self: stretch;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    gap: 24px;
    z-index: 0;
    font-size: 40px;
}
.imagemCurso {
    position: absolute;
    width: calc(100% - 32px);
    top: calc(50% - 8px);
    left: 16px;
    line-height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 16px;
}
.dificuldadeCurso {
    position: relative;
    line-height: 16px;
    font-weight: 500;
}
.tag {
    position: absolute;
    top: 0px;
    left: 0px;
    border-radius: 6px 0px 6px 0px;
    background-color: rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 4px 8px;
    text-align: left;
}
.imagem {
    align-self: stretch;
    flex: 1;
    position: relative;
    background-color: rgba(217, 217, 217, 0.5);
}
.imagem-container {
    align-self: stretch;
    height: 340px;
    overflow: hidden;
    flex-shrink: 0;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: flex-start;
}
.tituloCurso{
    align-self: stretch;
    position: relative;
    line-height: 30px;
    font-weight: 750;
    font-size: 24px;
}
.descricaoCurso {
    font-size: 20px;
    line-height: 28px;
    
}
.text-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    padding: 12px;
    gap: 4px;
    text-align: left;
    font-size: 16px;
    height: justify;
}

.card {
    flex: 1;
    border-radius: 6px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: space-between;
    justify-content: flex-start;
}
.row {
    align-self: stretch;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: flex-start;
    gap: 40px;
}
.item{
    align-self: stretch;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 1;
}
.products {
    align-self: stretch;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 170px;
    position: relative;
    gap: 60px;
    z-index: 1;
    font-size: 12px;
}
.footer {
    display: flex;
    justify-content: center;     
    align-items: center;
    gap: 16px;
    padding: 60px;
    background-color: #ffffff;
    color: #000000;
}
.titulo-footer {
    font-size: 20px;
    line-height: 36px;
    font-weight: 500;
    text-align: center;
    margin: 0;
    display: inline-block;
    padding: 10px;
}
.direitos {
    text-align: center;
    font-size: 20px;
    color: #000000;
    line-height: 36px;
}
.LOGO {
    flex: 1;
    position: relative;
    line-height: 36px;
    font-weight: 500;
}
.tab {
    position: relative;
    line-height: 24px;
}
.navigation {
    background-color: #fff;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 40px;
    font-size: 16px;
}
.top-bar {
    width: 100%;
    margin: 0 !important;
    position: absolute;
    top: -0.5px;
    right: 0.5px;
    left: -0.5px;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.12);
    background-color: #fff;
    height: 80px;
    overflow: hidden;
    flex-shrink: 0;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 20px;
    box-sizing: border-box;
    gap: 20px;
    z-index: 3;
    text-align: left;
    font-size: 28px;
}
.pagina-cursos {
    width: 100%;
    position: relative;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: space-between;
    justify-content: flex-start;
    padding: 80px 0px 0px;
    box-sizing: border-box;
    text-align: center;
    font-size: 40px;
    color: #000;
    font-family: Sans-Serif;
}
.tituloSite {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="top-bar">
    <div class="LOGO">LOGO</div>
    <div class="navigation">
        	<div class="tab">Login</div>
        	<div class="tab">Sobre Nós</div>
        	<div class="tab">Contatos</div>
    </div>
</div>
  	<div class="pagina-cursos">
    		<div class="section">
      			<div class="tituloSite">
        				<b class="title">Lumos Cursos Online</b>
        				<div class="descricao">Explore nossos cursos de programação para elevar suas habilidades!</div>
      			</div>
    		</div>
    		<div class="products">
      			<div class="container1">
        				<b class="title">Catálogo de Cursos:</b> <!-- <b>só deixa em negrito o texto, sem nenhuma outra função...</b> -->
      			</div>
      			<div class="item">
        				<div class="row">
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 1</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Iniciante</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Curso de HTML e CSS</div>
              							<div class="descricaoCurso">Aprenda a construir sites modernos e responsivos com os fundamentos do HTML5 e CSS3. Este curso ensina desde a criação de estruturas básicas de páginas até o design visual utilizando estilos avançados. Ideal para quem está começando na programação e quer dar os primeiros passos no desenvolvimento web.</div>
            						</div>
          					</div>
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 2</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Intermediário</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Curso de JavaScript</div>
              							<div class="descricaoCurso">Descubra como adicionar interatividade e dinamismo às suas páginas web com JavaScript. Este curso aborda desde conceitos fundamentais, como variáveis e funções, até a manipulação do DOM e criação de eventos. Prepare-se para criar experiências envolventes para os usuários.</div>
            						</div>
          					</div>
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 3</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Básico</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Curso de Python</div>
              							<div class="descricaoCurso">Domine uma das linguagens de programação mais populares do mundo! Este curso explora os fundamentos do Python, incluindo sintaxe, estruturas de controle e manipulação de dados, além de introduzir bibliotecas essenciais para automação e desenvolvimento de projetos.</div>
            						</div>
          					</div>
        				</div>
      			</div>
      			<div class="item">
        				<div class="row">
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 4</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Intermediário</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Desenvolvimento de Aplicações com PHP</div>
              							<div class="descricaoCurso">Aprenda a criar aplicações web dinâmicas utilizando PHP e conecte seus projetos a bancos de dados MySQL.</div>
            						</div>
          					</div>
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 5</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Básico</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Fundamentos de Banco de Dados com SQL</div>
              							<div class="descricaoCurso">Domine os conceitos básicos de SQL e aprenda a gerenciar dados de forma eficiente em sistemas relacionais.</div>
            						</div>
          					</div>
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 6</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Avançado</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Estruturas de Dados e Algoritmos</div>
              							<div class="descricaoCurso">Entenda os fundamentos de algoritmos e estruturas de dados, essenciais para resolver problemas computacionais.</div>
            						</div>
          					</div>
        				</div>
      			</div>
      			<div class="item">
        				<div class="row">
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 7</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Intermediário</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Desenvolvimento Mobile com React Native</div>
              							<div class="descricaoCurso">Crie aplicativos móveis nativos para Android e iOS utilizando a poderosa biblioteca React Native.</div>
            						</div>
          					</div>
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem">
                								<div class="imagemCurso">Imagem do Curso 8</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Avançado</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Introdução ao Machine Learning</div>
              							<div class="descricaoCurso">Explore o mundo da inteligência artificial e aprenda a criar modelos básicos de machine learning com Python.</div>
            						</div>
          					</div>
          					<div class="card">
            						<div class="imagem-container">
              							<div class="imagem  ">
                								<div class="imagemCurso">Imagem do Curso 9</div>
                								<div class="tag">
                  									<div class="dificuldadeCurso">Intermediário</div>
                								</div>
              							</div>
            						</div>
            						<div class="text-content">
              							<div class="tituloCurso">Segurança em Aplicações Web</div>
              							<div class="descricaoCurso">Proteja seus projetos aprendendo as melhores práticas de segurança para aplicações web.</div>
            						</div>
          					</div>
        				</div>
      			</div>
    		</div>
    		<div class="footer">
      			<div>
        			<div class="titulo-footer">Fale Conosco</div>
        			<div class="titulo-footer">Sobre nós</div>
        			<div class="titulo-footer">Fazer Login</div>
        			<div class="direitos">© 2024 Lumos Cursos Online LTDA. Todos os direitos reservados.</div>
      			</div>
    		</div>
  	</div>
</body>
</html>