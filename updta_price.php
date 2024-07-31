<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_price = $_POST['price'];
    // Mettez à jour la table des services avec le nouveau prix
    // Cette table n'est pas encore définie dans la base de données
}
?>

<form action="update_price.php" method="post">
    <label for="price">Nouveau prix de coupe :</label>
    <input type="number" id="price" name="price" required>
    <button type="submit">Mettre à jour</button>
</form> 
