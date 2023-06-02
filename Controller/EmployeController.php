<?php

$action = $_GET["action"];

switch($action){
    case "accueil":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "emp"){
            $_GET["action"] = "liste";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuth.php");
        }
        
        break;

    case "verif":
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        try{
            $result = Employe::verifier($login, $mdp);
        }catch(Exception $ex){
            $_SESSION["message"] = "Login ou mot de passe incorrecte. <br>Veuillez réessayer.";
        }
        
        if($result){
            
            $_SESSION["user"] = $login;
            $_SESSION["autorisation"] = "emp";
            $_GET["action"] = "liste";
            include("Controller/SeanceController.php");
        }else{
            $_SESSION["message"] = "Login ou mot de passe incorrecte. <br>Veuillez réessayer.";
            include("View/formAuth.php");
        }
        break;

    case "deconnexion":
        Employe::deconnexion();
        header("Location: index.php");

}
?>