<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'datosGoogle.php';
require_once('../includes/initialFunctions.php');
require_once('../config.php');



  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");


if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  utf8_decode($google_account_info->name);
  $id =  $google_account_info->id;


  $fechaL = date("Y-m-d");
  $horaL = date("H:i:s");
  $serverName = "https://edtk.co/mitica";
  $serverNoVerificado = "https://edtk.co/mitica";
  $serverMantenimiento = "https://edtk.co/proyectos/gp/mantenimiento.php";

  $datos = validadorGoogle($email,$id); 

  if($datos != 0){              
       $idU = $datos['idU'];         
       $beta = 1;
    
          $_SESSION['NOMBREU'] = $datos['nombre'];   
          $_SESSION["idU"] = $datos['idU']; 
                         
          header("Location: ".$serverName ."");
           exit;                
                 
  } else {
      echo "No esta registrado";
      $idUnuevo = registroUsuario($name, $email, $pwd, 'Google', $id, $genderSocial, $linkSocial, $picSocial, $picture, '1', "$fechaL $horaL");
      $_SESSION['NOMBREU'] = $name;   
      $_SESSION["idU"] = $idUnuevo;               
     
      header("Location: ".$serverNoVerificado ."");
       exit;
  }
}  
?>