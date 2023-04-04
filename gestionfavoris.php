<?php
$conn = new mysqli("localhost", "root", "", "formulaire");
session_start();
if (isset($_SESSION['user']) && isset($_GET['action'])) {
    if ($_GET['action'] == 'toggle') {
        $user = $_SESSION['user']['id'];
        $livre = $_GET['id'];
        $sql = "SELECT * FROM livre WHERE user_id = '$user' AND livre_id = '$livre'";
        $result = mysqli_query($conn, $sql);
        $favoris = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (count($favoris) > 0) {
            $sql = "DELETE FROM livre WHERE user_id = '$user' AND livre_id = '$livre'";
            $result = mysqli_query($conn, $sql);
            echo json_encode(['message' => 'Vous avez supprimé ce livre de vos favoris', 'action' => 'remove']);
        } else {
            $livre_info = getLivreInfo($livre);
            $sql = "INSERT INTO livre (user_id, livre_id, title, authors, image) VALUES ('$user', '$livre', '" . $livre_info['volumeInfo']['title'] . "', '" . (isset($livre_info['volumeInfo']['authors']) ? $livre_info['volumeInfo']['authors'][0] : "Unknown") . "', '" . $livre_info['volumeInfo']['imageLinks']['thumbnail'] . "')";
            $result = mysqli_query($conn, $sql);
            echo json_encode(['message' => 'Vous avez ajouté ce livre à vos favoris', 'action' => 'add']);
        }
    } elseif ($_GET['action'] == 'list') {
        $user = $_SESSION['user']['id'];
        $sql = "SELECT * FROM livre WHERE user_id = '$user'";
        $result = mysqli_query($conn, $sql);
        $favoris = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($favoris);
    }
} else {
    echo "Une erreur est survenue";
}

function getLivreInfo($id)
{
    $url = "https://www.googleapis.com/books/v1/volumes/" . $id;
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    return $data;
}
