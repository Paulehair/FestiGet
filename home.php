<?php

require_once "connection.php";

session_start();

if (isset($_SESSION["CHAOS"])) {
    echo $_SESSION["CHAOS"];
    exit;
}

// RETRIEVE DATA FROM DATABASE
$data_fetcher = $connection->prepare("
SELECT
  `id`,
  `name`,
  `place`,
  `start`,
  `end`,
  `description`,
  `ticket_count_d1`,
  `ticket_count_d2`,
  `ticket_count_d3`,
  `ticket_price_d1`,
  `ticket_price_d2`,
  `ticket_price_d3`
FROM
  `fest`");
$data_fetcher->execute();
$data = $data_fetcher->fetchAll();

if (!isset($_SESSION['id'])) {
    header("Location: connexion.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/font-face.css">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/home.css">
        <style>
            input[type="text"] {
                position: absolute;
                opacity: 0;
            }
        </style>
    </head>
    <body>
        <header>
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
            <div class="menu">
                <ul class="menuList">
                    <li class="menuListItem"><a href="#"> <span class="Itemcolor">ALL</span> </a> </li>
                    <li class="menuListItem"><a href="#"> <span class="Itemcolor">Month</span></a></li>
                    <li class="menuListItem"><a href="#"> <span class="Itemcolor">Country</span> </a></li>
                    <li class="menuListItem"><a href="#"> <span class="Itemcolor">Music</span> </a></li>
                </ul>
            </div>
            <section class="festivalGallery">
            <?php

            // FILL ARTICLE TEMPLATES WITH DATA INFORMATIONS AND PRINT IT
            $i = 0;
            while (isset($data[$i])) {
                echo "<a class='articlesHome' href='product.php?id=" . $data[$i]["id"] . "'>" ;
                echo "<img class='galleryContent' src='img/Festival1.jpg'>";
                echo "<div class='desc'>" . $data[$i]["name"] . "</div>";
                echo "<div class='desc'>" . $data[$i]["start"] . " - " . $data[$i]["end"] . "</div>";
                echo "<div class='articles'>
                <p> " . $data[$i]['name'] . "  </p>
                <p>Spot : " . $data[$i]['place'] . " </p>
                <p>From " . $data[$i]['start'] . " to " . $data[$i]['end'] . " </p>
                <p>Description : " .  $data[$i]['description'] . " </p>
                <p>Tickets number day 1 : " . $data[$i]['ticket_count_d1'] . " </p>
                <p>Tickets number day 2 : " . $data[$i]['ticket_count_d2'] . " </p>
                <p>Ticket price day 1 : " . $data[$i]['ticket_price_d1'] ."$".  "</p>
                <p>Ticket price day 2 : " . $data[$i]['ticket_price_d2']  ."$". "</p>
                </div>"  ;
                if ($_SESSION['privilege'] === 'admin') {
                    echo "<form action='delete_fest.php' method='POST'>";
                    echo "<input type='text' name='delete_id' value='" . $data[$i]["id"] . "'>";
                    echo "<input class='action_button' type='submit' name='delete' value='Delete'>";
                    echo "</form>";
                }
                echo "</a>";
                $i++;
                }
                if ($_SESSION['privilege'] === 'admin') {
                    echo '<a href="HUE_HUE_HUE.php" class="ATOMIC_BOMB" style="margin-top: 1000px;background:red;width: 200px;height: 200px;border-radius:100%;text-align:center;padding:70px 20px;box-sizing: border-box;font-size:30px;">A.T.O.M.I.C. .B.O.M.B</a>';
                }
                ?>
            </section>
        </header>
    </body>
</html>
