<?php
session_start();

require_once ('connection.php');

//Check if 'id' exists = someone is connected, else return to connexion.php
if (isset($_SESSION['id'])) {
    //get all datas from table member
    $requeteUser = "SELECT
                *
            FROM
                `member`
            WHERE
                `id` = :id
            ;";
    $stmt = $connection->prepare($requeteUser);
    $stmt -> bindValue(':id', $_SESSION['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $newPseudo = htmlspecialchars($_POST['newPseudo']);
    var_dump($newPseudo);

    //insert into table member new value of pseudo that equals ":pseudo"
    if ($_POST['newPseudo'] && !empty($_POST['newPseudo']) && $_POST['newPseudo'] !== $row['pseudo']) {
        $insertPseudo = "UPDATE
          `member`
        SET
          `pseudo` = :pseudo
        WHERE
          `id` = :id
        ;";
        $stmt = $conn->prepare($insertPseudo);
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':pseudo', $row['newPseudo']);
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
        <title>Edit Profile</title>
    </head>
    <body>
    <div>
        <h2>Hello <?=$row['pseudo']?>!</h2>
        <form method="POST" action="">
            <label for="newPseudo">Pseudo</label>
            <input type="text" name="newPseudo" placeholder="Enter new pseudo" value="<?= $row['pseudo'] ?>">
            <label for="newMail">Mail</label>
            <input type="text" name="newMail" placeholder="Enter new mail" value="<?= $row['mail'] ?>">
            <label for="newMdp">Nouveau mot de passe</label>
            <input type="password" name="newMdp" placeholder="Enter new password" value="">
            <label for="newPseudo">Confirmer le nouveau mot de passe</label>
            <input type="password" name="newMdp2" placeholder="Enter new password again" value="">
            <input type="submit" name="confirm" placeholder="Confirm changes">
        </form>
    </div>
    </body>
    </html>
    <?php
} else {
    echo "lol";
    //header("Location: connexion.php");
}
?>
