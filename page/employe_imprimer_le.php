<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
	// Chargement des données
	function LoadData($file)
	{
		// Lecture des lignes du fichier
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
			$data[] = explode(';',trim($line));
		return $data;
	}
	function Header()
	{
		// Logo (colonne, ligne, width)
		// Police Arial gras 24
		$this->SetTextColor(255,10,22);
		$this->SetFont('Arial','B',14);
		// Décalage à droite
		$this->Cell(5);
		// Titre (ligne,titre)
		$this->Cell('',10,'Liste des employes',0,0,'C');
		// Saut de ligne
		$this->Ln(20);
	}

	// Pied de page
	function Footer()
	{
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Arial','I',8);
		// Numéro de page
		$this->Cell(0,10,'Application de gestion des missions');
		$this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
	}

	// Tableau coloré
	function FancyTable($header, $data)
	{
		// Couleurs, épaisseur du trait et police grasse
		$this->SetFillColor(255,255,255); // Couleur d'arrière plan du header 
		$this->SetTextColor(0); // Couleur du texte du header
		$this->SetDrawColor(0,0,0); // Couleur du trait du tableau
		$this->SetLineWidth(.1); // Epaisseur du trait
		$this->SetFont('','B'); 
		// En-tête et largeur de chaque colonne
		$w = array(10, 50, 50, 25, 25, 50, 25, 25, 25, 30);
		// 'idemploye', 'nom', 'prenom', 'cin', 'ddn', 'addresse', 'ville', 'email', 'ddr', 'specialite'
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		$this->Ln();
		// Restauration des couleurs et de la police
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Données
		$fill = false;
		foreach($data as $row)
		{
			// 6 : hauteur de la cellule 
			// LRTB : LEFT RIGHT TOP BOTTOM Position du trait
			$this->Cell($w[0],6,$row[0],'LRTB',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LRTB',0,'L',$fill);
			$this->Cell($w[2],6,$row[2],'LRTB',0,'L',$fill);
			$this->Cell($w[3],6,$row[3],'LRTB',0,'L',$fill);
			$this->Cell($w[4],6,$row[4],'LRTB',0,'L',$fill);
			$this->Cell($w[5],6,$row[5],'LRTB',0,'L',$fill);
			$this->Cell($w[6],6,$row[6],'LRTB',0,'L',$fill);
			$this->Cell($w[7],6,$row[7],'LRTB',0,'L',$fill);
			$this->Cell($w[8],6,$row[8],'LRTB',0,'L',$fill);
			$this->Cell($w[9],6,$row[9],'LRTB',0,'L',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		// Trait de terminaison
		$this->Cell(array_sum($w),0,'','T');
	}
}
//Créer une nouvelle page pdf
$pdf = new PDF();
// Titres des colonnes
$header = array( 'id', 'nom', 'prenom', 'cin', 'ddn', 'addresse', 'ville', 'email', 'ddr', 'specialite' );
// Chargement des données
$data = $pdf->LoadData('employe.txt');
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
