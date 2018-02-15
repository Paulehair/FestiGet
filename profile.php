<?php
session_start();

require_once('connect_server.php');

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
<div class="center">
    <div class="container">
        <h2 class="title">Welcome <?=$row['pseudo']?>!</h2>

        <p class = "name"><span class="italic">Pseudo </span><?=$row['pseudo']?></p>
        <p class="mail"><span class="italic">Mail </span><?=$row['mail']?></p>
        <?php
            //check if 'id' exists = someone is connected AND if id of session equals id of page
            if (isset($_SESSION['id']) && $row['id'] == $_SESSION['id']) {
                ?>
                <div class="containerButton">
                    <div class="button">
                        <a class="linkEdit" href="update_user.php">Edit profile</a>
                    </div>
                    <div class= "button">
                        <a href="disconnect.php">Disconnect</a>
                    </div>
                    <div class= "button">
                        <a href="home.php">Home</a>
                    </div>
                </div>
                <?php
            } else {
                echo "lol";
            }
            ?>
    </div>
</div>
</body>
</html>
<?php
}
?>
