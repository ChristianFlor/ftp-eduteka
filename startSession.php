<?php
if (isset($_SESSION['SesionGestor'])) {
 
    $idSesionG = session_id();  
    $nombreUsuario = $_SESSION['NOMBREU'];
    //$idU = $_SESSION['IDU'];

    $cookieInfo = session_get_cookie_params();
}
	

?>
