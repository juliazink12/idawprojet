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
    // $login = $_POST["login"];
    $nom = $_POST["nom"];
    $stmt = $conn->prepare("SELECT id_ali INTO @id1 FROM aliment WHERE aliment.nom = :nom LIMIT 1;INSERT INTO  consommation (id_ali,quantite,date) VALUES (@id1,:quantite,:date)");
    $stmt->bindValue(':quantite', $quantite, PDO::PARAM_STR);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    // $stmt->bindValue(':login', $type, PDO::PARAM_STR);
    $stmt->bindValue(':nom', $nom, PDO::PARAM_INT);
    $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stmt;
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
    // $login = $_POST["login"];
    $nom = $_POST["nom"];
    $stmt = $conn->prepare("SELECT id_ali INTO @id1 FROM aliment WHERE aliment.nom = :nom LIMIT 1;UPDATE consommation set quantite=:quantite,date=:date,id_ali=@id1
    WHERE consommation.id_conso=:id_conso");
    if(isset($_GET["id_conso"])){
        $id_conso = $_GET["id_conso"];
        $stmt->bindValue(':quantite', $quantite, PDO::PARAM_STR);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        // $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':id_conso', $id_conso, PDO::PARAM_INT);
        $stmt->execute();
    }
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