<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Enregistrer l'utilisateur dans la base de données
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $email, $password])) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
?>
