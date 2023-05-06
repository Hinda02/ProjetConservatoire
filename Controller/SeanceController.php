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

    case "listeP":
        $lesCours = Seance::getByIdProf($_SESSION["idProf"]);
        
        foreach($lesCours as $cours){
            $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
        }

        include("View/cListeCoursProf.php");
        break;

    case "bonbon":
        $recherche = $_POST["choice"];
        $donnees = Produit::securiser($recherche);
        $lesProduits = Produit::rechercher($donnees);
        include("view/listeProduits.php");
        break;

    case "inscription":
        $ideleve = $_GET["ideleve"];
        $lesCours = Seance::getAll();

        foreach($lesCours as $cours){
            $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
        }

        include("View/cListeCoursInscription.php");
        break;

}
?>