<?php
// Inclure l'autoload de Composer pour charger PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramétrer le serveur SMTP (ici avec Gmail)
        $mail->isSMTP();  
        $mail->Host = 'smtp.gmail.com';  // Utilise le serveur SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'ton-email@gmail.com';  // Ton adresse email Gmail
        $mail->Password = 'ton-mot-de-passe';    // Ton mot de passe de l'email (ou un mot de passe d'application)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataire
        $mail->setFrom($email, $nom); // L'email de l'utilisateur
        $mail->addAddress('honorekilama247@gmail.com');  // Ton adresse email

        // Sujet et contenu de l'email
        $mail->isHTML(true);  
        $mail->Subject = 'Message de Contact - Mon Portfolio';
        $mail->Body    = "
        <html>
        <head>
            <title>Message de Contact</title>
        </head>
        <body>
            <h2>Message reçu depuis le formulaire de contact</h2>
            <p><strong>Nom:</strong> $nom</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br> $message</p>
        </body>
        </html>
        ";

        // Envoi de l'email
        if ($mail->send()) {
            echo "Message envoyé avec succès !";
        } else {
            echo "Une erreur est survenue, l'email n'a pas pu être envoyé.";
        }

    } catch (Exception $e) {
        echo "Erreur de l'envoi: {$mail->ErrorInfo}";
    }
}
?>
