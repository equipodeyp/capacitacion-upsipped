<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
// $verificar_no_recarga = $_SESSION["verificar_no_recarga"];
// if ($verificar_no_recarga === 1) {
  // unset($_SESSION['verificar_no_recarga']);
   $name = $_SESSION['usuario'];
   "<br />";
  // variables de recuperacion del form de registrar servidor

   $modalidad_cap =$_POST['namecapacitacion'];
   "<br />";
   $tipo_cap =$_POST['sel_relacional'];
   $fecha = date("Y/m/d");
   for ($i=0;$i<count($tipo_cap);$i++){
     $frel = $tipo_cap[$i];
     $rel = "INSERT INTO curso_por_servidor(id_curso, id_servidor, usuario, fecha)
     VALUES ('$modalidad_cap', '$frel', '$name', '$fecha')";
     $rrel = $mysqli->query($rel);
   }


//
//   $addcapacitacion = "INSERT INTO datos_capacitaciones(modalidad, tipo_capacitacion, otros_cap, nombre_capacitacion, tema, fecha_inicio, fecha_termino, ponente, institucion, total_horas, resultado, constancia, sede)
//                          VALUES ('$modalidad_cap', '$tipo_cap', '$otros_cap', '$nombre_cap', '$tema_cap', '$fechainicio_cap', '$fechatermino_cap', '$nombre_ponente', '$institucion', '$dur_horas', '$resul_cap', '$constancia_cap', '$sede_cap')";
//   $res_addcapacitacion = $mysqli->query($addcapacitacion);
//
  if($rrel){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/asignarcurso.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=..administrador/admin.php'>";
}

?>
