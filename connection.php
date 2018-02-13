<?php
try {
    $connection = new PDO("mysql:user=root;dbname=000_SI_database;", "root", "");
} catch(PDOException $e) {
    echo "Connection failed! " . $e->getMessage();
    exit;
}
?>