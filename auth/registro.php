<?php
/* Este archivo recibe información del formulario.php mediante el método POST, valida si el usuario está conectado y escribe su información en la base de datos. */
    require ("../edtk_admin_connect.php");
		$conexion = AbrirObj();
        $conexion->select_db("edtksite_registro");
        
 $idU = $_POST ['idUser'];

$email = $_POST ['email'];
$pais = $_POST ['pais'];
$ciudad = $_POST ['ciudad'];
$colegio = $_POST ['colegio'];
/* Recibe 1 si el colegio es privado o 2 si el colegio es público */
$tipoColegio = $_POST ['tipo_colegio'];
/* Recibe 1 si es Directivo, 2 Docente, 3 Docente en Formación, 4 Coordinador Informático, 5 Coordinador Académico, 6 Formador de Docentes, 7 Bibliotecólogo, 8 Otro */
$cargo = $_POST ['cargo'];
/* Describe los grados en los que enseña el docente: 1 Pre-escolar, 2 Básica Primaria (1º - 5º), 3 Básica Secundaria (6º - 9º), 4 Media (grados 10º y 11º), 5 Superior, 6 Otro */
$grados = $_POST ['grados'];
$grados2 = implode(",", $grados);
/* Describe las materias que dicta el docente: 1 Informática, 2 Lenguaje, 3 Matemáticas, 4 Ciencias Naturales, 5 Ciencias Sociales, 6 Arte, 7 Humanidades, 8 Idiomas Extranjeros, 9 Comercio, 10 Otra(s) */
$materias = $_POST ['materias'];
$materias2 = implode(",", $materias);

if($email==""){
    $email = "ndf";
}

// Verificar que el usuario existe
$sql = "SELECT idU FROM registro_usuarios WHERE correo = '$email'";
$consulta = $conexion->query($sql);
$numeroConsulta = $consulta->num_rows;
$datoUserNew = $consulta->fetch_array(MYSQLI_ASSOC);
    $idUser= $datoUserNew[idU];
    
if (($idU != $idUser)&($numeroConsulta>0)) {
	$mensaje .= "El usuario actualizo los datos existia como usuario previo $idU > $idUser" ;
     
 
	/* Consulta para guardar los valores "idU", "pais" y "municipio" en la tabla "registro_local" */
	$updateRegistroLocal = "UPDATE registro_local SET pais='$pais', municipioX='$ciudad' WHERE idU='$idUser'";
	$consulta = $conexion->query( $updateRegistroLocal );
	
	/* Consulta para guardar los valores "idU", "colegio", "tipoCol", "cargos", "grados" y "materia" en la tabla "registro_profesion" */
	$updateRegistroProfesion = "UPDATE  registro_profesion SET colegio='$colegio', tipoCol='$tipoColegio', cargos='$cargo', grados='$grados2', materia='$materias2' WHERE idU='$idUser'";
	$consulta = $conexion->query( $updateRegistroProfesion );
    
    /*copio los datos del registro anterior */
    $sql = "SELECT * FROM registro_usuarios WHERE idU = '$idU'";
    $consultatemp = $conexion->query($sql);
    $datoUserTemp = $consultatemp->fetch_array(MYSQLI_ASSOC);

		
	/* Consulta para guardar el email del usuario en la tabla "registro_usuarios" */
	$updateRegistroUsuarios = "UPDATE registro_usuarios SET correo='$email',tipoSocial='$datoUserTemp[tipoSocial]',uid='$datoUserTemp[uid]',gender='$datoUserTemp[gender]',linkSocial='$datoUserTemp[linkSocial]',picSocial='$datoUserTemp[picSocial]',picture='$datoUserTemp[picSocial]',validate='1', fecha='$datoUserTemp[fecha]' WHERE idU='$idUser'";
    
    #print $updateRegistroUsuarios;
    $consulta = $conexion->query( $updateRegistroUsuarios );
    
    $borraNewRegistro = "DELETE FROM registro_usuarios WHERE idU='$idU'";
    $consulta = $conexion->query( $borraNewRegistro );
    
    include("edtk_userInfo.php");
	
}else{
	
	$mensaje .= "<p align=\"center\">
                    <img src=\"http://www.eduteka.org/images/smile-1188654_1280.jpg\" style=\"width: 100%; max-width: 782px;margin:0 auto;\" >
                </p>  " ;
	
    /* Consulta para guardar los valores "idU", "pais" y "municipio" en la tabla "registro_local" */
	$insertRegistroLocal = "INSERT INTO  registro_local (idLocal,idU,pais,depto,municipio,municipioX) VALUES (0,'$idU', '$pais','','', '$ciudad')";
	$consulta = $conexion->query( $insertRegistroLocal );
	
	/* Consulta para guardar los valores "idU", "colegio", "tipoCol", "cargos", "grados" y "materia" en la tabla "registro_profesion" */
	$insertRegistroProfesion = "INSERT INTO registro_profesion (id_prof,idU, colegio, tipoCol, cargos, grados, materia) VALUES (0,'$idU', '$colegio','$tipoColegio','$cargo','$grados2','$materias2')";
	$consulta = $conexion->query( $insertRegistroProfesion );
		
	/* Consulta para guardar el email del usuario en la tabla "registro_usuarios" */
	$updateRegistroUsuarios = "UPDATE registro_usuarios SET correo='$email',validate='1' WHERE idU='$idU'";
    $consulta = $conexion->query( $updateRegistroUsuarios );
    
     $idUser = $idU;
     include("edtk_userInfo.php");
     
}
?>
  <!DOCTYPE html>
    <html lang="es">
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Eduteka - Completar Registro</title>
        <meta name="keywords" content="Eduteka,registro,usuarios"/>
        <meta name="description" content="Permite Completar la información de registro de usuario en Eduteka"/>
        <meta name="author" content="Centro Eduteka" />
        <meta name="date" content="2016-03-29" />
        <meta name="owner" content="Eduteka" />
    	<meta name="viewport" content="width=device-width,initial-scale=1">
    	<meta name="twitter:widgets:csp" content="on">
    
        <link rel="shortcut icon" href="http://www.eduteka.org/favicon.ico" >
        <link rel="alternate" type="application/rss+xml" title="RSS" href="">
        
     </head>
	<body style="background-color: #DBDBDB;">
    	<div style="width: 100%;top:100px; margin:0 auto;"> 
        <?php 
        echo $mensaje; 
        #print_r($datoUser);
        ?>
        </div>
	</body>
	</html>   
      <?php  
      $origenLogin = $_SESSION['origen'];
     
        if(isset($origenLogin)){
            if($origenLogin=="red"){$urlDestino = "me/";}
            elseif($origenLogin=="gp"){$urlDestino = "gestorp/";}
            elseif($origenLogin=="gp2"){$urlDestino = "gp2/";}
            elseif($origenLogin=="ci"){$urlDestino = "ci2/";}
            elseif($origenLogin=="pc"){$urlDestino = "pc/";}
            elseif($origenLogin==""){ $logeoTo = $origenLogin; }
            elseif($origenLogin=="bp"){$urlproy = $_GET['u']; $logeoTo = $urlproy;}
            else{$urlDestino = "me/";}
            
             $logeoTo = "http://eduteka.icesi.edu.co/".$urlDestino;
    }else {
         if($origenLogin=="bp"){
                $urlproy = $_GET['u']; 
                $logeoTo = $urlproy;
                }else{
            $logeoTo = "../index.php";
         }      
            
       }
       ?>
    <script type="text/javascript">
    	function delayer(){
    		window.location = "../index.php"
    	}
    	setTimeout('delayer()', 400)
    </script>

