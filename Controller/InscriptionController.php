<?php

$action = $_GET["action"];

switch($action){
    case "liste":
        $idprof = $_GET["idprof"];
        $nums = $_GET["nums"];
        $cours = Seance::getById_NumSeance($idprof, $nums);
        $lesInscriptions = Inscription::getBySeance($cours);
        
        foreach($lesInscriptions as $inscription){
            $lesEleves[$inscription->IDELEVE] = Eleve::getById($inscription->IDELEVE);
        }

        include("View/employe/cListeInscriptions.php");
        break;

    case "listeParAdh":
        $eleve = $_GET["ideleve"];
        $lesInscriptions = Inscription::getByEleve($eleve);
        
        foreach($lesInscriptions as $inscription){
            $lesProfs[$inscription->IDPROF] = Prof::getById($inscription->IDPROF);
        }

        include("View/employe/cListeInscriptionsAdh.php");
        break;

    case "inscrire":
        $idprof = $_GET["idprof"];
        $ideleve = $_GET["ideleve"];
        $nums = $_GET["nums"];
        $nb = Inscription::inscrire($idprof, $ideleve, $nums);

        if($nb == 1){
            $_SESSION["message"] = "L'adhérent a été inscrit à ce cours";
        }

        header('Location: index.php?uc=cours&action=liste');

        break;

    case "supprimer":
        $idprof = $_GET["idprof"];
        $ideleve = $_GET["ideleve"];
        $nums = $_GET["nums"];
        $nb = Inscription::delete($idprof, $ideleve, $nums);

        if($nb == 1){
            $_SESSION["message"] = "Cette inscription a été annulée";
        }

        header('Location: index.php?uc=cours&action=liste');

        break;


}
?>