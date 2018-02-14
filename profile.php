<?php
session_start();

require_once ('connection.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    //get integer value
    $getId = intval($_GET['id']);
    $requeteUser = "SELECT
            *
        FROM
            `member`
        WHERE
            `id` = :id
        ;";
    $requeteUser = $connection->prepare($requeteUser);
    $requeteUser->bindValue(':id', $_GET['id']);
    $requeteUser->execute();
    $row = $requeteUser->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
    ?>

    <!DOCTYPE html>
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
    <h2>Bienvenue <?=$row['pseudo']?>!</h2>

    <p>Pseudo <?=$row['pseudo']?></p>
    <p>Mail <?=$row['mail']?></p>
    <?php
    if (isset($emptiness))
    {
        echo $emptiness;
    }
    ?>

</div>
</body>
</html>
<?php
}
?>
