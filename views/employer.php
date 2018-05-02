<?php 
    require "../application/application.php";
    Sessions::startSession();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Strona główna</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../public/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../public/css/style.css" rel="stylesheet">
</head>

<body>

    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
        <a class="navbar-brand" href="../index.php">
            <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Baza ocen pracodawców</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-inline">
                        <div class="md-form mt-0">
                            <form action="../../application/controllers/search.php" method="GET">
                                <input name="searchEmployer" class="form-control mr-sm-2" type="text" placeholder="Wyszukaj pracodawców..." aria-label="Search">
                            </form>
                        </div>
                    </form>
                </li>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <?php
                        if(Sessions::isLogged()){

                    ?>
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <?php  echo Sessions::getLogin();?> </a>
                        <!-- wstawka php sprawdza czy zalogowany -->
   
                    <!--Jeśli user jest zalogowany -->
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="konto.php">Moje konto</a>
                        <a class="dropdown-item" href="oceny.php">Wystaw oceny</a>
                        <a class="dropdown-item" href="../application/controllers/logout.php">Wyloguj</a>
                    </div>
                    <!-- else -->
                    <?php
                    }else{
                    ?>
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> Profil </a>
                    <!--Jeśli user się nie zalogował -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="login.php">Zaloguj się</a>
                    </div>
                    <?php
                    }
                    ?>

                </li>
            </ul>
            </ul>
        </div>
    </nav>
    <!--/.Navbar -->

    <div class="container">
        <h5>Opis firmy</h5>
        <?php 
            $temp = new searchEngine();
            if(isset($_GET['id'])){
            $empName = $temp->searchById($_GET['id']);
            $idEmp = $_GET['id'];
            }
            if(isset($_GET['searchEmployer'])){
            $empName = $_GET['searchEmployer'];
            $empDesc = $temp->search($empName);
            $idEmp = $empDesc['ID'];
            }
            $empDesc = $temp->search($empName);
            
            echo $empDesc['nazwa_firmy']." ".$empDesc['opis'];
            $temp->formatEmployer($empName);
            
        ?>
        <h4>Komentarze</h4>
        <div id="commentsContainer">

        </div>

    </div>

    <!--Footer-->
    <footer class="page-footer font-small mdb-color lighten-3 pt-1 mt-1">

        <!--Footer Links-->
        <div class="container text-center text-md-left">
            <div class="row">

                <!--Dodać tu coś-->
            
            </div>
        </div>
        <!--/.Footer Links-->
        <!--Copyright-->
        <div class="footer-copyright py-3 text-center">
            © 2018 Copyright:
            <a href="https://github.com/KowalikJakub/ioproject"> Inżynieria Oprogramowania - Projekt Oceny Pracodawców</a>
        </div>
        <!--/.Copyright-->
    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../public/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../public/js/mdb.min.js"></script>

    <script type="text/javascript" src="getComments.js"></script>
                
    <?php 
            $getComments = new searchEngine();
            echo '
            <script>         
            getComments('.json_encode($getComments->convertToJSON($idEmp,"employer")).');
            </script>
            ';
   
    ?>
</body>

</html>
