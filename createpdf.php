<?php
require('Model/fpdf/fpdf.php');
require('Model/pdf.php');
require('Model/monPdo.php');
require('Model/Seance.php');
require('Model/Personne.php');
require('Model/Eleve.php');
require('Model/Prof.php');

session_start();
$lesAdherents = $_SESSION["lesAdherents"];
$laSeance = $_SESSION["laSeance"];
$leProf = $_SESSION["leProf"];

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

//Description
$pdf->Cell(2);
$pdf->Cell(35,43,'Cours: '.utf8_decode($leProf->INSTRUMENT) ,0,0,'L');
$pdf->Ln(4);
$pdf->Cell(2);
$pdf->Cell(35,46,'Professeur: '.utf8_decode($leProf->NOM.' '.$leProf->PRENOM) ,0,0,'L');
$pdf->Ln(4);
$pdf->Cell(2);
$pdf->Cell(35,49,utf8_decode('Liste des adhérents au cours du '.$laSeance->JOUR).' de '.$laSeance->TRANCHE ,0,0,'L');

//contenu: liste des adhérents
    $position_detail = 92; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (70+8)
    //pour chaque ligne du panier
   foreach($lesAdherents as $adherent)
   {
    $pdf->SetFont('Arial','',10);
    // position abscisse de la colonne 1 (10mm du bord)
    $pdf->SetY($position_detail);
    $pdf->SetX(12);
    $pdf->MultiCell(45,8,utf8_decode($adherent->NOM).' '.utf8_decode($adherent->PRENOM),1,'C');
    // position abscisse de la colonne 2 (70 = 10 + 60)  
    $pdf->SetY($position_detail);
    $pdf->SetX(58); 
    $pdf->MultiCell(40,8,$adherent->TEL ,1,'C');
    // position abscisse de la colonne 3 (110 = 70+ 40)
    $pdf->SetFont('Arial','',8);
    $pdf->SetY($position_detail);
    $pdf->SetX(99); 
    $pdf->MultiCell(50,8, $adherent->MAIL,1,'C');
    // position abscisse de la colonne 4 ……
    $pdf->SetFont('Arial','',8);
    $pdf->SetY($position_detail);
    $pdf->SetX(150); 
    $pdf->MultiCell(50,8, utf8_decode($adherent->ADRESSE),1,'C');

    // on incrémente la position ordonnée de la ligne suivante (+8mm = hauteur des cellules)  
    $position_detail += 8; 
   }

//entete du tableau
$pdf->SetFont('Arial','',14);
$position_entete = 84;
$pdf->SetTextColor(0);
entete_table($position_entete);

$pdf->Output("", "Liste_adherents", true); // permet l’affichage

function entete_table($position_entete) {
    global $pdf;
    $pdf->SetDrawColor(76, 76, 76); // Couleur du fond RVB
    $pdf->SetFillColor(138, 131, 247); // Couleur des filets RVB
    $pdf->SetTextColor(0); // Couleur du texte noir
    $pdf->SetY($position_entete);
    // position de colonne 1 (10mm à gauche)  
    $pdf->SetX(12);
    $pdf->Cell(45,8,utf8_decode('Adhérent'),1,0,'C',1);  // 60 >largeur colonne, 8 >hauteur colonne
    // position de la colonne 2 (70 = 10+60)
    $pdf->SetX(58); 
    $pdf->Cell(40,8,utf8_decode('Téléphone'),1,0,'C',1);
    // position de la colonne 3 (110 = 70+40)
    $pdf->SetX(99); 
    $pdf->Cell(50,8,'E-Mail',1,0,'C',1);
     //position de la colonne 4 
    $pdf->SetX(150); 
    $pdf->Cell(50,8,'Adresse',1,0,'C',1);
  }

?>