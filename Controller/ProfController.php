<?php

$action = $_GET["action"];

switch($action){

    // Traitement d'affichage de la liste des séances 
    case "accueil":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "prof"){
            $_GET["action"] = "listeP";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuth.php");
        }

        break;
        
    // Traitement de login et mdp
    case "verif":
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $result = Prof::verifMdp($login, $mdp);
        $idP = $result->IDPROF;
        if($result){
            $_SESSION["user"] = $login;
            $_SESSION["autorisation"] = "prof";
            $_SESSION["idProf"] = $idP;
            $_GET["action"] = "listeP";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuth.php");
        }
        break;

    // Traitement de la déconnection 
    case "deconnexion":
        Prof::deconnexion();
        header("Location: index.php");
        break;

}

?>