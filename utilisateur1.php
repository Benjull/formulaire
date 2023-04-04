<?php
require('pageutilisateur.php');
$conn = new mysqli("localhost", "root", "", "utilisateur1");


// Vérifier si l'utilisateur est connecté
session_start();

// Récupérer l'ID de l'utilisateur à partir de la session
var_dump($_SESSION["username"]);
die();
$user_id = $_SESSION["username"]["id"];

// Récupérer les informations de l'utilisateur à partir de la base de données
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Profil utilisateur</title>
</head>
<body>
  <h1>Profil utilisateur</h1>
  <p>Nom d'utilisateur : <?php echo $user['username']; ?></p>
  <p>Email : <?php echo $user['email']; ?></p>
  <p>Nom complet : <?php echo $user['full_name']; ?></p>
  <p>Adresse : <?php echo $user['address']; ?></p>
  <p>Numéro de téléphone : <?php echo $user['phone_number']; ?></p>
  <!-- Ajouter d'autres informations de l'utilisateur ici -->
</body>
</html>