<?php
try {
    $connection = new PDO("mysql:user=root;dbname=000_SI_database;", "root", "root");
} catch(PDOException $e) {
    echo "Connection failed!<br>";
    echo "Sorry, but we are unable to load the page: " . $e->getMessage();
    exit;
}
?>