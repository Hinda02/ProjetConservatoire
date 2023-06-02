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
        try{
            $result = Prof::verifMdp($login, $mdp);
        }catch(Exception $ex){
            $_SESSION["message"] = "Login ou mot de passe incorrecte. <br>Veuillez réessayer.";
        }
        if($result){
            $idP = $result->IDPROF;
            $_SESSION["user"] = $login;
            $_SESSION["autorisation"] = "prof";
            $_SESSION["idProf"] = $idP;
            $_GET["action"] = "listeP";
            include("Controller/SeanceController.php");
        }else{
            $_SESSION["message"] = "Login ou mot de passe incorrecte. <br>Veuillez réessayer.";
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