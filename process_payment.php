<?php
// Inclus le fichier de configuration de PayPal
require 'paypal_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $price = 10.00; // Par défaut pour une coupe de cheveux

    // Rediriger vers PayPal pour le paiement
    $query = http_build_query([
        'cmd' => '_xclick',
        'business' => PAYPAL_BUSINESS_EMAIL,
        'item_name' => $service,
        'amount' => $price,
        'currency_code' => 'EUR',
        'return' => PAYPAL_RETURN_URL,
        'cancel_return' => PAYPAL_CANCEL_URL,
        'notify_url' => PAYPAL_NOTIFY_URL,
        'custom' => json_encode([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'service' => $service,
            'date' => $date,
            'time' => $time
        ])
    ]);

    header('Location: https://www.paypal.com/cgi-bin/webscr?' . $query);
    exit;
}
?>
