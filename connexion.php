<?php
/**
 * Created by PhpStorm.
 * User: pauleherman
 * Date: 14/02/2018
 * Time: 09:56
 */
?>

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
            $_SESSION['id'] = $row['id'];
            session_start();
            session_unset();
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
    <title>Document</title>
</head>
<body>
<div>
    <form method="post" action="">
        <input type="email" name="mail" placeholder="Mail">
        <input type="password" name="mdp" placeholder="Password">
        <input type="submit" name="connect" value="Se connecter">
    </form>
    <a href="form.php">Créer un compte</a>

    <?php
    if (isset($emptiness))
    {
        echo $emptiness;
    }
    ?>

</div>
</body>
</html>
