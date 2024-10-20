<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    $retour = mail('anais.dubois5@outlook.fr', 'Envoi depuis la page Contact CV', $_POST['message'], '');
    if ($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
    ?>
</body>
</html>