<?php

session_start();
require_once "connection.php";

// RETRIEVE DATA FROM DATABASE
$data_fetcher = $connection->prepare("
SELECT
  `id`,
  `ticket_count_d" . ($_GET["day"]) . "`
FROM
  `fest`");
$data_fetcher->execute();
$data = $data_fetcher->fetchAll();

$i = 0;
while (isset($data[$i])) {
    if ($data[$i]["id"] == intval($_GET["id"])) {
        if (isset($_SESSION["tickets"][$_GET["id"]][$_GET["day"]])) {
            $_SESSION["tickets"][$_GET["id"]][$_GET["day"]]++;
        }
        if (!isset($_SESSION["tickets"])) {
            $_SESSION["tickets"] = array();
        }
        if (!isset($_SESSION["tickets"][$_GET["id"]])) {
            $_SESSION["tickets"][$_GET["id"]] = array();
        }
        if (!isset($_SESSION["tickets"][$_GET["id"]][$_GET["day"]])) {
            $_SESSION["tickets"][$_GET["id"]][$_GET["day"]] = 1;
        }
    }
    $i++;
}
header("Location: home.php?id=" . $_GET["id"]);

?>