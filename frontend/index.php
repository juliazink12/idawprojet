<?php
    require_once('template_header.php');
    require_once('accueil.php');
    
    $currentPageId = 'accueil';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }

    $pageToInclude = $currentPageId . ".php";
    if(is_readable($pageToInclude)) {
        require_once($pageToInclude);
    }
    else {
        /*require_once("error.php");*/
        echo("error");
    }

    require_once('template_footer.php');
?>