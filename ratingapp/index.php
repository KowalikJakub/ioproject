<?php 
    require "./application/application.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <!-- tu login -->
        <br/> Zwykłe logowanie
        <form action="">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="password" placeholder="password">
            <button>Login</button>
        </form>

<!-- tu pierwsze logowanie -->
<br>Pierwsze logowanie. np:
<form action="">
    <input type="text" name="login" placeholder="Imię">
    <input type="text" name="nazwisko" placeholder="Nazwisko">
    <input type="text" name="pesel" placeholder="PESEL">
    <input type="password" name="PWD1" placeholder="Hasło">
    <input type="password" name="PWD2" placeholder="Powtórz hasło">
    <button>Rejestracja</button>
</form>
    </div>
</body>
</html>
