<?php

require_once "connect_server.php";

session_start();

$query = "DELETE FROM `fest` WHERE id = " . $_POST["delete_id"];
$connection->exec($query);
//var_dump($connection->errorInfo());

header("Location: home.php");

?>