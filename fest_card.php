<?php

require_once "connect_server.php";

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: connect.php");
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
$i = 0;
while (isset($data[$i])) {
    if ($data[$i]["id"] == $_GET["id"]) {
        $index = $i;
    }
    $i++;
}
if (!isset($index)) {
    echo "The product you are looking for doesn't exist!<br>";
    echo "<a href='./home.php'>Go back to the homepage</a>";
    exit;
}

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Festiget</title>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/font-face.css">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/product.css">
    </head>
    <body>
         <header class="header">
             <div class="Container">
                 <section class="homePage">
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
                     <!-- TEXTE FESTIVAL -->
                     <div class="textNomFestival">
                         <p class="textPosition"><?php echo $data[$index]['name']; ?></p>
                         <div class="picto">
                             <img class="share" src="assets/img/share.png" alt="">
                             <img class="heart" src="assets/img/heart.png" alt="">
                         </div>
                     </div>
                     <div class="textDate">
                         <p class="textPosition2"><?php echo $data[$index]['start'] . " - " . $data[$index]['end'] ?></p>
                     </div>
                     <div class="textLieu">
                         <div class="Pin">
                             <img class="pinPosition" src="assets/img/pin.png" alt="">
                         </div>
                         <p class="textPosition3"><?php echo $data[$index]['place'] ?>, <span class="franceBold">France</span></p>
                     </div>
                     <div class="description_container">
                         <p class="decription" style="margin-left: 350px; margin-top: 50px; font-family: 'Open Sans';"><?php echo $data[$index]["description"] ?></p>
                     </div>
                     <!-- RECTANGLE ROSE -->
                     <div class="rectangle">
                         <div class="button_day" style="<?php if ($data[$index]['ticket_count_d1'] == -1) {echo "display: none";} ?>">
                             <div class="rectangleRose">
                                 <p class="festival27F">Jour 1 <?php if ($data[$index]['ticket_count_d1'] != -1) {echo " - " . $data[$index]["ticket_price_d1"] . "€";} ?></p>
                                 <p class="festival27F_places" style="margin-left: 340px; margin-top: 10px;">Places restantes: <?= $data[$index]['ticket_count_d1'] ?></p>
                             </div>
                             <a class="carreRose" style="display: block" href="pick_fest.php?id=<?= $_GET['id']?>&day=1">
                                 <img class="plus" src="assets/img/plus.png" alt="">
                             </a>
                         </div>
                         <div class="button_day" style="<?php if ($data[$index]['ticket_count_d2'] == -1) {echo "display: none";} ?>">
                             <div class="rectangleRose2">
                                <p class="festival27F">Jour 2 <?php if ($data[$index]['ticket_count_d2'] != -1) {echo " - " . $data[$index]["ticket_price_d2"] . "€";} ?></p>
                                 <p class="festival27F_places" style="margin-left: 340px; margin-top: 10px;">Places restantes: <?= $data[$index]['ticket_count_d1'] ?></p>
                             </div>
                             <a class="carreRose" style="display: block" href="pick_fest.php?id=<?= $_GET['id']?>&day=2">
                                 <img class="plus" src="assets/img/plus.png" alt="">
                             </a>
                         </div>
                         <div class="button_day" style="<?php if ($data[$index]['ticket_count_d3'] == -1) {echo "display: none";} ?>">
                             <div class="rectangleRose3">
                                 <p class="festival27F">Jour 3 <?php if ($data[$index]['ticket_count_d3'] != -1) {echo " - " . $data[$index]["ticket_price_d3"] . "€";} ?></p>
                                 <p class="festival27F_places" style="margin-left: 340px; margin-top: 10px;">Places restantes: <?= $data[$index]['ticket_count_d1'] ?></p>
                             </div>
                             <a class="carreRose" style="display: block" href="pick_fest.php?id=<?= $_GET['id']?>&day=3">
                                 <img class="plus" src="assets/img/plus.png" alt="">
                             </a>
                         </div>
                     </div>
                 </section>
             </div>
         </header>
    </body>
</html>
