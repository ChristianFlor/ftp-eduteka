<?php
session_start();

define('CONF_FILE', dirname(__FILE__).'/'.'opauth.conf.php');
define('OPAUTH_LIB_DIR', dirname(__FILE__).'/lib/Opauth/');

require('../config.php');
require ("../includes/initialConection.php");
require_once('../includes/initialFunctions.php');

if (!file_exists(CONF_FILE)){
	trigger_error('Config file missing at '.CONF_FILE, E_USER_ERROR);
	exit();
}
require CONF_FILE;
require OPAUTH_LIB_DIR.'Opauth.php';
$Opauth = new Opauth( $config, false );

$response = null;

switch($Opauth->env['callback_transport']){	
	case 'session':
		session_start();
		$response = $_SESSION['opauth'];
		unset($_SESSION['opauth']);
		break;
	case 'post':
		$response = unserialize(base64_decode( $_POST['opauth'] ));
		break;
	case 'get':
		$response = unserialize(base64_decode( $_GET['opauth'] ));
		break;
	default:
		echo '<strong style="color: red;">Error: </strong>Unsupported callback_transport.'."<br>\n";
		break;
}

if (array_key_exists('error', $response)){
	echo '<strong style="color: red;">Authentication error: </strong> Opauth returns error auth response.'."<br>\n";
}

else{
	if (empty($response['auth']) || empty($response['timestamp']) || empty($response['signature']) || empty($response['auth']['provider']) || empty($response['auth']['uid'])) {
		echo '<strong style="color: red;">Invalid auth response: </strong>Missing key auth response components.'."<br>\n";
	} elseif (!$Opauth->validate(sha1(print_r($response['auth'], true)), $response['timestamp'], $response['signature'], $reason)) {
		echo '<strong style="color: red;">Invalid auth response: </strong>'.$reason.".<br>\n";
	} else {
	   
       $serverGENERAL = "https://edtk.co/";
       $serverIDEA = "https://edtk.co/proyectos/gp/";
       $serverRUBRIK = "https://edtk.co/rubrik/listado.php";
       $serverMITICA = "https://edtk.co/mitica/evaluar.php";
       $serverPLANEO = "https://edtk.co/planeo/listado.php";
	   
        $nombreUsuario = utf8_decode($response['auth']['info']['name']);
        $correoUsuario = $response['auth']['info']['email'];
        $tipoSocial = $response['auth']['provider'];
        $uidSocial = $response['auth']['uid'];
        $genderSocial = $response['auth']['raw']['gender'];
        
        if($tipoSocial=="Twitter"){
          $linkSocial = $response['auth']['info']['link'];  
        } else {
            $linkSocial = $response['auth']['raw']['link'];
        }
        $picSocial = $response['auth']['info']['image'];
        $validateSocial = 1;
        
        $fechaL = date("Y-m-d");
        $horaL = date("H:i:s");
          //$beta = 1;
        
        $datos = validadorGoogle($correoUsuario,$uidSocial); 
        
          if($datos != 0){              
            $idU = $datos['idU'];         
            $beta = consultaUsuarioBeta($idU);            
            $_SESSION['NOMBREU'] = $datos['nombre'];   
            $_SESSION["idU"] = $datos['idU']; 
            
            logCrear($idU,'','2', '');   
                           
            $completo = 1;
                
                            
          } else {
              echo "No esta registrado";
              $idUnuevo = registroUsuario($nombreUsuario, $correoUsuario, $pwd, $tipoSocial, $uidSocial, $genderSocial, $linkSocial, $picSocial, $picture, $validate, "$fechaL $horaL");
              $_SESSION['NOMBREU'] = $nombreUsuario;   
              $_SESSION["idU"] = $idUnuevo;               
              logCrear($idUnuevo, '', 1,'');
              
              $completo = 1;
            
          }
          
          
          if ($completo==1){      
            
                if(isset($_SESSION['AD'])){
                    registroAdd($_SESSION['AD']);
                }
                
                if(isset($_SESSION['ORIGEN'])){
                        if($_SESSION['ORIGEN']=="1"){$urlDestino = $serverIDEA;}  
                        elseif($_SESSION['ORIGEN']=="2"){$urlDestino = $serverRUBRIK;}  
                        elseif($_SESSION['ORIGEN']=="3"){$urlDestino = $serverMITICA;}
                        elseif($_SESSION['ORIGEN']=="4"){$urlDestino = $serverPLANEO;}       
                        else { $urlDestino = $serverGENERAL; }                               
                        header("Location: $urlDestino");
                } else {                          
                        header("Location: $serverGENERAL");
               }
           }
    
    //print_r($response);
    }
}
?>
