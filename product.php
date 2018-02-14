<?php

require_once "connection.php";

// RETRIEVE DATA FROM DATABASE
$data_fetcher = $connection->prepare("SELECT id, name, place, start, end, ticket_count_d1, ticket_count_d2, ticket_count_d3 FROM fest");
$data_fetcher->execute();
$data = $data_fetcher->fetchAll();
$i = 0;
while (isset($data[$i])) {
    $i++;
    if ($data[$i]["id"] == $_GET["id"]) {
        $index = $i;
    }
    if (!isset($index)) {
        echo "The product you are looking for doesn't exist!<br>";
        echo "<a href='./home.php'>Go back to the homepage</a>";
        exit;
    }
}

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Festiget</title>
        <link rel="stylesheet" href="assets/css/product.css">
        <link rel="shortcut icon" href=".ico">
        <link rel="stylesheet" href="assets/css/reset.css">
    </head>
    <body>
         <header class="header">
             <div class="Container">
                 <section class="homePage">
                     <!-- LOGO -->
                     <div class="headerLogo">
                         <h1 class="H1">FESTI<span class="getcolor">GET</span></h1>
                         <h2 class="H2">get to your festival</h2>
                     </div>
                     <!-- RECHERCHER -->
                     <div class="headerRechercher">
                         <img class="cadi" src="assets/img/cartcadi.png" alt="">
                         <img class="PP" src="assets/img/pp.png" alt="">
                         <h1 class="Rechercher">Search….</h1>
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
                     <!-- RECTANGLE ROSE -->
                     <div class="rectangle">
                         <div class="button_day" style="<?php if ($data[$index]['ticket_count_d1'] == -1) {echo "display: none";} ?>">
                             <div class="rectangleRose">
                                 <p class="festival27F">Day 1</p>
                             </div>
                             <div class="carreRose">
                                 <img class="plus" src="assets/img/plus.png" alt="">
                             </div>
                         </div>
                         <div class="button_day" style="<?php if ($data[$index]['ticket_count_d2'] == -1) {echo "display: none";} ?>">
                             <div class="rectangleRose2">
                                <p class="festival27F">Day 2</p>
                             </div>
                             <div class="carreRose">
                                 <img class="plus" src="assets/img/plus.png" alt="">
                         </div>
                         </div>
                         <div class="button_day" style="<?php if ($data[$index]['ticket_count_d3'] == -1) {echo "display: none";} ?>">
                             <div class="rectangleRose3">
                                 <p class="festival27F">Day 3</span></p>
                             </div>
                             <div class="carreRose">
                                 <img class="plus" src="assets/img/plus.png" alt="">
                             </div>
                         </div>
                     </div>
                 </section>
             </div>
         </header>
    </body>
</html>