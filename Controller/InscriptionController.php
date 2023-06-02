<?php

$action = $_GET["action"];

switch($action){

    // Traitement de l'affichage des séances et des inscrits 
    // Utilisation de fonction GetById_NumSeance et getBySeance
    case "liste":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $idprof = $_GET["idprof"];
            $nums = $_GET["nums"];
            $cours = Seance::getById_NumSeance($idprof, $nums);
            $lesInscriptions = Inscription::getBySeance($cours);
            
            foreach($lesInscriptions as $inscription){
                $lesEleves[$inscription->IDELEVE] = Eleve::getById($inscription->IDELEVE);
            }

            include("View/employe/cListeInscriptions.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    // Traitement de la liste des élèves inscrit à un cours d'un prof 
    // Utilisation des fonction getByEleve et getById    
    case "listeParAdh":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $eleve = $_GET["ideleve"];
            $lesInscriptions = Inscription::getByEleve($eleve);
            
            foreach($lesInscriptions as $inscription){
                $lesProfs[$inscription->IDPROF] = Prof::getById($inscription->IDPROF);
            }

            include("View/employe/cListeInscriptionsAdh.php");
        }else{
            include("View/formAuth.php");
        }
        break;
        
    // Traitement des inscrits 
    // message de validation 
    case "inscrire":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $idprof = $_GET["idprof"];
            $ideleve = $_GET["ideleve"];
            $nums = $_GET["nums"];
            $nb = Inscription::inscrire($idprof, $ideleve, $nums);

            if($nb == 1){
                $_SESSION["message"] = "L'adhérent a été inscrit à ce cours";
            }

            header('Location: index.php?uc=cours&action=liste');
        }else{
            include("View/formAuth.php");
        }
        break;

    // Traitement de supression d'une séance 
    // Message de supression 
    case "supprimer":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $idprof = $_GET["idprof"];
            $ideleve = $_GET["ideleve"];
            $nums = $_GET["nums"];
            $nb = Inscription::delete($idprof, $ideleve, $nums);

            if($nb == 1){
                $_SESSION["message"] = "Cette inscription a été annulée";
            }

            header('Location: index.php?uc=cours&action=liste');
        }else{
            include("View/formAuth.php");
        }
        break;

        case "inscrire":
            if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
                $idprof = $_GET["idprof"];
                $ideleve = $_GET["ideleve"];
                $nums = $_GET["nums"];
                $nb = Inscription::inscrire($idprof, $ideleve, $nums);
    
    
                include("View/employe/cListeInscriptionsAdh.php");
            }else{
                include("View/formAuth.php");
            }
            break;

            case "recherchec":
                if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
                    $instrument = $_POST["recherchec"];
                    $idprof = $_GET["idprof"];
                    $ideleve = $_GET["ideleve"];
                    $nums = $_GET["nums"];
                    $nb = Inscription::inscrire($idprof, $ideleve, $nums);
        
        
                    include("View/employe/cListeCoursInscription.php");
                }else{
                    include("View/formAuth.php");
                }
                break;

                case "rechercheins":
                    if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
                        $instrument = $_POST["rechercheins"];
                        $idprof = $_GET["idprof"];
                        $ideleve = $_GET["ideleve"];
                        $nums = $_GET["nums"];
                        $nb = Inscription::inscrire($idprof, $ideleve, $nums);
            
            
                        include("View/employe/cListeInscriptions.php");
                    }else{
                        include("View/formAuth.php");
                    }
                    break;


}
?>