<?php

$action = $_GET["action"];


switch($action){
    case "liste":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
        $lesAdherents = Eleve::getAll();

        include("View/employe/cListeAdh.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    case "inscription":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
        $idprof = $_GET["idprof"];
        $nums = $_GET["nums"];
        $lesAdherents = Eleve::getNotInSeance($idprof, $nums);

        include("View/employe/cListeAdhInscription.php");
        }else{
            include("View/formAuth.php");
        }
        break;

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


    case "valideAjout":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $eleve = new Eleve();
            $eleve->setNom($_POST["nom"]);
            $eleve->setPrenom($_POST["prenom"]);
            $eleve->setTel($_POST["telephone"]);
            $eleve->setMail($_POST["mail"]);
            $eleve->setAdresse($_POST["adresse"]);
            $eleve->setBourse($_POST["bourse"]);
            
            $nb = Eleve::addEleve($eleve);

            if($nb == 1){
                $_SESSION["message"] = "L'adhérent a été ajouté";
            }

            header('Location: index.php?uc=ajouterAdherent');
        }else{
            include("View/formAuth.php");
        }
        break;
}
?>