<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bienvenue, " . $_SESSION['user_name'];
?>

<h2>Tableau de Bord</h2>
<ul>
    <li><a href="update_price.php">Modifier le prix des coupes</a></li>
    <li><a href="logout.php">Se déconnecter</a></li>
</ul>
