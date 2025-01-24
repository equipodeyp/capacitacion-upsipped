<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verificar_no_recarga = $_SESSION["verificar_no_recarga"];
if ($verificar_no_recarga === 1) {
  unset($_SESSION['verificar_no_recarga']);
  $name = $_SESSION['usuario'];
  // variables de recuperacion del form de registrar servidor
  $idservidor =$_GET['id'];

  $deleteservidor = "DELETE FROM datosservidor WHERE id='$idservidor'";
  $res_deleteservidor = $mysqli->query($deleteservidor);

  if($res_deleteservidor){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/buscarservidor.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
   "<META HTTP-EQUIV='Refresh' CONTENT='0; url=..administrador/admin.php'>";
}

?>
