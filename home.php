<?php

require_once "connection.php";

session_start();

// RETRIEVE DATA FROM DATABASE
$data_fetcher = $connection->prepare("
SELECT
  `id`,
  `name`,
  `place`,
  `start`,
  `end`
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
                echo "<a class='Gallery' href='product.php?id=" . $data[$i]["id"] . "'>";
                echo "<img class='GalleryContent' src='img/Festival1.jpg'>";
                echo "<div class='desc'>" . $data[$i]["name"] . "</div>";
                echo "<div class='desc'>" . $data[$i]["start"] . " - " . $data[$i]["end"] . "</div>";
                echo "</a>";
                echo "</div>";
                $i++;
            }
            ?>
            </section>
        </header>
    </body>
</html>