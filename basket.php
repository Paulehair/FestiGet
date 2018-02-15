<?php

session_start();

require_once "connection.php";

// RETRIEVE DATA FROM DATABASE
$data_fetcher = $connection->prepare("
SELECT
  `id`,
  `name`,
  `ticket_price_d1`,
  `ticket_price_d2`,
  `ticket_price_d3`
FROM
  `fest`");
$data_fetcher->execute();
$data = $data_fetcher->fetchAll();

if (!isset($_SESSION['id'])) {
    header("Location: connexion.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panier</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/font-face.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/basket.css">
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
                <a href="profile.php?id=<?= $_SESSION["id"] ?>"><img class="ppImg" src="assets/img/pp.png" alt="profile" title="profile picture"></a>
            </div>
        </div>
    </div>
    <div>
        <h2>Basket</h2>
        <div class="basket">
            <?php

            $i = 0;
            $is_empty = true;
            while ($i < 999) {
                if (isset($_SESSION["tickets"][$i])) {
                    echo "<div class='basket_product'>";
                    echo $data[$i - 1]["name"] . "<br>";
                    $j = 0;
                    while ($j < 3) {
                        if (isset($_SESSION["tickets"][$i][$j + 1])) {
                            echo "<p class='basket_product_day'>Day " . ($j + 1) . "</p>";
                            echo "<p class='basket_product_count'>" . $_SESSION["tickets"][$i][$j + 1] . "</p>";
                        }
                        $j++;
                    }
                    echo "</div>";
                    $is_empty = false;
                }
                $i++;
            }
            if ($is_empty === true) {
                echo "<p>Your basket is empty!</p>";
            }
            echo "<a href='home.php'>Return to the main page</a>";
            ?>
    </div>
</body>
</html>
