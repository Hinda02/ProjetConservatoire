<?php

$action = $_GET["action"];

switch($action){
    case "accueil":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "OK"){
            $_GET["action"] = "liste";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuthentification.php");
        }
        
        break;

    case "verif":
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $result = Employe::verifier($login, $mdp);
        if($result){
            $_SESSION["autorisation"] = "OK";
            $_GET["action"] = "liste";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAthentification.php");
        }
        break;

    case "deconnexion":
        Employe::deconnexion();
        include("view/accueil.php");


}
?>