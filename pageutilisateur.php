<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
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
    <link rel="stylesheet" href="./Style3.css">
</head>

<body>



  


   


        <div class="container">
            <div class="content-parent">
                <div class="content">
                    <h1>Consultez vos données utilisateurs</h1>
                    
                </div>
                <div class="buttons" id="mid">
                    <div class="regis">
                    
                    
                        <a href="http://localhost/Register/tkt.php"><Button type="Register" >Home</Button></a>
                        
                    </div>
                    
                </div>
                <ul class="list"></ul>
            </div>
        </div>
        <div class="main"></div>
 
 
        <h1>Profil utilisateur</h1>
  <p>Nom d'utilisateur : <?php echo $user['username']["username"]; ?></p>
  <p>Email : <?php echo $user['email']; ?></p>
  <p>Nom complet : <?php echo $user['full_name']; ?></p>
  <p>Adresse : <?php echo $user['address']; ?></p>
  <p>Numéro de téléphone : <?php echo $user['phone_number']; ?></p>
  <!-- Ajouter d'autres informations de l'utilisateur ici -->

</html>