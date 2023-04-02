<?php

$action = $_GET["action"];

switch($action){
    case "choix":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "OK"){
            include("view/accueil-admin.php");
        }else{
            include("view/formAdmin.php");
        }
        
        break;

    case "verif":
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $result = Employe::verifier($login, $mdp);
        if($result){
            $_SESSION["autorisation"] = "OK";
            include("View/navbar.php");
        }else{
            include("View/formAthentification.php");
        }
        break;

    case "deconnexion":
        Employe::deconnexion();
        include("view/accueil.php");


}