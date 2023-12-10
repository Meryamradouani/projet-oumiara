<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'Événement</title>
    <style>
        label {
            width: 250px;
            display: inline-block;
        }
        body {
            background-color: rgb(35, 91, 144);
            color: white;
        }
        input, textarea {
            border-radius: 5px;
            width: 200px;
            height: 20px;
        }
    </style>
</head>
<body> 
    <h1>Ajout d'Événement</h1>

    <?php
    session_start();
    include('connexion.php');

    // Vérifiez si le formulaire d'ajout d'événement a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérez les données du formulaire
        $titre = $_POST['TITRE'];
        $description = $_POST['DESCRIPTION'];
       
        $userIdQuery = "SELECT id_utilisateur FROM utilisateur ";
        $userIdResult = mysqli_query($link, $userIdQuery);

        if (mysqli_num_rows($userIdResult) > 0) {
            $user = mysqli_fetch_assoc($userIdResult);
            $userId = $user['id_utilisateur'];

        // Insérez l'événement dans la table DEMANDE_EVENEMENT
        $insertEventQuery = "INSERT INTO DEMANDE_EVENEMENT (titre_propose, description_propose, UTILISATEUR_id_utilisateur) VALUES ('$titre', '$description', '$userId')";
        $insertEventResult = mysqli_query($link, $insertEventQuery);

        if ($insertEventResult) {
            echo "Demande d'ajout d'événement soumise avec succès!";
        } else {
            echo "Erreur lors de la soumission de la demande.";
        }
    }}
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

    
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'oumaimanioua42@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';  // utilisez 'ssl' si nécessaire
        $mail->Port = 587;
   
        $mail->setFrom('oumaimanioua42@gmail.com', 'Votre Nom');
        $mail->addAddress('niouaoumayma45@gmail.com', 'oumayma');
        $mail->Subject = 'demande';
        $mail->Body = 'une demande a ete ajoutee';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    
    // fermeture de la connexion
    mysqli_close($link);
    ?>

    <form action="" method="POST" id="form" enctype="multipart/form-data">
        <label for="titre">Titre de l'Événement proposee:</label>
        <input type="text" name="TITRE" required="required"/><br><br>
        <label for="description">Description proposee:</label>
        <textarea name="DESCRIPTION" rows="4" cols="50" required="required"></textarea><br><br>
        <input type="submit" name="submit" value="Soumettre la Demande" style="width: 208px;text-align: center; height:30px;"/>
    </form>     
</body>
</html> 
