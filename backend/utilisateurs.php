<?php
include 'config.php';

function get_users($conn){
  // Create connection
    $sql = "SELECT * FROM utilisateur";
    $exe= $conn->query($sql);
    $result = $exe->fetch_all(MYSQLI_ASSOC);
    return $result;
    }
function add_user($conn){
    $sql = "INSERT INTO  utilisateur (LOGIN,NOM,PRENOM,AGE,SEXE,SPORT) VALUES (?,?,?,?,?,?);";
    $stmt = $conn->prepare($sql);
    if(isset($_POST['LOGIN'])){
        $login = $_POST['LOGIN'];
        $nom= $_POST['NOM'];
        $prenom = $_POST['PRENOM'];
        $age = $_POST['AGE'];
        $sexe = $_POST['SEXE'];
        $sport = $_POST['SPORT'];
        if($stmt){
            $stmt->bind_param('ssss',$login,$nom,$prenom,$age,$sexe,$sport);
            $stmt->execute();
        }
    }    
    $conn->close();
    return $stmt;
    }
function remove_user($conn){
    // see: https://stackoverflow.com/questions/4429319/you-cant-specify-target-table-for-update-in-from-clause
    $sql = "DELETE from utilisateur 
    WHERE ID = ?)";
    $stmt = $conn->prepare($sql);
    $login = $_GET['login'];
    if($stmt){
        $stmt->bind_param('s',$login);
        $stmt->execute();
    }
    $conn->close(); 
    return $stmt;
    }

function edit_user($conn){
    $sql = "UPDATE utilisateur 
    SET 
        utilisateur.nom = ?,
        utilisateur.prenom = ?,
        utilisateur.age = ?,
        utilisateur.sexe = ?,
        utilisateur.sport = ? 
    WHERE login = ? "   
    $stmt = $conn->prepare($sql);
    if(isset($_POST['LOGIN'])){
        $nom = $_POST['NOM'];
        $prenom = $_POST['PRENOM'];
        $age = $_POST['AGE'];
        $sexe = $_POST['SEXE'];
        $sport = $_POST['SPORT'];
        $login = $_POST['LOGIN'];
        if($stmt){
            $stmt->bind_param('ssssss',$nom,$prenom,$age,$sexe,$sport,$login);
            $stmt->execute();
        }
    }
    $conn->close(); 
    return $stmt;
    }
switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = get_users($conn);
        break;
    case 'POST':
        $result = add_user($conn);
        break;
    case 'DELETE':
        $result = remove_user($conn);
        break;
    case 'PUT':
        $result = edit_user($conn);
        break;       
}
exit(json_encode($result));