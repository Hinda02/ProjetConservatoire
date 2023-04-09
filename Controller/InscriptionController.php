<?php

$action = $_GET["action"];
$idprof = $_GET["idprof"];
$nums = $_GET["nums"];

switch($action){
    case "liste":
        $cours = Seance::getById_NumSeance($idprof, $nums);
        $lesInscriptions = Inscription::getBySeance($cours);
        
        foreach($lesInscriptions as $inscription){
            $lesEleves[$inscription->IDELEVE] = Eleve::getById($inscription->IDELEVE);
        }

        include("View/cListeInscriptions.php");
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
        $nb = Inscription::inscrire($idprof, $ideleve, $nums);

        if($nb == 1){
            $_SESSION["message"] = "L'adhérent a été inscrit à ce cours";
        }

        header('Location: index.php?uc=cours&action=liste');

        break;


}
?>