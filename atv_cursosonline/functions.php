<?php

$server = "localhost";
$userdb = "root";
$passdb = "";
$namedb = "cursolumus";
$connect = mysqli_connect($server, $userdb, $passdb, $namedb);

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Erro ao conectar ao banco de dados: " . $e->getMessage());
// }

function insertUser($connect) {
    if (isset($_POST['cadastrar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        // Verificando se as senhas são iguais
        if ($_POST['senha'] !== $_POST['confirmar_senha']) {
            echo "As senhas digitadas não são as mesmas.";
            return null;  // Retorna null caso as senhas não coincidam
        }
        
        // Validando e inserção no banco
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if (!$email) {
            echo "E-mail inválido.";
            return null;
        }

        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $email = mysqli_real_escape_string($connect, $email);
        $senha = sha1($_POST['senha']);
        $query = "INSERT INTO alunos(nome, email, senha) VALUES('$nome', '$email', '$senha')";
        $execute = mysqli_query($connect, $query);

        if ($execute) {
            $id_aluno = mysqli_insert_id($connect); // Obtém o ID do aluno inserido
            return $id_aluno;  // Retorna o ID do aluno inserido
        } else {
            echo "Erro ao inserir usuário: ". mysqli_error($connect);
            return null;
        }
    }
    return null;  // Se não for enviado o formulário
}



//INSERINDO USUÁRIO COMO ADMIN
function insertUserAdmin($connect){
    if (isset($_POST['cadastrar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        // Verificando se as senhas são iguais
        if ($_POST['senha'] !== $_POST['confirmar_senha']) {
            echo "As senhas digitadas não são as mesmas.";
            return;
        }
        
        // Validando e inserção no banco
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if (!$email) {
            echo "E-mail inválido.";
            return;
        }

        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $email = mysqli_real_escape_string($connect, $email);
        $senha = sha1($_POST['senha']);
        $query = "INSERT INTO alunos(nome, email, senha) VALUES('$nome', '$email', '$senha')";
        $execute = mysqli_query($connect, $query);

        if ($execute) {
            header("location: pageadmin.php");
            exit();
        } else {
            echo "Erro ao inserir usuário: ". mysqli_error($connect);
        }
    }
}

function logar($connect) {
    if (isset($_POST['logar'])) {
        $erros = array();
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $senha = sha1($_POST['senha']);
        $tipo_usuario = $_POST['tipo_usuario'];

        // Verificando se email e senha foram preenchidos
        if (empty($email) && empty($senha)) {
            $erros[] = 'E-mail ou senha estão incorretos.';
        }

        // Se não houver erros, prosseguir com a validação
        if (empty($erros)) {
            // Se for aluno
            if ($tipo_usuario == 'aluno') {
                $query = "SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'";
            } 
            // Se for administrador
            else if ($tipo_usuario == 'admin') {
                $query = "SELECT * FROM administradores WHERE email = '$email' AND senha = '$senha'";
            } else {
                $erros[] = "Tipo de usuário inválido.";
            }

            // Se o tipo de usuário for válido e a consulta retornar algum resultado
            if (empty($erros)) {
                $action = mysqli_query($connect, $query);
                $result = mysqli_fetch_assoc($action);

                // Se o usuário for encontrado no banco de dados
                if (!empty($result['email'])) {
                    session_start();
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['nome'] = $result['nome'];
                    $_SESSION['foto'] = $result['foto'] ?? null;
                    $_SESSION['id_aluno'] = $result['id_aluno'];
                    $_SESSION['ativa'] = true;
                    // Definindo tipo de usuário na sessão
                    $_SESSION['tipo_usuario'] = $tipo_usuario;

                    // Redirecionamento com base no tipo de usuário
                    if ($tipo_usuario == 'aluno') {
                        header("location: aluno.php"); // Redireciona para a página do aluno
                    } else {
                        header("location: pageadmin.php"); // Redireciona para a página do administrador
                    }
                    exit();
                } else {
                    echo "E-mail ou senha incorretos.";
                }
            } else {
                // Exibe erros, caso o tipo de usuário seja inválido
                foreach ($erros as $erro) {
                    echo $erro . "<br>";
                }
            }
        } // Se houver erros, exibe mensagem
    }
}

function obterDadosAlunos($connect) {
    // Consulta SQL para buscar os dados
    $sql = 'SELECT id_aluno, nome, email, senha FROM alunos';

    // Executar a consulta e buscar os resultados
    $result = mysqli_query($connect, $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Erro ao buscar dados: " . mysqli_error($connect);
        return [];
    }
}

if (!$connect) {
    die("Falha na conexão: " . mysqli_connect_error());
}

//EXCLUIR O ALUNO POR ID
if (!$connect) {
    die("Falha na conexão: " . mysqli_connect_error());
}

                // VERSÃO NOVA DE BUSCAR ALUNO, AGORA POR ID E NOME
function obterAlunoPorID($connect, $id_aluno) {
    if (is_numeric($id_aluno)) {
        // Se for numérico, busca pelo ID
        $sql = 'SELECT id_aluno, nome, email FROM alunos WHERE id_aluno = ?';
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_aluno);
    } else {
        // Se não for numérico, busca pelo nome (parcial)
        $sql = 'SELECT id_aluno, nome, email FROM alunos WHERE nome LIKE ?';
        $stmt = mysqli_prepare($connect, $sql);
        $search_name = "%$id_aluno%"; // Adiciona os percentuais para busca parcial
        mysqli_stmt_bind_param($stmt, "s", $search_name);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function atualizarAluno($connect, $id_aluno, $nome, $email, $senha, $foto = null) {
    $sql = 'UPDATE alunos SET nome = ?, email = ?, senha = ?';
    
    // Se uma foto for fornecida, adiciona a atualização da foto
    if ($foto) {
        $sql .= ', foto = ?';
    }
    
    $sql .= ' WHERE id_aluno = ?';
    $stmt = mysqli_prepare($connect, $sql);
    $senha_encriptada = sha1($senha);

    // Se foto for fornecida, bind a foto também
    if ($foto) {
        mysqli_stmt_bind_param($stmt, "ssssi", $nome, $email, $senha_encriptada, $foto, $id_aluno);
    } else {
        mysqli_stmt_bind_param($stmt, "sssi", $nome, $email, $senha_encriptada, $id_aluno);
    }

    return mysqli_stmt_execute($stmt);
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function senhasIguais($senha, $confirmar_senha) {
    return $senha === $confirmar_senha;
}

function camposPreenchidos($nome, $email, $senha, $confirmar_senha) {
    return !empty($nome) and !empty($email) and !empty($senha) and !empty($confirmar_senha);
}

//FUNÇÃO DE UPLOAD DE IMAGENS
function updateUserPhoto($connect, $id_aluno, $fileName) {
    // Preparar a consulta SQL para atualizar o caminho da foto
    $query = "UPDATE alunos SET foto = ? WHERE id_aluno = ?";
    
    // Preparar a consulta e bind dos parâmetros
    $stmt = mysqli_prepare($connect, $query);
    if (!$stmt) {
        echo "Erro ao preparar a consulta: " . mysqli_error($connect);
        return false;
    }
    
    // Bind dos parâmetros: nome da foto e id do aluno
    mysqli_stmt_bind_param($stmt, "si", $fileName, $id_aluno);
    
    // Executar a consulta e verificar se foi bem-sucedida
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo "Erro ao atualizar a foto: " . mysqli_error($connect);
        return false;
    }
}

//AVISOS
function adicionarAviso($connect, $id_aluno, $aviso) {
    $sql = "UPDATE alunos SET avisos = ? WHERE id_aluno = ?";
    $stmt = mysqli_prepare($connect, $sql);
    
    if (!$stmt) {
        echo "Erro ao preparar a consulta: " . mysqli_error($connect);
        return false;
    }
    
    mysqli_stmt_bind_param($stmt, "si", $aviso, $id_aluno);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Aviso adicionado com sucesso!";
        return true;
    } else {
        echo "Erro ao adicionar aviso: " . mysqli_error($connect);
        return false;
    }
}

function buscarAvisos($connect, $id_aluno) {
    $sql = "SELECT avisos FROM alunos WHERE id_aluno = ?";
    $stmt = mysqli_prepare($connect, $sql);
    
    if (!$stmt) {
        echo "Erro ao preparar a consulta: " . mysqli_error($connect);
        return null;
    }
    
    mysqli_stmt_bind_param($stmt, "i", $id_aluno);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['avisos'];
    } else {
        return "Nenhum aviso encontrado.";
    }
}



?>


