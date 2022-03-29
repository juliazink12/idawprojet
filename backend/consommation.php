<?php
require('config.php');

function get_conso($conn){
    //get 'consommation' over a set time interval
    $sql = "SELECT nom as 'nom',date as 'date' FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali";
    if(isset($_POST['span'])){
        $span = $_POST['span'];
        switch($span){
            case 'd':
                //today
                $sql = "SELECT nom,date FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL 0 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'w':
            //past week
                $sql = "SELECT nom,date FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'm':
            //past month
                $sql = "SELECT nom,date FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -31 DAY) 
                        and   date <= CURDATE()";
                break;
            case 'y';
            //past year 
                $sql = "SELECT nom,date FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali
                        WHERE date >= DATE_ADD(CURDATE(), INTERVAL -1 YEAR) 
                        and   date <= CURDATE()";
                break;
            case 'a';
                $sql =  "SELECT nom,date FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali";
            //all
                break;
        }
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$result = get_conso($conn);
exit(json_encode($result));