<?php

$action = $_GET["action"];

switch($action){

    case "recherche":

        $result = Instrument::rechercheInstrument($instrument);
        if($result){

            $_GET["action"] = "liste";
            include("Controller/SeanceController.php");
        }else {
            include("View/formAthentification.php");
        }
}
?>
