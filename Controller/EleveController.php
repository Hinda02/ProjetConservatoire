<?php

$action = $_GET["action"];


switch($action){
    case "liste":
        $lesAdherents = Eleve::getAll();

        include("View/employe/cListeAdh.php");
        break;

    case "inscription":
        $idprof = $_GET["idprof"];
        $nums = $_GET["nums"];
        $lesAdherents = Eleve::getNotInSeance($idprof, $nums);

        include("View/employe/cListeAdhInscription.php");
        break;

    case "listeA":
        $idprof = $_GET["idprof"];
        $nums = $_GET["nums"];
        $lesAdherents = Eleve::getInSeance($idprof, $nums);

        include("View/prof/cListeAdhProf.php");
        break;


    case "valideAjout":

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
        
        break;
}
?>