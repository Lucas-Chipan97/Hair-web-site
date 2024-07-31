<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Salon de Coiffure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Salon de Coiffure - Inscription</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="login.php">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <section id="register">
        <h2>Inscription</h2>
        <form action="register_process.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">S'inscrire</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Salon de Coiffure. Tous droits réservés.</p>
    </footer>
</body>
</html>
