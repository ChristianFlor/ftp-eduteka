<?php
require ("configSession.php");
$conexion2 = Abrir();

//extraigo datos como pais y otros
$datoUser = get_infoBasicaUsuario($idUser);

$datoImagen = $datoUser['picture'];

 if ($datoImagen=="") { 
	$datoImagen = "treeEDTKdummyperfil.gif";
}
    //print_r($usuarioInfo);
    ini_set("session.gc_maxlifetime", "0"); 
    session_set_cookie_params('0');
	session_cache_expire(0);
	$cache_expire = session_cache_expire();
    session_start();
    //session_name();
    $_SESSION["IDU"] = $idUser;
    $_SESSION["NOMBREU"] = $datoUser[nombre];
    $_SESSION["COLEGIOU"] = $datoUser[colegio];
	$_SESSION["FECHAREGISTRO"] = $datoUser[fecha];
    $_SESSION["PAISU"] = $datoUser[pais];
	$_SESSION["MUNICIPIO"] = $datoUser[municipioX];
	$_SESSION["TIPOCOL"]  = $datoUser[tipoCol];
	$_SESSION["CARGOS"]  = $datoUser[cargos];
	$_SESSION["GRADOS"]  = $datoUser[grados];
	$_SESSION["MATERIAS"] = $datoUser[materia];
    $_SESSION["CORREO"] =  $datoUser[correo];
	
	$_SESSION["EDAD"] =  $datoUser[edad];
	$_SESSION["ESTUDIOS"] =  $datoUser[estudios];
	$_SESSION["EMPLEO"] =  $datoUser[empleo];
	$_SESSION["ACERCA"] =  $datoUser[acercami];

    $_SESSION["IMAGENU"] =  $datoImagen;

	
		$_SESSION["PICTURE"] =  $datoUser[picture];
		$_SESSION["TSOCIAL"] = $datoUser[tipoSocial];

    $_SESSION["SesionGestor"] = 1;

   

        $adminVerificacion = administrador($idUser);
        $_SESSION["ADMINX"] = md5($adminVerificacion);
		
		$base1 = mysql_select_db("edtksite_registro");
		$categoriasQueryS = mysql_query("SELECT usuario,visitas FROM registro_foro WHERE idU = '$idUser'");
		$datosS = mysql_fetch_array($categoriasQueryS, MYSQL_ASSOC);
		$usuarioForo = $datosS['usuario'];
		$accesos = $datosS['visitas'];
        
        if($accesos<1){        
            //$usuarioForo =  limpiaUsername(creaUsernameForo ($idUser,$datoUser[nombre],$datoUser[correo]));  
            //$_SESSION["USUARIOFORO"] = base64_encode($usuarioForo);
            //$_SESSION["ACCESO"] = 1; 
            //$_SESSION["PASSBB"] = "dXN1YXJpb0VkdGsxQCE=";  
            //Redirect ("http://eduteka.icesi.edu.co/me/creaUserForo.php");  
        }else{
            $accesosNew = incrementaVisita($idUser,$accesos);
            //$_SESSION["USUARIOFORO"] = base64_encode($usuarioForo);
            //$_SESSION["ACCESO"] = $accesosNew; 
            //$_SESSION["PASSBB"] = "dXN1YXJpb0VkdGsxQCE=";  
          
          if($_SESSION['ORIGEN']!=""){            
                if($_SESSION['ORIGEN']=="mi"){$urlDestino = "https://eduteka.icesi.edu.co/mitica/";}
                elseif($_SESSION['ORIGEN']=="gp"){$urlDestino = "https://eduteka.icesi.edu.co/gp/";}
                 
                else{$urlDestino = "https://eduteka.icesi.edu.co/me/ingresar.php";}
                Redirect($urlDestino);
           }else {
                Redirect("https://eduteka.icesi.edu.co/");
           }

        }
        
       

      
?>