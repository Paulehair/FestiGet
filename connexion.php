<?php
/**
 * Created by PhpStorm.
 * User: pauleherman
 * Date: 14/02/2018
 * Time: 09:56
 */
?>

<?php

require_once ('connection.php');

if (isset($_POST['connect']))
{
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);

    //On vérifie que les champs ne sont pas vides
    if (!empty($mail) && !empty($mdp)) {
        //On récupère les mail et mdp dans la bdd
        $requeteUser = "SELECT
            `mail`,
            `password`
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

        $userExist = $requeteUser->rowcount();
        if ($userExist == 1)
        {
            echo "lol";
        }
        else
        {
            $emptiness = "Mauvais mail ou mot de passe !";
        }

    }
    else
    {
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
        <input type="text" name="mail" placeholder="Mail">
        <input type="password" name="mdp" placeholder="Password">
        <input type="submit" name="connect" value="Se connecter">
    </form>

    <?php
    if (isset($emptiness))
    {
        echo $emptiness;
    }
    ?>

</div>
</body>
</html>
