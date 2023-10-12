<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verificar_no_recarga = $_SESSION["verificar_no_recarga"];
if ($verificar_no_recarga === 1) {
  unset($_SESSION['verificar_no_recarga']);
  $name = $_SESSION['usuario'];
  // variables de recuperacion del form de registrar servidor
  $num_gafete =$_POST['NUMERO_GAFETE'];
  $clave_servidor =$_POST['CLAVE_SERVIDOR'];
  $rfc_servidor =$_POST['RFC_SERVIDOR'];
  $curp =$_POST['CURP_SERVIDOR'];
  $cuip =$_POST['CUIP_SERVIDOR'];
  $a_paterno=$_POST['PATERNO_SERVIDOR'];
  $a_materno=$_POST['MATERNO_SERVIDOR'];
  $nombre =$_POST['NOMBRE_SERVIDOR'];
  $cargo= $_POST['CARGO_SERVIDOR'];
  $funciones= $_POST['FUNCIONES_SERVIDOR'];
  $adscripcion= $_POST['ADSCRIPCION_SERVIDOR'];
  $unidad_administrativa= $_POST['UNIDAD_ADMON'];
  $fecha_nacimiento= $_POST['FECHA_NACIMIENTO'];
  $mun_nacimiento=$_POST['MUN_NACIMIENTO'];
  $est_nacimiento =$_POST['EST_NACIMIENTO'];
  $pais_nacimiento =$_POST['PAIS_NACIMIENTO'];
  $sexo= $_POST['SEXO'];
  $correo_personal=$_POST['CORREO_PERSONAL'];
  $correo_institucional=$_POST['CORREO_INSTI'];
  $correo_gmail=$_POST['CORREO_GMAIL'];
  $t_fijo= $_POST['TELEFONO_FIJO'];
  $t_celular=$_POST['TELEFONO_CELULAR'];
  $t_trabajo=$_POST['TELEFONO_TRABAJO'];
  $mun_residencia=$_POST['MUN_RESIDENCIA'];
  $est_residencia =$_POST['EST_RESIDENCIA'];
  $pais_residencia =$_POST['PAIS_RESIDENCIA'];
  $idiomadominio =$_POST['IDIOMA_DOMINIO'];
  $nivelidioma =$_POST['NIVEL_IDIOMA'];
  $grado_deestudios =$_POST['GRADO_DEESTUDIOS'];

  $addservidor = "INSERT INTO datosservidor(num_gafete, clave_servidor, rfc, curp, cuip, a_paterno, a_materno, nombre, cargo, funciones, adscripcion, unidad_administrativa, fecha_nacimiento, municipio_nacimiento, estado_nacimiento, pais_nacimiento, sexo, correo_personal, correo_institucional,
                                            telefono_casa, telefono_trabajo, celular, municipio_residencia, estado_residencia, pais_residencia, correo_gmail, idioma_dominio, nivel_dominio, grado_estudios)
                         VALUES ('$num_gafete', '$clave_servidor', '$rfc_servidor', '$curp', '$cuip', '$a_paterno', '$a_materno', '$nombre', '$cargo', '$funciones', '$adscripcion', '$unidad_administrativa', '$fecha_nacimiento',
                                 '$mun_nacimiento', '$est_nacimiento', '$pais_nacimiento', '$sexo', '$correo_personal', '$correo_institucional', '$t_fijo', '$t_trabajo', '$t_celular', '$mun_residencia', '$est_residencia',
                                 '$pais_residencia', '$correo_gmail', '$idiomadominio', '$nivelidioma', '$grado_deestudios')";
  $res_addservidor = $mysqli->query($addservidor);

  if($res_addservidor){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/admin.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=..administrador/admin.php'>";
}

?>
