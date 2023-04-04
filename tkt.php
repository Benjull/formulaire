<!DOCTYPE html>
<html lang="fr">

<?php

// Initialiser la session
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion


?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <script src="./dvdco2.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./style2.css">
</head>

<body>
    <div class="container">
        <div class="content-parent">
            <div class="content">
                <h1>Choisissez votre livre parmis notre catalogue !</h1>
                <h1>Bienvenue <?php echo $_SESSION['user']['username']; ?>!</h1>
                <p>Plus de 1000 choix ! </p>
            </div>
            <div class="buttons" id="mid">
                <div class="regis">
                    <a href="http://localhost/Register/utilisateur.php"><Button class="Regi" type="Register">Utilisateur</Button></a>

                    <?php if($_SESSION['user']['username']) :?>
                        <a href="http://localhost/Register/logout.php"><Button type="Register">Logout</Button></a>
                    <?php else : ?>
                        <a href="http://localhost/Register/register.php"><Button type="Register">Register</Button></a>
                        <a href="http://localhost/register/login.php"><Button type="Register">Login</Button></a>
                    <?php endif; ?>
                </div>
                <a><input type="text" name="" id="search"></a>
                <a><Button type="submit" class="submit">Chercher</Button></a><a href="./Favoris.php"><Button type="submit" class="submit">Favoris</Button></a>
            </div>
            <ul class="list"></ul>
        </div>
    </div>
    <div class="main"></div>
</html>