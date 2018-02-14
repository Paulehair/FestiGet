<?php

require_once "connection.php";

var_dump($_GET);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Festiget</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href=".ico">
  <link rel="stylesheet" href="assets/css/reset.css">

</head>

<body>
  <header class="header">
    <div class="Container">
      <!-- LOGO -->
      <section class="homePage">
        <div class="hearderLogo">
          <h1 class="H1">FESTI<span class="getcolor">GET</span></h1>
          <h2 class="H2">get to your festival</h2>
        </div>

        <!-- RECHERCHER -->
        <div class="hearderRechercher">
          <img class="cadi" src="assets/img/cartcadi.png" alt="">
          <img class="PP" src="assets/img/pp.png" alt="">
          <h1 class="Rechercher">Search….</h1>
        </div>
        <!-- TEXTE FESTIVAL -->
        <div class="textNomFestival">
          <p class="textPosition">Holocène Festival 2018 </p>
          <div class="picto">
            <img class="share" src="assets/img/share.png" alt="">
            <img class="heart" src="assets/img/heart.png" alt="">
          </div>
        </div>
        <div class="textDate">
          <p class="textPosition2">February 27 - March 3, 2018</p>
        </div>
        <div class="textLieu">
          <div class="Pin">
            <img class="pinPosition" src="assets/img/pin.png" alt="">
          </div>
          <p class="textPosition3">Grenoble, <span class="franceBold">France</span></p>
        </div>
        <!-- RECTANGLE ROSE -->
        <div class="rectangle">

          <div class="rectangleRose">
            <p class="festival27F">27 february 2018 <span>DAVODKA / LORD ESPERANZA / XTREM TOUR</span></p>
          </div>
          <div class="carreRose">
            <img class="plus" src="assets/img/plus.png" alt="">
          </div>
          <div class="rectangleRose2"></div>
          <p class="festival28F">28 february 2018 <span>BEN MAZUE / POMME</span></p>
          <div class="carreRose2">
            <img class="plus" src="assets/img/plus.png" alt="">
          </div>
          <div class="rectangleRose3"></div>
          <p class="festival28F">29 february 2018 <span>BEN MAZUE / POMME</span></p>
          <div class="carreRose3">
            <img class="plus" src="assets/img/plus.png" alt="">
          </div>
        </div>
      </section>
    </div>
  </header>


</body>

</html>