<?php
session_start();

require('../config.php');

$idU = $_SESSION["idU"];
logCrear($idU,'',3,'');

session_destroy();
setcookie(session_name(), "", time() - 3600);

header("Location: http://edtk.co/");
?>