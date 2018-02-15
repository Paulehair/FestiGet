<?php

session_start();

if (isset($_SESSION["id"])) {
    header("Location: home.php");
    exit;
}

require_once('connect_server.php');

if (isset($_POST['formok']) && $_POST["formok"] != "refresh") {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    //Check if field is not empty
    if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])) {
        //Check if pseudo length is under 255char
        $pseudolen = strlen($pseudo);
        if ($pseudolen <= 255) {
            //Check if mail and mail2 are equal
            if ($mail == $mail2) {
                //Condition with FILTER_VALIDATE_EMAIL to check if it's a mail
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $requeteMail = "SELECT
                        *
                      FROM
                        `member`
                      WHERE
                        `mail` = :mail
                        ;";
                    $stmt = $connection->prepare($requeteMail);
                    $stmt->bindValue(':mail', $_POST['mail']);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    //get number of rows to check if mail exists
                    $mailExist = $stmt->rowCount();
                    if ($mailExist == 0) {
                        //Check if mail equal mail confirmation
                        if ($mdp == $mdp2) {
                            $requete = "INSERT INTO
                              `member`
                              (`pseudo`, `mail`, `password`, `privilege`)
                              VALUES
                              (:pseudo, :mail, :mdp, 'member')
                              ;";

                            $stmt = $connection->prepare($requete);
                            $stmt->bindValue(':pseudo', $_POST['pseudo']);
                            $stmt->bindValue(':mail', $_POST['mail']);
                            $stmt->bindValue(':mdp', $_POST['mdp']);
                            $stmt->execute();
                            header("Location: connect.php");
                            exit;
                        }
                        else {
                            $emptiness = "Vos mots de passe ne correspondent pas";
                        }
                    } else {
                        $emptiness = "Le mail est déjà utilisé";
                    }
                } else {
                    $emptiness = "Votre adresse mail n'est pas valide";
                }
            } else {
                $emptiness = "Vos addresses mail ne correspondent pas";
            }
        } else {
            $emptiness = "Votre pseudo ne doit pas dépasser 255 caractères !!";
        }
    } else {
        $emptiness = "Remplissez tous les champs !! ";
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
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <title>Register</title>
</head>
<body>
<div class="header">
    <a href="home.php" class="logo">
        <p class="festiget">FESTI<span class="pink">GET</span></p>
        <p class="logoText">get to your festival</p>
    </a>
    <div class="headerItems">
         <div class="search">
            <input type="text" class="searchBar" placeholder="Search...">
         </div>
         <div class="card">
            <a href="basket.php?id=<?= $_SESSION['id'] ?>"><img class="cardImg" src="assets/img/cartcadi.png" alt="card" title="card"></a>
         </div>
         <div class="profile">
            <a href="profile.php?id=<?= $_SESSION['id'] ?>"><img class="ppImg" src="assets/img/pp.png" alt="profile" title="profile picture"></a>
        </div>
    </div>
</div>
    <div class = "center">
        <form class="form" method="post" action="">
            <table class="table">
                <tr>
                    <td>
                        <input class="input" id="pseudo" type="text" placeholder="Pseudo" name="pseudo" value="<?php if (isset($pseudo)) {echo $pseudo;}?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="input" id="mail" type="email" placeholder="Mail" name="mail" value="<?php if (isset($mail)) {echo $mail;}?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="input" id="mail2" type="email" placeholder="Confirmer votre mail" name="mail2" value="<?php if (isset($mail2)) {echo $mail2;}?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="input" id="mdp" type="password" placeholder="Mot de passe" name="mdp">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="input" id="mdp2" type="password" placeholder="Confirmer le mot de passe" name="mdp2">
                    </td>
                </tr>
            </table>
            <input class="input" type="submit" value="GO" name="formok">
        </form>
        <a class="connectLink" href="connect.php">J'ai déjà un compte</a>

        <?php
        if (isset($emptiness)) {
            echo '<p class = "message">' . $emptiness . '</p>';
        }
        ?>

    </div>
</body>
</html>
