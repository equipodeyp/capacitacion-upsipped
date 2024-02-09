<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verificar_no_recarga = $_SESSION["verificar_no_recarga"];
if ($verificar_no_recarga === 1) {
  unset($_SESSION['verificar_no_recarga']);
  $name = $_SESSION['usuario'];
  // variables de recuperacion del form de registrar servidor

  $modalidad_cap =$_POST['MODALIDAD_CAP'];
  $tipo_cap =$_POST['TIPO_CAP'];
  if ($tipo_cap === 'OTROS') {
    $otros_cap = $_POST['OTROS_CAP'];
  }else {
    $otros_cap = '';
  }
  $nombre_cap =$_POST['NOMBRE_CAP'];
  $tema_cap =$_POST['TEMA_CAP'];
  $fechainicio_cap =$_POST['FECHAINICIO_CAP'];
  $fechatermino_cap=$_POST['FECHATERMINO_CAP'];
  $nombre_ponente=$_POST['NOMBRE_PONENTE'];
  $institucion=$_POST['INSTITUCION'];
  $dur_horas =$_POST['DUR_HORAS'];
  $resul_cap= $_POST['RESUL_CAP'];
  $constancia_cap= $_POST['CONSTANCIA_CAP'];
  $sede_cap= $_POST['SEDE_CAP'];


  $addcapacitacion = "INSERT INTO datos_capacitaciones(modalidad, tipo_capacitacion, otros_cap, nombre_capacitacion, tema, fecha_inicio, fecha_termino, ponente, institucion, total_horas, resultado, constancia, sede)
                         VALUES ('$modalidad_cap', '$tipo_cap', '$otros_cap', '$nombre_cap', '$tema_cap', '$fechainicio_cap', '$fechatermino_cap', '$nombre_ponente', '$institucion', '$dur_horas', '$resul_cap', '$constancia_cap', '$sede_cap')";
  $res_addcapacitacion = $mysqli->query($addcapacitacion);

  if($res_addcapacitacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/admin.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=..administrador/admin.php'>";
}

?>
