<?php

$action = $_GET["action"];


switch($action){
    case "liste":
        $lesAdherents = Eleve::getAll();

        include("View/cListeAdh.php");
        break;

    case "bonbon":
        $recherche = $_POST["choice"];
        $donnees = Produit::securiser($recherche);
        $lesProduits = Produit::rechercher($donnees);
        include("view/listeProduits.php");
        break;

    case "inscription":
        $idprof = $_GET["idprof"];
        $nums = $_GET["nums"];
        $lesAdherents = Eleve::getNotInSeance($idprof, $nums);

        include("View/cListeAdhInscription.php");
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