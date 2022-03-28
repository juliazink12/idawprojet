<?php
$host = 'localhost';
$username = 'root';
$password = '' ;
$dbname = 'imm';

$conn = new mysqli($host, $username,$password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");