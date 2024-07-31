<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $to_client = $email;
    $to_admin = "votre_email@example.com"; // Remplacez par votre email
    $subject = "Confirmation de votre rendez-vous";
    $message = "
    <html>
    <head>
    <title>Confirmation de votre rendez-vous</title>
    </head>
    <body>
    <p>Merci, $name. Votre rendez-vous pour $service est confirmé pour le $date à $time.</p>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Envoyer l'email au client
    mail($to_client, $subject, $message, $headers);

    // Envoyer l'email à l'administrateur
    mail($to_admin, $subject, $message, $headers);

    echo "<p>Merci, $name. Votre rendez-vous pour $service est confirmé pour le $date à $time. Une confirmation a été envoyée à $email.</p>";
}
?>
