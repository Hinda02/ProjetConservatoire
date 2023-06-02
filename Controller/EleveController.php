<?php

$action = $_GET["action"];


switch($action){

    // Traitement de la list adhérent
    // Utilisation de la fonction getAll
    case "liste":
        
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){

            $lesAdherents = Eleve::getAll();

            include("View/employe/cListeAdh.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    // Traitement des inscriptions
    // Utilisation de la fonction getNoInSeance
    case "inscription":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
        $idprof = $_GET["idprof"];
        $nums = $_GET["nums"];
        $jour = $_GET["jour"];
        $tranche = $_GET["tranche"];
        
        $lesAdherents = Eleve::getNotInSeance($idprof, $nums, $jour, $tranche);

        include("View/employe/cListeAdhInscription.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    // Traitement de la liste des séances
    // Utilisation de la fonction getById_NumSeance
    case "listeA":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "prof"){
            $idprof = $_GET["idprof"];
            $nums = $_GET["nums"];
            $leProf = Prof::getById($idprof);
            $lesAdherents = Eleve::getInSeance($idprof, $nums);
            $laSeance = Seance::getById_NumSeance($idprof, $nums);

            include("View/prof/cListeAdhProf.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    // Traitement de l'ajout d'un adhérent
    // Message de confirmation  
    case "valideAjout":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $eleve = new Eleve();
            $eleve->setNom($_POST["nom"]);
            $eleve->setPrenom($_POST["prenom"]);
            $eleve->setTel($_POST["telephone"]);
            $eleve->setMail($_POST["mail"]);
            $eleve->setAdresse($_POST["adresse"]);
            $eleve->setBourse($_POST["bourse"]);
            try{
            $nb = Eleve::addEleve($eleve);

            }catch(Exception $ex){

                $_SESSION["message"] = "L'adhérent n'a pas pu être ajouté dû à des erreurs de saisie";
            }finally{

            if($nb == 1){
                $_SESSION["message"] = "L'adhérent a été ajouté";
            }

            header('Location: index.php?uc=ajouterAdherent');
            }

        }else{
            include("View/formAuth.php");
        }
        break;
<<<<<<< HEAD
    
    // Traitement de recherche d'un élève 
    case "recherche":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $eleve = $_POST["recherche"];
            $lesAdherents = Eleve::rechercheEleve($eleve);
    
                foreach($lesAdherents as $adherent){
                    $lesAdherents[$adherent->IDELEVE] = Eleve::getById($adherent->IDELEVE);
=======

        case "recherche":
            if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
                $eleve = $_POST["recherche"];
                try{
                    $lesAdherents = Eleve::rechercheEleve($eleve);
                }catch(Exception $ex){
                    $_SESSION["message"] = "Erreur de saisie.";
>>>>>>> a3b124687cc02d97fc6396b60ce6464abe7b89eb
                }
                    
                include("View/employe/cListeAdh.php");
            }else{
                include("View/formAuth.php");
            }
            break;
            
    case "rechercheadh":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $eleve = $_POST["rechercheadh"];
            $lesAdherents = Eleve::rechercheEleve($eleve);
            
               
                            
             include("View/employe/cListeAdhInscription.php");
                    }else{
                        include("View/formAuth.php");
                    }
                    break;

        case "recherchec":
                        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
                         $instrument = $_POST["recherchec"];
                        $lesCours = Seance::rechercheSeance($instrument);
        
                    foreach($lesCours as $cours){
                        $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
                    }
                                include("View/employe/cListeCoursInscription.php");
                            }else{
                                include("View/formAuth.php");
                            }
                            break;

        case "rechercheins":
                                if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
                                 $instrument= $_POST["rechercheins"];
                                 $lesEleves= Seance::rechercheSeance($inscription->IDELEVE);
                
                            foreach($lesInscriptions as $inscription){
                                $lesEleves[$inscription->IDELEVE] = Prof::getById($inscription->IDELEVE);
                            }
                                        include("View/employe/cListeInscriptions.php");
                                    }else{
                                        include("View/formAuth.php");
                                    }
                                    break;

    
    }
?>