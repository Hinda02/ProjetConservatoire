<?php

$action = $_GET["action"];


switch($action){
    case "liste":
        $lesCours = Seance::getAll();
        
        foreach($lesCours as $cours){
            $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
        }

        include("View/employe/cListeCours.php");
        break;

    case "listeP":
        $lesCours = Seance::getByIdProf($_SESSION["idProf"]);
        
        foreach($lesCours as $cours){
            $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
        }

        include("View/prof/cListeCoursProf.php");
        break;

    case "inscription":
        $ideleve = $_GET["ideleve"];
        $lesCours = Seance::getAll();

        foreach($lesCours as $cours){
            $lesProfs[$cours->IDPROF] = Prof::getById($cours->IDPROF);
        }

        include("View/employe/cListeCoursInscription.php");
        break;

}
?>