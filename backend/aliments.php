<?php
include 'config.php';

function get_aliments($conn){
  // Create connection
    $sql = "SELECT aliment.nom FROM aliment LIMIT 4";
    $exe= $conn->query($sql);
    $result = $exe->fetch_all(MYSQLI_ASSOC);
    return $result;
    }
$result = get_aliments($conn);

exit(json_encode($result));