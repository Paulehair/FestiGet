<?php
session_start();

require_once ('connection.php');

if (isset($_POST['connect'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);

    //Check if input is not empty
    if (!empty($mail) && !empty($mdp)) {
        //Get mail and password from db
        $requeteUser = "SELECT
            *
        FROM
            `member`
        WHERE
            `password` = :mdp and
            `mail` = :mail
        ;";
        $requeteUser = $connection->prepare($requeteUser);
        $requeteUser->bindValue(':mail', $_POST['mail']);
        $requeteUser->bindValue(':mdp', $_POST['mdp']);
        $requeteUser->execute();
        $row = $requeteUser->fetch(PDO::FETCH_ASSOC);

        //Check if email already exists in db
        $userExist = $requeteUser->rowcount();
        if ($userExist == 1) {
            //$userInfo = $requeteUser->fetch(PDO::FETCH_ASSOC);
            session_start();
            session_unset();
            $_SESSION['id'] = $row['id'];
            $_SESSION['pseudo'] = $row['pseudo'];
            $_SESSION['mail'] = $row['mail'];
            header("Location: home.php");
        }
        else {
            $emptiness = "Mauvais mail ou mot de passe !";
        }
    }
    else {
      $emptiness = "Tous les champs doivent être complétés !";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/font-face.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <title>Connect</title>
</head>
<body>
<div class="center">
    <form class="form" method="post" action="">
        <input class="input" type="email" name="mail" placeholder="Mail">
        <input class="input" type="password" name="mdp" placeholder="Password">
        <input class="input" type="submit" name="connect" value="Se connecter">
    </form>
    <a class="connectLink" href="form.php">Créer un compte</a>

    <?php
    if (isset($emptiness))
    {
        echo $emptiness;
    }
    ?>

</div>
</body>
</html>
