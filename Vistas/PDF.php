<?php
ob_start();
require_once '../fpdf/fpdf.php';
require_once '../Datos/daoPDF.php';
require_once '../Pojos/PojoPDF.php';
require_once '../Datos/DaoPagos.php';
require_once '../Pojos/PojoPagosMos.php';
require_once '../Pojos/PojoPagos.php';
require_once '../Pojos/PojoFactura.php';
require_once '../Datos/DaoApartaTuLugar.php';
session_start();
$pojo = new PojoPDF();
$daoPDF = new daoPDF();
$dao = new DaoPagos();
$objDaoAparta = new DaoApartaTuLugar();

$fpdf = new fpdf('P','mm','letter',true);
$fpdf->SetMargins(5,5,5,5);
$fpdf->AddPage('portrait', array(125,150));


$fpdf->SetFont('Courier', 'B', 7);
$fpdf->Cell(34, 2, 'ExcursionesLorePantoja');
$fpdf->Cell(34, 2, '');
$fpdf->Cell(34, 2, '16 de septiembre');
$fpdf->Ln(2);
$fpdf->SetFont('Courier', '', 5);
$fpdf->Cell(34, 2, 'excursiones.lore.pantoja@gmail.com');
$fpdf->Cell(34, 2, '');
$fpdf->Cell(34, 2, 'Telefono: 445-122-0935');
$fpdf->Ln(2);
$fpdf->SetFont('Courier', '', 12);
$fpdf->Cell(100, 30, 'Informacion de la Reservacion','T',0,'C',0);

$juanjo= $_SESSION['login'];
$idViaje = $_COOKIE["idViaje"];
$lista = $dao->obtenerPagos($objDaoAparta->getIdUsuario($juanjo));
$listAnio = $daoPDF->obtenerFechaViaje($idViaje);
$listUsuario = $daoPDF->getNombre($objDaoAparta->getIdUsuario($juanjo));
$listabla = $dao->obtenerFactura($objDaoAparta->getIdUsuario($juanjo), $idViaje);
$listaAsientos = $daoPDF->getAsientos($objDaoAparta->getIdUsuario($juanjo), $idViaje);
$hoy = getdate();
$dia = $hoy["weekday"];
$diaM = $hoy["mday"];
$mes = $hoy["month"];
$año = $hoy["year"];
$hora = $hoy["hours"];
$minuto = $hoy["minutes"];
$segundo = $hoy["seconds"];

$fpdf->Ln(28);
$fpdf->SetFillColor(239, 239, 239);
$fpdf->Rect(5,35,100,10,'F');
$fpdf->SetFont('Courier', 'B', 7);
foreach ($lista as $clave) {
	$fpdf->Cell(40, 2, 'Numero de reservacion: '.$clave->{"idReservacion"});
	$fpdf->Ln(2);
	$fpdf->SetFont('Courier', '', 5);
}
if ($dia == "Monday") {
	$d = "lunes";
}if ($dia == "Tuesday") {
	$d = "martes";
}if ($dia == "Wednesday") {
	$d = "miercoles";
}if ($dia == "Thursday") {
	$d = "jueves";
}if ($dia == "Friday") {
	$d = "viernes";
}if ($dia == "Saturday") {
	$d = "sabado";
}if ($dia == "Sunday") {
	$d = "domingo";
}
if ($mes == "January") {
	$m = "Enero";
}if ($mes == "February") {
	$m = "Febrero";
}if ($mes == "March") {
	$m = "Marzo";
}if ($mes == "April") {
	$m = "Abril";
}if ($mes == "May") {
	$m = "Mayo";
}if ($mes == "June") {
	$m = "Junio";
}if ($mes == "July") {
	$m = "Julio";
}if ($mes == "August") {
	$m = "Agosto";
}if ($mes == "September") {
	$m = "Septiembre";
}if ($mes == "October") {
	$m = "Octubre";
}if ($mes == "November") {
	$m = "Noviembre";
}if ($mes == "December") {
	$m = "Diciembre";
}
if ($hora == 1) {
	$h = 1;
}if ($hora == 2) {
	$h = 2;
}if ($hora == 3) {
	$h = 3;
}if ($hora == 4) {
	$h = 4;
}if ($hora == 5) {
	$h = 5;
}if ($hora == 6) {
	$h = 6;
}if ($hora == 7) {
	$h = 7;
}if ($hora == 8) {
	$h = 8;
}if ($hora == 9) {
	$h = 9;
}if ($hora == 10) {
	$h = 10;
}if ($hora == 11) {
	$h = 11;
}if ($hora == 12) {
	$h = 12;
}
if ($hora == 13) {
	$h = 1;
}if ($hora == 14) {
	$h = 2;
}if ($hora == 15) {
	$h = 3;
}if ($hora == 16) {
	$h = 4;
}if ($hora == 17) {
	$h = 5;
}if ($hora == 18) {
	$h = 6;
}if ($hora == 19) {
	$h = 7;
}if ($hora == 20) {
	$h = 8;
}if ($hora == 21) {
	$h = 9;
}if ($hora == 22) {
	$h = 10;
}if ($hora == 23) {
	$h = 11;
}if ($hora == 24) {
	$h = 12;
}
$fpdf->Cell(40, 2, 'Fecha de la Factura: '.$d.' '.$diaM.' '.$m.' del '.$año.'. a las '.($h+6).':'.$minuto.':'.$segundo);
$fpdf->Ln(3);
foreach ($listAnio as $clave) {
	$fpdf->Cell(40, 2, 'Fecha de Vencimiento: '.$clave->{"fecha"});
}


$fpdf->Ln(10);
$fpdf->SetFont('Courier', 'B', 5);
$fpdf->Cell(40, 2, 'Facturado a: ');
$fpdf->Ln(5);
foreach ($listUsuario as $clave) {
	$fpdf->SetFont('Courier', '', 5);
	$fpdf->Cell(40, 2, $clave->{"nombre"});
	$fpdf->Ln(5);
	$fpdf->Cell(40, 2, $clave->{"direccion"});
	$fpdf->Ln(5);
	$fpdf->Cell(40, 2, $clave->{"correo"});
}
$fpdf->Image('../Vistas/img/Excursiones Lore Pantoja.png',100,2,22);


$fpdf->Ln(20);
$fpdf->Setlinewidth(1);
$fpdf->SetDrawColor(0,0,0);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255, 255, 255);
$fpdf->Cell(70, 5, 'Descripcion','T',0,'C',0);
$fpdf->Cell(40, 5, 'Total','T',0,'C',0);
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
	$fpdf->Cell(40, 5, $clave->{"monto"},0,0,'C',1);
	$fpdf->Ln();
	$i++;
}

$j = 0;
$fpdf->Ln(10);
$fpdf->Setlinewidth(1);
$fpdf->Cell(70, 5, 'No. Asiento','T',0,'C',0);
foreach ($listaAsientos as $clave) {
	if ($j % 2 == 0) {
		$fpdf->SetFillColor(200,200,200);
		$fpdf->Ln(4);
	}else
	{
		$fpdf->SetFillColor(255,255,255);
	}
	$fpdf->Cell(70, 5, $clave->{"n_Asiento"},0,0,'C',1);
	$fpdf->Ln();
	$j++;
}
$fpdf->Ln();
$fpdf->Cell(20,5, "Nota Importante:");
$fpdf->SetDrawColor(255,0,0);
$fpdf->SetTextColor(255,0,0);
$fpdf->Ln(2);
$fpdf->Cell(20,5, "Si No Se Cubre El 100% Del Costo Total 8 Dias Antes Del Viaje, No Se Respetara Sus Asientos");

ob_end_clean();
$fpdf->OutPut("InformacionUsuario.pdf","d");
?>