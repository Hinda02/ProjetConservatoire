<?php

$action = $_GET["action"];


switch($action){
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

    case "recherche":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $instrument = $_POST["recherche"];
            
            try{
                $lesCours = Seance::rechercheSeance($instrument);

                foreach($lesCours as $cours){
                    $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
                }
            }catch(Exception $ex){
                $_SESSION["message"] = "Erreur de saisie.";
            }
                
            include("View/employe/cListeCours.php");
        }else{
            include("View/formAuth.php");
        }
        break;

}
?>