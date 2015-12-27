<?php

$db = "new_year_members";
$user = "root";
$pass = "";
$host = "127.0.0.1";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=' . $db, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}