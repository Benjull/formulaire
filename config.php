<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registration');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Vérifier la connexion
if(mysqli_connect_errno()) {
  die("ERREUR : Impossible de se connecter. Erreur de connexion n° " . mysqli_connect_errno() . ": " . mysqli_connect_error());
}

?>
