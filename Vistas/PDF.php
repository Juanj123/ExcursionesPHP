<?php
ob_start();
require_once '../fpdf/fpdf.php';
require_once '../Datos/daoPDF.php';
require_once '../Pojos/PojoPDF.php';
$pojo = new PojoPDF();
$daoAPago = new daoPDF();
$dao = new DaoPagos();

$fpdf = new fpdf('P','mm','letter',true);
$fpdf->SetMargins(5,5,5,5);
$fpdf->AddPage('portrait', array(125,150));


$fpdf->SetFont('Courier', 'B', 7);
$fpdf->Cell(20, 2, 'ExcursionesLorePantoja');
$fpdf->Cell(20, 2, '');
$fpdf->Cell(20, 2, '16 de septiembre');
$fpdf->Ln(2);
$fpdf->SetFont('Courier', '', 5);
$fpdf->Cell(20, 2, 'excursiones.lore.pantoja@gmail.com');
$fpdf->Cell(20, 2, '');
$fpdf->Cell(20, 2, 'Telefono: 445-122-0935');

$id=1;
$idViaje = 1;
$lista = $dao->obtenerPagos($id);
$listAnio = $dao->obtenerFechaViajes($idViaje);
$listUsuario = $dao->obtenerUsuarios($id);
$listabla = $dao->obtenerFactura($id, $idViaje);
$lisTotal = $dao->obtenerTotalF($id);


$fpdf->Ln(20);
$fpdf->SetFillColor(239, 239, 239);
$fpdf->Rect(5,25,90,10,'F');
$fpdf->SetFont('Courier', 'B', 7);
foreach ($lista as $clave) {
$fpdf->Cell(20, 2, 'Numero de reservacion: '.$clave->{"idReservacion"});
$fpdf->Ln(2);
$fpdf->SetFont('Courier', '', 5);
$fpdf->Cell(20, 2, 'Fecha de la Factura: '.getdate());
}
$fpdf->Ln(2);
foreach ($listAnio as $clave) {
$fpdf->Cell(20, 2, 'Fecha de Vencimiento: '.$clave->{"dia"}.'/'.$clave->{"mes"}.'/'.$clave->{"año"});
}


$fpdf->Ln(10);
$fpdf->SetFont('Courier', 'B', 5);
$fpdf->Cell(20, 2, 'Facturado a');
$fpdf->Ln(2);
foreach ($listUsuario as $clave) {
$fpdf->SetFont('Courier', '', 5);
$fpdf->Cell(20, 2, $clave->{"nombres"}.' '.$clave->{"apellidos"});
$fpdf->Ln(2);
$fpdf->Cell(20, 2, $clave->{"direccion"});
$fpdf->Ln(2);
$fpdf->Cell(20, 2, $clave->{"correo"});
}
$fpdf->Image('img/Niña.png', 100, 0, 20);


$fpdf->Ln(20);
$fpdf->Setlinewidth(1);
$fpdf->SetDrawColor(177,34,78);
$fpdf->SetTextColor(177,34,78);
$fpdf->SetFillColor(255, 255, 255);
$fpdf->Cell(70, 5, 'Descripcion','T',0,'C',0);
$fpdf->Cell(20, 5, 'Total','T',0,'C',0);
$fpdf->Ln();

$i = 0;

foreach ($listabla as $clave) {
	if ($i % 2 == 0) {
		$fpdf->SetFillColor(200,200,200);
		
	}else
	{
		$fpdf->SetFillColor(255,255,255);
	}
	$fpdf->Cell(70, 5, $clave->{"destino"},0,0,'C',1);
	$fpdf->Cell(20, 5, $clave->{"monto"},0,0,'C',1);
	$fpdf->Ln();
	$i++;
}
	$fpdf->SetFillColor(80,80,80);
	$fpdf->SetTextColor(255,255,255);
	foreach ($lisTotal as $clave) {
	$fpdf->Cell(70, 5,'Total',0,0,'C',1);
	$fpdf->Cell(20, 5, $clave->{"totalAPagar"},0,0,'C',1);
	$fpdf->Ln();
	$fpdf->Cell(70, 5,'Total Abonado',0,0,'C',1);
	$fpdf->Cell(20, 5, $clave->{"monto"},0,0,'C',1);
	$fpdf->Ln();
	$fpdf->Cell(70, 5,'Total a Pagar',0,0,'C',1);
	$fpdf->Cell(20, 5, $clave->{"totalAPagar"}-$clave->{"monto"},0,0,'C',1);
}

ob_end_clean();
$fpdf->OutPut();
?>