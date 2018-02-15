<?php
session_start();

require_once ('connection.php');

//Check if 'id' exists and if its value is > 0 bc index starts at 1
if (isset($_GET['id']) && $_GET['id'] > 0) {
    //get integer value
    $getId = intval($_GET['id']);
    //select from db
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
    ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<div>
    <h2>Welcome <?=$row['pseudo']?>!</h2>

    <p>Pseudo <?=$row['pseudo']?></p>
    <p>Mail <?=$row['mail']?></p>
    <?php
        //check if 'id' exists = someone is connected AND if id of session equals id of page
        if (isset($_SESSION['id']) && $row['id'] == $_SESSION['id']) {
            ?>
            <a class="linkEdit" href="edit.php">Edit profile</a>
            <br>
            <a href="deconnect.php">Deconnect</a>
            <br>
            <a href="home.php">Home</a>
            <?php
        } else {
            echo "lol";
        }
        ?>


</div>
</body>
</html>
<?php
}
?>
