<?php
require_once('../fpdf/fpdf.php');
require_once('../tfpdf/tfpdf.php');
require_once('../Datos/DaoLugaresOcupados.php');
class PDF extends tfpdf
{
	$daoUsuario = new DaoLugaresOcupados();
	$Reservacion = 27;#$_COOKIE["idViaje"];
	function Header()
	{
		global $title;
		$this->Image('../Vistas/img/Excursiones Lore Pantoja.png',10,8,33);

		$this->SetFont('Arial','B',30);

		$this->Cell(200,30,'Excursiones Lore Pantoja',0,0,'C');
		$this->Ln(40);
	}

	function Footer()
	{
    // Posición a 1,5 cm del final
		$this->SetY(-15);
    // Arial itálica 8
		$this->SetFont('Arial','I',8);
    // Color del texto en gris
		$this->SetTextColor(128);
    // Número de página
		$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
	}

	function ChapterTitle()
	{
    // Arial 12
		$this->SetFont('Arial','',16);
    // Color de fondo
		$this->SetFillColor(0,0,0);
	// Color de Letra
		$this->SetTextColor(255,255,255);
    // Título
		$this->Cell(0,6,"Informacion del Usuario",0,0,'C',true);
    // Salto de línea
		$this->Ln(4);
	}

	function ChapterBody()
	{
		$this->Ln(10);
		$this->SetTextColor(0,0,0);
    // Times 12
		$this->SetFont('Times','',18);
    // Imprimimos el texto justificado
		$this->Cell(0,20,"Nombre: ");
    // Salto de línea
		$this->Ln(10);
		$this->Cell(0,20, $daoUsuario->getNombreCompleto($Reservacion));
    // Cita en itálica
		$this->SetFont('','I');
	}

	function PrintChapter()
	{
		$this->SetTextColor(0,0,0);
		$this->AddPage();
		$this->ChapterTitle();
		$this->ChapterBody();
	}
}
$pdf = new PDF();
$title = 'Reservacion';
$pdf->SetTitle($title);
$pdf->SetAuthor('Excursiones Lore Pantoja');
$pdf->PrintChapter();
ob_end_clean();
$pdf->Output();


?>