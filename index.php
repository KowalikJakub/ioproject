<?php 
    require "./application/application.php";
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
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="public/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="public/css/style.css" rel="stylesheet">
    <!-- Semantic-UI-->
    <link rel="stylesheet" href="public/semantic-ui/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="public/semantic-ui/semantic.min.js"></script>
    <script>
        function sendFilters(){
            // dodanie 5 ukrytych inputów w formularza, celem których jest przesłanie danych o poszczególnych kryteriach
            if( $(".search-filtry").is(':visible')){
                var possibleRates = ["salaryRate", "atmosphereRate", "benefitsRate", "workplaceRate", "contractRate"];
                
                possibleRates.forEach(function(element, index, array){
                    var lght = document.getElementById(element).getElementsByClassName("active").length;
                    document.getElementById("toSend").innerHTML+="<input type='hidden' name='" + element +"' value='" + lght + "'/>"
                });
            }
        }

    </script>

</head>

<body>

    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">

        <a class="navbar-brand" href="index.php">
            <img src="public/img/logo.png" class="logo-pracodawcy" alt="logo">&nbsp;&nbsp;&nbsp;Baza ocen pracodawców</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="views/top100.php">Top 100</a>
                </li>
            </ul>
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
                        <a class="dropdown-item" href="views/konto.php">Moje konto</a>
                        <a class="dropdown-item" href="views/oceny.php">Wystaw oceny</a>
                        <a class="dropdown-item" href="./application/controllers/logout.php">Wyloguj</a>
                    </div>
                    <!-- else -->
                    <?php
                    }else{
                    ?>
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> Profil </a>
                    <!--Jeśli user się nie zalogował -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="views/login.php">Zaloguj się</a>
                    </div>
                    <?php
                    }
                    ?>

                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="search-container">
            <!-- tutaj modal albo coś ale ostylować to -->
            <!-- modale x jakis dodać żeby dało się zamknąć to albo żeby znikało-->
            <!-- najlepiej jak by wpadł jakiś skrypt javascript -->
            <!--  -->
            <?php 
            if(isset($_GET['login'])){
                if($_GET['login'] == "success"){
                    echo '<div class="alert alert-success">
                    <strong>Pomyślnie zalogowano!</strong>
                  </div>';
                }
                if($_GET['login'] == "logout"){
                    echo '<div class="alert alert-success">
                    <strong>Wylogowano!</strong>
                  </div>';
                }
            }
            ?>
      
            <div class="md-form mt-0">

                <form action="./views/employer.php" method="GET">
                    <input name="searchEmployer" class="form-control mr-sm-2" type="text" placeholder="Wyszukaj pracodawców..." aria-label="Search"/>
                    <div id="toSend"></div>
                    <button class="ui primary button" onclick="sendFilters();">Szukaj</button>
                 </form>


                <div class="ui toggle checkbox">
                    <input type="checkbox" id="checkedFiltry" name="public">
                    <label class="grey-text">Pokaż filtry</label>
                </div>
            </div>
            <div class="search-filtry">
                <div class="card">
                    <div class="card-body">
                        <div class="row-filter">
                            <p class="card-text">Wynagrodzenia</p>
                            <div class="ui star rating" id="salaryRate" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Atmosfera</p>
                            <div class="ui star rating" id="atmosphereRate" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Benefity</p>
                            <div class="ui star rating"  id="benefitsRate" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Miejsce pracy</p>
                            <div class="ui star rating" id="workplaceRate" data-rating="3" data-max-rating="5"></div>
                        </div>
                        <div class="row-filter">
                            <p class="card-text">Umowa o prace</p>
                            <div class="ui star rating" id="contractRate" data-rating="3" data-max-rating="5"></div>
                            <script>
                                $('.ui.rating')
                                    .rating();
                            </script>
                        </div>
                    </div>
                </div>
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
        <script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="public/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="public/js/mdb.min.js"></script>
        <script> 
        $(function () { 
            $(".search-filtry").toggle(); 
            $("#checkedFiltry").click(function () { $(".search-filtry").toggle(this.checked) }); 
        }); 
    </script> 
</body>

</html>