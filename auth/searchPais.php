<?php
require ("../edtk_admin_connect.php");
 	$conexion = AbrirObj();
        $conexion->select_db("edtksite_registro");
if($_GET['term'])
{
    $nameCiudad = $_GET['term'];
    $sql="SELECT ciudad FROM registro_ciudades WHERE ciudad LIKE '$nameCiudad%' GROUP BY ciudad";
    $res=$conexion->query($sql);
    if($res->num_rows>0)
    {
        while ($row = $res->fetch_assoc()) 
        {
            $contenido[]= utf8_encode($row["ciudad"]);         
        }
    }
    else{
        $contenido="";
    }
    echo json_encode($contenido);
      
}
?>