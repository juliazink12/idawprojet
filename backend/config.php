<?php
$host = 'localhost';
$username = 'root';
$password = '' ;
$dbname = 'imm';

// $conn = new mysqli($host, $username,$password,$dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// //ensure utf8 character encoding
// mysqli_set_charset($conn, "utf8");

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->exec("set names utf8mb4");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}