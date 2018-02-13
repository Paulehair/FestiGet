<?php
/**
 * Created by PhpStorm.
 * User: pauleherman
 * Date: 13/02/2018
 * Time: 13:01
 */

?>

<?php

try {
    $conn = new PDO('mysql:dbname=database;host=localhost', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}

?>
