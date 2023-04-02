<?php
    include("View/header.php");
    include("Model/monPdo.php");
    include("Model/Employe.php");
    include("Model/Seance.php");

    if(empty($_GET["uc"])){
        $uc = "authentification";
    }else{
        $uc = $_GET["uc"];
    }
    
    switch($uc){
        case "authentification":
            include("View/formAuthentification.php");
            break;
    
        case "cours":
            include("Controller/SeanceController.php");
            break;
    
        case "employe":
            include("Controller/EmployeController.php");
            break;
    
    }

    include("View/footer.php");
?>