<?php
    include("View/header.php");
    //Connexion à la base de données (uniquement dans index.php)
    include("Model/monPdo.php");

    //Inclure tous les Models
    include("Model/Employe.php");
    include("Model/Seance.php");
    include("Model/Personne.php");
    include("Model/Prof.php");
    include("Model/Eleve.php");
    include("Model/Inscription.php");
    include("Model/Heure.php");
    include("Model/Jour.php");
    include("Model/Payer.php");
    include("Model/Trim.php");

    if(empty($_GET["uc"])){
        $uc = "authentification";
    }else{
        $uc = $_GET["uc"];
    }
    
    try {
        switch($uc){
            case "authentification":
                include("View/formAuth.php");
                break;
        
            case "cours":
                include("Controller/SeanceController.php");
                break;
        
            case "employe":
                include("Controller/EmployeController.php");
                break;
    
            case "eleve":
                include("Controller/EleveController.php");
                break;
    
            case "prof":
                include("Controller/ProfController.php");
                break;
    
            case "ajouterAdherent":
                include("View//employe/formAjoutAdh.php");
                break;
    
            case "inscriptions":
                include("Controller/InscriptionController.php");
                break;
        
        }
    }
     catch (Exception $ex) {
        echo "Erreur: " . $ex->getMessage();
    }
    

    include("View/footer.php");
?>