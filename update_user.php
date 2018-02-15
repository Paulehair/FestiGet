<?php
session_start();

require_once('connect_server.php');

//Check if 'id' exists = someone is connected, else return to connect.php
if (isset($_SESSION['id'])) {
    //get all datas from table member
    $requeteUser = "
        SELECT
            *
        FROM
            `member`
        WHERE
            `id` = :id
        ;";
    $stmt = $connection->prepare($requeteUser);
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //insert into table member new value of pseudo that equals ":pseudo"
    if ((isset($_POST['newPseudo']) && $_POST['newPseudo']) != "" ||
        (isset($_POST['newMail']) && $_POST['newMail']) != "" ||
        (isset($_POST['newMdp']) && isset($_POST['newMdp']) && $_POST['newMdp'] != "")) {
        $newPseudo = htmlspecialchars($_POST['newPseudo']);
        $newMail = htmlspecialchars($_POST['newMail']);
        if ($_POST['newMdp'] == $_POST['newMdp2'] && $_POST['newMdp'] != "") {
            $newMdp = $_POST['newMdp'];
            $insertNewMdp = ", `password` = :password";
        } else {
            $insertNewMdp = "";
        }
        $insertData = "
        UPDATE 
          `member`
        SET
          `pseudo` = :pseudo,
          `mail` = :mail" . $insertNewMdp . "
        WHERE
          `id` = :id
        ;";
        $stmt = $connection->prepare($insertData);
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':pseudo', $_POST['newPseudo']);
        $stmt->bindValue(':mail', $_POST['newMail']);
        if ($_POST['newMdp'] == $_POST['newMdp2'] && $_POST['newMdp'] != "") {
            $stmt->bindValue(':password', $_POST['newMdp']);
        }
        $stmt->execute();
        header("Location: profile.php?id=".$_SESSION['id']);
    }
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
        <link rel="stylesheet" href="assets/css/edit.css">
        <title>Edit Profile</title>
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
                <a href="basket.php?id=<?= $_SESSION['id'] ?>"><img class="cardImg" src="assets/img/cartcadi.png" alt="card" title="card"></a>
            </div>
            <div class="profile">
                <a href="profile.php?id=<?= $_SESSION['id'] ?>"><img class="ppImg" src="assets/img/pp.png" alt="profile" title="profile picture"></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form class="form" method="POST" action="">
            <table class="table">
                <h2 class="title">Hello <?=$row['pseudo']?>!</h2>

                <div class="cont">
                    <div class="label">
                        <label class="label" for="newPseudo">Pseudo</label>
                    </div>
                    <div class="input">
                        <input class="input" type="text" name="newPseudo" placeholder="Enter new pseudo" value="<?= $row['pseudo'] ?>">
                    </div>
                </div>

                <div class="cont">
                    <div class="label">
                        <label class="label" for="newMail">Mail</label>
                    </div>
                    <div class="input">
                        <input class="input" type="text" name="newMail" placeholder="Enter new mail" value="<?= $row['mail'] ?>">
                    </div>
                </div>

                <div class="cont">
                    <div class="label">
                        <label class="label" for="newMdp">Nouveau mot de passe</label>
                    </div>
                    <div class="input">
                        <input class="input" type="password" name="newMdp" placeholder="Enter new password" value="">
                    </div>
                </div>

                <div class="cont">
                    <div class="label">
                        <label class="label" for="newPseudo">Confirmer le nouveau mot de passe</label>
                    </div>
                    <div class="input">
                        <input class="input" type="password" name="newMdp2" placeholder="Enter new password again" value="">
                    </div>
                </div>
                <div class="cont submit">
                    <input class="button" type="submit" name="confirm" placeholder="Confirm changes">
                </div>
            </table>

        </form>
    </div>
    </body>
    </html>
    <?php
} else {
    header("Location: connect.php");
}
?>
