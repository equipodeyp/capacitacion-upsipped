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
   $num_gafete =$_POST['NUMERO_GAFETE'];
   $clave_servidor =$_POST['CLAVE_SERVIDOR'];
   $rfc_servidor =$_POST['RFC_SERVIDOR'];
   $curp =$_POST['CURP_SERVIDOR'];
   $cuip =$_POST['CUIP_SERVIDOR'];
   $a_paterno=$_POST['APELLIDO_PATERNO'];
   $a_materno=$_POST['APELLIDO_MATERNO'];
   $nombre =$_POST['NOMBRE_SERVIDOR'];
   $cargo= $_POST['cargo'];
   $funciones= $_POST['funciones'];
   $adscripcion= $_POST['adscripcion'];
   $unidad_administrativa= $_POST['unidad_administrativa'];
   $fecha_nacimiento= $_POST['FECHA_NACIMIENTO'];
   $mun_nacimiento=$_POST['MUNICIPIO_DE_NACIMIENTO'];
   $est_nacimiento =$_POST['ESTADO_DE_NACIMIENTO'];
   $pais_nacimiento =$_POST['PAIS_DE_NACIMIENTO'];
   $sexo= $_POST['SEXO'];
   $correo_personal=$_POST['CORREO_PERSONAL'];
   $correo_institucional=$_POST['CORREO_INSTITUCIONAL'];
   $t_fijo= $_POST['TELEFONO_FIJO'];
   $t_celular=$_POST['TELEFONO_CELULAR'];
   $t_trabajo=$_POST['TELEFONO_TRABAJO'];
   $mun_residencia=$_POST['MUN_RESIDENCIA'];
   $est_residencia =$_POST['ESTADO_RESIDENCIA'];
   $pais_residencia =$_POST['PAIS_RESIDENCIA'];
   $correo_gmail=$_POST['CORREO_GMAIL'];
   $idiomadominio =$_POST['IDIOMA_DOMINIO'];
   $nivelidioma =$_POST['NIVEL_IDIOMA'];
   $grado_deestudios =$_POST['GRADO_DE_ESTUDIOS'];

  $addservidor = "UPDATE datosservidor SET num_gafete='$num_gafete', clave_servidor='$clave_servidor', rfc='$rfc_servidor', curp='$curp', cuip='$cuip', a_paterno='$a_paterno', 
                                           a_materno='$a_materno', nombre='$nombre', cargo='$cargo', funciones='$funciones', adscripcion='$adscripcion', 
                                           unidad_administrativa='$unidad_administrativa', fecha_nacimiento='$fecha_nacimiento', municipio_nacimiento='$mun_nacimiento', 
                                           estado_nacimiento='$est_nacimiento', pais_nacimiento='$pais_nacimiento', sexo='$sexo', correo_personal='$correo_personal', 
                                           correo_institucional='$correo_institucional', telefono_casa='$t_fijo', telefono_trabajo='$t_trabajo', celular='$t_celular', 
                                           municipio_residencia='$mun_residencia', estado_residencia='$est_residencia', pais_residencia='$pais_residencia', 
                                           correo_gmail='$correo_gmail', idioma_dominio='$idiomadominio', nivel_dominio='$nivelidioma', grado_estudios='$grado_deestudios' 
                                           WHERE id='$idservidor'";
  $res_addservidor = $mysqli->query($addservidor);

  if($res_addservidor){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/buscarservidor.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
   "<META HTTP-EQUIV='Refresh' CONTENT='0; url=..administrador/admin.php'>";
}

?>
