<?php
require('config.php');

function get_conso($conn){
    //get 'consommation' over a set time interval
    $sql = "SELECT id_conso,nom as 'nom',date as 'date',quantite as 'quantite' FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali";
    if(isset($_POST['span'])){
        $span = $_POST['span'];
        switch($span){
            case 'day':
                //today
                $sql = "SELECT id_conso,nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL 0 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'week':
            //past week
                $sql = "SELECT id_conso,nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'month':
            //past month
                $sql = "SELECT id_conso,nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -31 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'year';
            //past year 
                $sql = "SELECT id_conso,nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -1 YEAR) 
                        and   date <= CURDATE()";
                break;
            case 'all';
                $sql =  "SELECT id_conso,nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali";
            //all
                break;
        }
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function add_conso($conn){
    $quantite = $_POST["quantite"];
    $date = $_POST["date"];
    $login = $_POST["login"];
    $id_ali = $_POST["id_ali"];
    $stmt = $conn->prepare("INSERT INTO  consommation (quantite,date) VALUES (:quantite,:date)");
    $stmt->bindValue(':quantite', $type, PDO::PARAM_FLOAT);
    $stmt->bindValue(':date', $type, PDO::PARAM_STR);
    // $stmt->bindValue(':login', $type, PDO::PARAM_STR);
    $stmt->bindValue(':id_ali', $type, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function delete_conso($conn){
    if(isset($_POST["id_conso"])){
        $id_conso = $_POST["id_conso"];
        // echo($id_conso);
        $stmt = $conn->prepare("DELETE FROM consommation WHERE id_conso = :id_conso");
        $stmt->bindValue(':id_conso', $id_conso, PDO::PARAM_INT);
        $stmt->execute();
        //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
function update_conso($conn){
    $quantite = $_POST["quantite"];
    $date = $_POST["date"];
    $login = $_POST["login"];
    $id_ali = $_POST["nom"];
    $stmt = $conn->prepare("UPDATE consommation set quantite=:quantite,date=:date,login=:login,id_ali=(SELECT consommation.id_ali WHERE consommation.nom=:nom)");
    $stmt->bindValue(':quantite', $quantite, PDO::PARAM_FLOAT);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->bindValue(':nom', $id_ali, PDO::PARAM_STR);
    $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stmt;
}
$result = get_conso($conn);
if(isset($_GET["op"])){
    switch($_GET["op"]) {
        case 'get':
            $result = get_conso($conn);
            break;
        case 'add':
            $result = add_conso($conn);
            break;
        case 'delete':
            $result = delete_conso($conn);
            break;
        case 'update':
            $result = update_conso($conn);
            break;       
    }
}
exit(json_encode($result));