<?php

	require_once('../../../php/modelo/medicamento.php');
	$medicamento = new Medicamento();
	$listamedicamento =  $medicamento->listar();
	$plano ="Medicamento.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listamedicamento as $fila){
		fputs($archivo,$fila['id_medcto'].",".$fila['nom_medcto'].",".$fila['stock']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('../medicamentos.php');
	$pdf = new PDF();
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$titulos = array('Codigo','Nombre','Stock');
	$cant = 3;
	$datos = $pdf->cargarDatos($plano);
	$pdf->TablaElegante($titulos,$datos,$cant);
	
	

	$pdf->Output();
	
?>
