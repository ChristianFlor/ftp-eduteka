<?php
	
	require ('funciones.php');         
	header('Content-Type: text/html; charset=utf-8');
	
	$idArea = $_POST['idArea'];
	
    $asignatura = asignatura($idArea);
	
	$html = "<option value=''>Seleccionar asignatura</option>";
	
	while($rowA = $asignatura->fetch_assoc()){
		$html.= "<option value='".$rowA['idAsignatura']."'>".$rowA['nombreAsignatura']."</option>";
	}
	
	echo $html;
