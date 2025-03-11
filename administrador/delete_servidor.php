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

  $delete_cursos = "DELETE FROM curso_por_servidor WHERE id_servidor='$idservidor'";
   $res_delete_cursos = $mysqli->query($delete_cursos);

  if($res_deleteservidor){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/buscarservidor.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  } else {
 echo ("<script type='text/javaScript'>
  window.location.href='../administrador/buscarservidor.php';
  window.alert('Error al eliminar el registro')
</script>");
  }
}else {
   "<META HTTP-EQUIV='Refresh' CONTENT='0; url=..administrador/admin.php'>";
}

?>
