<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    require_once "configuracoes.php";

    function logout() {
        setcookie("loggedin", '', time() - 3600, '/'); 
        setcookie("name", '', time() - 3600, '/'); 
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["logout"])) {
        logout();
}

    if (!isset($_COOKIE["loggedin"]) || $_COOKIE["loggedin"] !== "true") {
        header("Location: login.php");
        exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../CSS/stylesConta.css" rel="stylesheet">
    <link href="../CSS/stylesFooter.css" rel="stylesheet">
    <link href="../CSS/stylesNav.css" rel="stylesheet">
</head>
<body>
<div class="pushFooter">
<!-- NAV ABAIXO -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img src="../IMG/logoTipo.png" alt="" width=200 height=50><a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../HTML/Home.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/DentroDoEstadoSP.html">São Paulo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/DentroDoEstadoRJ.html">Rio de Janeiro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/DentroDoEstadoMG.html">Minas Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/sobrenos.html">Sobre nós</a>
                </li>
                <div class="inNav"> 
                    <a href="site.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16" id="navImg">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    </nav>

<!-- NAV ACIMA -->

<!-- CONTEÚDO AQUI -->



<div class="painel">
    
      <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16" id="imgPainel">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
      </svg>
      <h1>Bem vindo, <?php echo $_COOKIE["name"]; ?></h1>
      <a href="../HTML/Home.html"><p>Ver opções de pousadas</p></a>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="logout" value="Sair da conta">
      </form>
  </div>

<!-- CONTEÚDO AQUI -->
 


<!-- FOOTER ABAIXO -->
</div> <!-- FECHA O PUSH FOOTER -->

<div class="container my-5">
    <footer class="text-center text-lg-start text-white" style="background-color: #45526e">
        <div class="container p-4 pb-0">
            <section class="">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                        Pousei
                        </h6>
                        <p>
                            A Pousei te ajuda a escolher a pousada ideal para você com base nas suas necessidades
                        </p>
                    </div>
                    <hr class="w-100 clearfix d-md-none" />
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Links</h6>
                        <p>
                            <a class="text-white" href="../HTML/Home.html">Home</a>
                        </p>
                        <p>
                            <a class="text-white" href="../HTML/sobrenos.html">Sobre nós</a>
                        </p>
                    </div>

                    <hr class="w-100 clearfix d-md-none" />

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            Pousadas
                        </h6>
                        <p>
                            <a class="text-white" href="../HTML/DentroDoEstadoSP.html">São Paulo</a>
                        </p>
                        <p>
                            <a class="text-white" href="../HTML/DentroDoEstadoRJ.html">Rio de Janeiro</a>
                        </p>
                        <p>
                            <a class="text-white" href="../HTML/DentroDoEstadoMG.html">Minas Gerais</a>
                        </p>
                    </div>

                    <hr class="w-100 clearfix d-md-none" />

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contato</h6>
                        <p><i class="fas fa-home mr-3"></i> São Paulo, SP 12345, BR</p>
                        <p><i class="fas fa-envelope mr-3"></i> pouseipousadas@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> +55 (11) 91234-6578</p>
                    </div>
                </div>
            </section>
            <hr class="my-3">

            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">

                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <div class="p-3">
                            © 2024 Copyright:
                            <a class="text-white" href="../HTML/Home.html">
                                Pousei.com
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </footer>
</div>
<!-- FOOTER ACIMA -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
