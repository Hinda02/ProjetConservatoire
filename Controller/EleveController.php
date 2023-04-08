<?php

$action = $_GET["action"];


switch($action){
    case "liste":
        $lesCours = Seance::getAll();
        
        foreach($lesCours as $cours){
            $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
        }

        include("View/cListeCours.php");
        break;

    case "bonbon":
        $recherche = $_POST["choice"];
        $donnees = Produit::securiser($recherche);
        $lesProduits = Produit::rechercher($donnees);
        include("view/listeProduits.php");
        break;

    case "ajout":
        include("view/formAjout.php");
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