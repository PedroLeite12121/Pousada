<?php
     if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_COOKIE["loggedin"]) && $_COOKIE["loggedin"] === "true") {
        header("Location: site.php");
        exit;
    }

    require_once "configuracoes.php";


    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = $_POST['password'];


        //armazena a senha de forma segura
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $checkEmailSQL = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($checkEmailSQL);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $_SESSION['errorD'] = "Email já cadastrado.";
            header("Location: cadastro.php"); 
            exit; 
        } else {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if($stmt->execute()) {
               setcookie("loggedin", "true", time() + 3600, "/");
               setcookie("name", $name, time() + 3600, "/");

               header("Location: site.php"); 
               exit;
                
            }
            else {
                $_SESSION['error'] = "Erro desconhecido";
                header("Location: cadastro.php"); 
                exit;
            }

            $stmt->close();
        }
        
    }
    $conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../CSS/mensagemErro.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/stylesLoginCadastro.css?v=<?php echo time(); ?>">
</head>
<body>

<?php
    if (isset($_SESSION['errorD'])) {
        echo "<script> 
            window.onload = function() {
                const mensagem = document.querySelector('.mensagemErro');
                mensagem.textContent = '" . $_SESSION['errorD'] . "';
                mensagem.style.display = 'flex';
                mensagem.classList.add('slideIn');
                setTimeout(() => {
                mensagem.style.display = 'none';
            }, 3000);
            };
        </script>";
        unset($_SESSION['errorD']);
    } else if (isset($_SESSION['error'])) {
        echo "<script> 
            window.onload = function() {
                const mensagem = document.querySelector('.mensagemErro');
                mensagem.textContent = '" . $_SESSION['error'] . "';
                mensagem.style.display = 'flex';
                mensagem.classList.add('slideIn');
                setTimeout(() => {
                mensagem.style.display = 'none';
            }, 3000);
            };
        </script>";
        unset($_SESSION['error']);
    }
    ?>

    <section id="painel">
        
        <form action="cadastro.php" method="POST"> 
            <h1>CADASTRO</h1>
            <input type="text" name="name" placeholder="Usuário" required>
            <input type="email" name ="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <a href="login.php" id="cad">Realizar login</a>
            <input type="submit" value="Cadastrar">
        </form>
    </section>

    <div class="mensagemErro"></div>
    
    <a href="../HTML/Home.html" id="bootstrap">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="orange" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/> 
        </svg> 
    </a>
</body>
</html>
