<?php

$action = $_GET["action"];
$idprof = $_GET["idprof"];
$nums = $_GET["nums"];

switch($action){
    case "liste":
        $cours = Seance::getById_NumSeance($idprof, $nums);
        $lesInscriptions = Inscription::getBySeance($cours);
        
        foreach($lesInscriptions as $inscription){
            $lesEleves[$inscription->IDELEVE] = Eleve::getById($inscription->IDELEVE);
        }

        include("View/cListeInscriptions.php");
        break;

    case "bonbon":
        $recherche = $_POST["choice"];
        $donnees = Produit::securiser($recherche);
        $lesProduits = Produit::rechercher($donnees);
        include("view/listeProduits.php");
        break;

    case "ajout":
        include("view/formAjout.php");
        break;

    case "valideAjout":

        $produit = new produit();
        $produit->setNom($_POST["nom"]);
        $produit->setPrix($_POST["prix"]);
        $produit->setPhoto('Images/'.basename($_FILES["image"]["name"]));
        $nom_image = basename($_FILES["image"]["name"]);
        $chemin_destination = 'Images/'.$nom_image;
        move_uploaded_file($_FILES['image']['tmp_name'], $chemin_destination);
        $nb = produit::ajouter($produit);

        if($nb == 1){
            $_SESSION["message"] = "Le produit a été ajouté";
        }

        header('location: index.php?uc=bonbons&action=liste');
        
        break;


}
?>