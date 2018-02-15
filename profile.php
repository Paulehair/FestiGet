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
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/font-face.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>Profile</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <p class="festiget">FESTI<span class="pink">GET</span></p>
        <p class="logoText">get to your festival</p>
    </div>
    <div class="headerItems">
        <div class="search">
            <input type="text" class="searchBar" placeholder="Search...">
        </div>
        <div class="card">
            <a href=""><img class="cardImg" src="assets/img/cartcadi.png" alt="card" title="card"></a>
        </div>
        <div class="profile">
            <a href=""><img class="ppImg" src="assets/img/pp.png" alt="profile" title="profile picture"></a>
        </div>
    </div>
</div>
<div>
    <h2 class="title">Welcome <?=$row['pseudo']?>!</h2>

    <p class = "name">Pseudo <?=$row['pseudo']?></p>
    <p class="mail">Mail <?=$row['mail']?></p>
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
