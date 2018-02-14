<?php
/**
 * Created by PhpStorm.
 * User: pauleherman
 * Date: 14/02/2018
 * Time: 09:56
 */
?>

<?php

require_once ('db-init.php');

if (isset($_POST['connect']))
{
    $mailConnect = htmlspecialchars($_POST['mailConnect']);
    $mdpConnect = sha1($_POST['mdpConnect']);

    if (!empty($mailConnect) && !empty($mdpConnect)) {
        $requeteUser =
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
        <input type="text" name="mailConnect" placeholder="Mail">
        <input type="password" name="mdpConnect" placeholder="Password">
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
