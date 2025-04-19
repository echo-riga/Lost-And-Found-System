<?php
$host = 'firebase';       
$db = 'lostandfound';      
$user = 'root';           
$pass = 'redmercy44';                

$mysqli = new mysqli($host, $user, $pass, $db, 3308);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>