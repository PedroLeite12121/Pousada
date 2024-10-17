<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"] === "true") {
        header("Location: site.php");
        exit;
    }

    require_once "configuracoes.php";

    //analisa se o metodo utilizado é o post (sempre será)
    if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email =  htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
        

        //analisando se o email bate com algum registro
        $sql = "SELECT * FROM usuarios where email = ?";

        //criptografa os dados
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        //pega o resultado da consulta, analisa se existe algum 
        $result = $stmt->get_result();
        if($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            //se existe algum, verifica se a senha bate
            if(password_verify($password, $row['senha'])) {
                setcookie("loggedin", "true", time() + 3600, "/");
                $name = $row['nome'];
                setcookie("name", $name, time() + 3600, "/");
                
               header("Location: site.php"); 
               exit;

                exit;
            }
            else{
                $_SESSION['credInvalidas'] = "Senha inválida";
                header("Location: login.php");
                exit;
            }
        }
        else{
            $_SESSION['credInvalidas'] = "Email inválido";
            header("Location: login.php");
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/mensagemErro.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/stylesLoginCadastro.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
    if (isset($_SESSION['credInvalidas'])) {
        echo "<script> 
            window.onload = function() {
                const mensagem = document.querySelector('.mensagemErro');
                mensagem.textContent = '" . $_SESSION['credInvalidas'] . "';
                mensagem.style.display = 'flex';
                mensagem.classList.add('slideIn');
                console.log('Email já cadastrado.'); 
                setTimeout(() => {
                mensagem.style.display = 'none';
            }, 3000);
            };
        </script>";
        unset($_SESSION['credInvalidas']);
    }
    ?>

    <div id="painel">
        <form action="login.php" method="post">
            <h1>LOGIN</h1>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            <a href="cadastro.php" id="cad">Realizar cadastro</a>
            <input type="submit" value="Entrar">
        </form>
    </div>

    <div class="mensagemErro"></div>

    <a href="../HTML/Home.html" id="bootstrap"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="orange" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/> </svg> </a>
    

</body>
</html>
