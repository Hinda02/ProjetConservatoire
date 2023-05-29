<?php

$action = $_GET["action"];

case "liste":
    if(isset($_SESSION["recherche"]) && $_SESSION["recherche"] == "emp"){
        $lesInstruments = Instrument::rechercheInstrument();
        

        include("View/employe/cListeInstrument.php");
    // }else{
    //     include("View/formAuth.php");
     }
    break;

?>
