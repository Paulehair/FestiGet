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
            <link rel="stylesheet" href="assets/css/home.css">
            <link rel="stylesheet" href="assets/css/flexboxgrid.min.css">
            <link rel="stylesheet" href="assets/css/reset.css">
        <style>
            input[type="text"] {
                position: absolute;
                opacity: 0;
            }
        </style>
    </head>
    <body>
        <header>
            <section class="homePage">
                <div class="hearderLogo">
                    <h1 class="H1">FESTI<span class="Getcolor">GET</span></h1>
                    <h2 class="H2">get to your festival</h2>
                    <div class="headerRight">
                        <ul class="headerRightList">
                            <li class="headerRightListItem"> <em><input class="Search" type="text" name=""  value="Search..."></em></li>
                            <li class="headerRightListItem"><a href="basket.php"><img class="Cadi"src="img/Cadi.png" alt="pp" title="pp"></a></li>
                            <li class="headerRightListItem"><a href="profile.php?id=<?= $_SESSION['id'] ?>"><img class="PP" src="img/PP.png" alt=""></a></li>
                        </ul>
                    <div class="menu">
                        <ul class="menuList">
                            <li class="menuListItem"><a href="#"> <span class="Itemcolor">ALL</span> </a> </li>
                            <li class="menuListItem"><a href="#"> <span class="Itemcolor">Month</span></a></li>
                            <li class="menuListItem"><a href="#"> <span class="Itemcolor">Country</span> </a></li>
                            <li class="menuListItem"><a href="#"> <span class="Itemcolor">Music</span> </a></li>
                        </ul>
                    </div>
                </div>
            </section>
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