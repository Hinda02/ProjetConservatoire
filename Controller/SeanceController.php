<?php

$action = $_GET["action"];


switch($action){

    // Traitement de la liste des cours 
    // Utilisation des fonctions getAll et getById
    case "liste":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $lesCours = Seance::getAll();
            
            foreach($lesCours as $cours){
                $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
            }

            include("View/employe/cListeCours.php");
        }else{
            include("View/formAuth.php");
        }
        break;
    
    // Traitement de l'affichage de la liste des profs
    case "listeP":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "prof"){
            $lesCours = Seance::getByIdProf($_SESSION["idProf"]);
        
            foreach($lesCours as $cours){
                $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
            }

            include("View/prof/cListeCoursProf.php");
            
        }else{
            include("View/formAuth.php");
        }
        break;

    // traitement de la liste des inscripts à un cours donné 
    case "inscription":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $ideleve = $_GET["ideleve"];
            $lesCours = Seance::getAll();

            foreach($lesCours as $cours){
                $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
            }

            include("View/employe/cListeCoursInscription.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    // Traitement de recherche d'un séance avec le noms de l'instrument
    case "recherche":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $instrument = $_POST["recherche"];
            $lesCours = Seance::rechercheSeance($instrument);

            foreach($lesCours as $cours){
                $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
            }
                
            include("View/employe/cListeCours.php");
        }else{
            include("View/formAuth.php");
        }
        break;


        case "rechercheadh":
            if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
                $instrument = $_POST["rechercheadh"];
                $lesCours = Seance::rechercheSeance($instrument);
    
                foreach($lesCours as $cours){
                    $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
                }
                    
                include("View/employe/cListeCours.php");
            }else{
                include("View/formAuth.php");
            }
            break;

            

    

}
?>