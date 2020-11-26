<?php
require('fpdf.php');

class PDF extends FPDF
{
function Header()
{
    // Logo
    $this->Image('../../imgs/logocecep.png',10,8,15);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->SetTextColor(34,45,50);
    $this->SetMargins(40, 0, 35);
    
    // Movernos a la derecha
    $this->Cell(40);
    // T�tulo
    $this->Cell(100,5,'HISTORIAL CITA',0,0,'C');
    // Salto de l�nea
    $this->Ln(20);
	$this->SetFont('Arial','',14);
}

// Cargar los datos
function cargarDatos($file)
{
    // Leer las l�neas del fichero
    $archivo = file($file);
    $datos = array();
    foreach($archivo as $linea)
        $datos[] = explode(',',trim($linea));
    return $datos;
}

// Tabla Elegante
function TablaElegante($titulos, $datos, $cant)
{
    // Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(34,45,50);
    $this->SetTextColor(255);
    $this->SetDrawColor(34,45,50);
    $this->SetLineWidth(.2);
    $this->SetFont('','B',14);
    // Cabecera de titulos
    switch($cant)
    {
        case 2:
            $w = array(25,80);
        break;
        case 3:
            $w = array(25,80,25);
        break;
        case 4:
            $w = array(52,52,30,30);
        break;
        case 5:
            $w = array(52,40,40,15,20);
        break;
        case 6:
            $w = array(25,80,25,80,25,80);
        break;
        case 7:
            $w = array(25,80,25,80,25,80,25);
        break;
        case 8:
            $w = array(25,80,25,80,25,80,25,80);
        break;
    }
    
    for($i=0;$i<count($titulos);$i++)
        $this->Cell($w[$i],7,$titulos[$i],1,0,'C',true);
    $this->Ln();
    // Restauraci�n de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('','',10);
    // Datos
    $fill = false;
    foreach($datos as $row)
    {
        for($i=0;$i<$cant;$i++)
        {
            $this->Cell($w[$i],6,$row[$i],'LR',0,'L',$fill);
        }
        
        //$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        //$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
        //$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		//$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

function Footer()
{
    // Posici�n: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // N�mero de p�gina
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',1,0,'C');
}

}

?>