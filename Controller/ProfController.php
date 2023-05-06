<?php

$action = $_GET["action"];

switch($action){

    case "accueil":
        if(isset($_SESSION["autorisation"]) && $_SESSION["autorisation"] == "OK"){
            $_GET["action"] = "listeP";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuth.php");
        }

        break;

    case "verif":
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $result = Prof::verifMdp($login, $mdp);
        $idP = $result->IDPROF;
        if($result){
            $_SESSION["autorisation"] = "OK";
            $_SESSION["idProf"] = $idP;
            $_GET["action"] = "listeP";
            include("Controller/SeanceController.php");
        }else{
            include("View/formAuth.php");
        }

}

?>