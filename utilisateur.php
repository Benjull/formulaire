<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Profil utilisateur</title>
  <link rel="stylesheet" href="style3.css" />
</head>

<body class="utilisateur">
  <?php
  $conn = new mysqli("localhost", "root", "", "formulaire");

  // Vérifier si l'utilisateur est connecté
  session_start();

  // Récupérer l'ID de l'utilisateur à partir de la session
  $user_id = $_SESSION["user"]["id"];

  if (isset($_POST['update_name'])) {
    $name = $_POST['name'];
    $update_query = "UPDATE users SET username='$name' WHERE id='$user_id'";
    if (mysqli_query($conn, $update_query)) {
      $_SESSION["user"]["username"] = $name;
      echo "Username updated successfully.";
    } else {
      echo "Error updating username: " . mysqli_error($conn);
    }
  }

  if (isset($_POST['update_email'])) {
    $email = $_POST['email'];
    $update_query = "UPDATE users SET email='$email' WHERE id='$user_id'";
    if (mysqli_query($conn, $update_query)) {
      echo "Email updated successfully.";
    } else {
      echo "Error updating email: " . mysqli_error($conn);
    }
  }

  if (isset($_POST['update_password'])) {
    $password = $_POST['password'];
    $update_query = "UPDATE users SET password='" . hash('sha256', $password) . "' WHERE id='$user_id'";
    if (mysqli_query($conn, $update_query)) {
      echo "Password updated successfully.";
    } else {
      echo "Error updating password: " . mysqli_error($conn);
    }
  }
  ?>

  <?php
  // Récupérer les informations de l'utilisateur à partir de la base de données
  $query = "SELECT * FROM users WHERE id='$user_id'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);
  ?>
  <h1>Profil utilisateur</h1>
  <button><a href="./tkt.php">Retour à l'accueil</a></button>
  <form method="post" action="">
    <label for="name">Nom d'utilisateur :</label>
    <input type="text" id="name" name="name" value="<?php echo $user['username']; ?>">
    <input type="submit" name="update_name" value="Modifier le nom d'utilisateur">
    <br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
    <input type="submit" name="update_email" value="Modifier l'email">
    <br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password">
    <input type="submit" name="update_password" value="Modifier le mot de passe">
  </form>
  <!-- Ajouter d'autres informations de l'utilisateur ici -->
</body>

</html>