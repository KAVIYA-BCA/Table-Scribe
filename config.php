<?php
$host = 'localhost';
$db = 'restaurant_booking';
$user = 'root'; // Change this to your MySQL username
$pass = ''; // Change this to your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
