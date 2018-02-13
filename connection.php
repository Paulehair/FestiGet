<?php
try {
    $connection = new PDO("mysql:user=root;dbname=database;", "root", "");
} catch(PDOException $e) {
    echo "Connection failed! " . $e->getMessage();
    exit;
}
echo "Connection succeeded";
?>