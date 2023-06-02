<?php

$action = $_GET["action"];

switch($action){

    // Traitement pour afficher la liste des séances 
    case "accueil":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $_GET["action"] = "liste";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuth.php");
        }
        
        break;
        
    // Vérification du login et Mdp
    case "verif":
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $result = Employe::verifier($login, $mdp);
        if($result){
            $_SESSION["user"] = $login;
            $_SESSION["autorisation"] = "emp";
            $_GET["action"] = "liste";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    // Déconnection de l'employé   
    case "deconnexion":
        Employe::deconnexion();
        header("Location: index.php");

}
?>