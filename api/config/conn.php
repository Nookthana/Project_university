<?php
$servername = "localhost";
$username = "root";
$password = "root";

date_default_timezone_set('Asia/Bangkok');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token");
header("Access-Control-Allow-Credentials: true");

try {
  $conn = new PDO("mysql:host=$servername;dbname=584244013_nook", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET NAMES 'utf8mb4'");
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
