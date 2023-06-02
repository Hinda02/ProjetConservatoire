<?php

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('Images/logoMPT.png',15,11,36);
        // Police Arial gras 15
        $this->SetFont('Courier','B',20);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(35,15,'Conservatoire',0,0,'C');
        // Saut de ligne
        $this->Ln(12);

        $this->Cell(80);
        $this->Cell(33,15,'Musique Pour Tous',0,0,'C');
        $this->Ln(20);

    }

    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 9
        $this->SetFont('Arial','I',9);
        // texte centré (C)
        $this->Cell(0,10,"Conservatoire Musique Pour Tous",0,0,'C');
    }

    

}