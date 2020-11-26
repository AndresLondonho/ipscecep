<?php

	require_once('../../../php/modelo/cita.php');
	$citas = new Cita();
	$listacita =  $citas->listar();
	$plano ="Citas.txt";
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listacita as $fila){
		fputs($archivo,$fila['Paciente'].",".$fila['Medico'].",".$fila['Tipo_cita'].",".$fila['Fecha']);
		fputs($archivo,chr(13).chr(10));
	}

	require_once('../citas.php');
	$pdf = new PDF();
	
	$pdf->SetFont('Arial','',10);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$titulos = array('Paciente','Medico','Tipo cita','Fecha');
	$cant = 4;
	$datos = $pdf->cargarDatos($plano);
	$pdf->TablaElegante($titulos,$datos,$cant);
	
	

	$pdf->Output();
	
	
?>
