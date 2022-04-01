<?php
require('config.php');

function get_conso($conn){
    //get 'consommation' over a set time interval
    $sql = "SELECT nom as 'nom',date as 'date',quantite as 'quantite' FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali";
    if(isset($_POST['span'])){
        $span = $_POST['span'];
        switch($span){
            case 'day':
                //today
                $sql = "SELECT nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL 0 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'week':
            //past week
                $sql = "SELECT nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'month':
            //past month
                $sql = "SELECT nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -31 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'year';
            //past year 
                $sql = "SELECT nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -1 YEAR) 
                        and   date <= CURDATE()";
                break;
            case 'all';
                $sql =  "SELECT nom,date,quantite FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali";
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
    $result = $conn;
    return $result;
}
function remove_conso($conn){
    $result = $conn;
    return $result;
}
function edit_conso($conn){
    $result = $conn;
    return $result;
}
// switch($_SERVER["REQUEST_METHOD"]) {
//     case 'GET':
//         $result = get_conso($conn);
//         break;
//     case 'POST':
//         $result = add_conso($conn);
//         break;
//     case 'DELETE':
//         $result = remove_conso($conn);
//         break;
//     case 'PUT':
//         $result = edit_conso($conn);
//         break;       
// }
$result = get_conso($conn);
exit(json_encode($result));