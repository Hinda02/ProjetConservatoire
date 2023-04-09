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

    case "inscrire":
        $idprof = $_GET["idprof"];
        $ideleve = $_GET["ideleve"];
        $nums = $_GET["nums"];
        $nb = Seance::inscrire($idprof, $ideleve, $nums);

        if($nb == 1){
            $_SESSION["message"] = "L'adhérent a été inscrit à ce cours";
        }

        header('Location: index.php?uc=cours&action=liste');

        break;
}
?>