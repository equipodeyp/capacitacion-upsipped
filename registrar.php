<?php
// error_reporting(0);
require 'dbc.php';
session_start();

//antes de nada obtengo la contraseña y la cifro para insertarla
$password = $_POST['password'];

//y ahora cifro la clave usando un hash
$pass_cifrada = password_hash($password, PASSWORD_DEFAULT, array("cost"=>10));
$area = "subdireccion de enlace interinstitucional";

if ($DB == true) {

//preparo el insert
$insert = $DB->prepare("INSERT INTO usuarios (apellido_p, apellido_m, nombre, area, password, sexo) VALUES (:apellido_p, :apellido_m, :nombre, :area, :password, :sexo)");

//asocio los campos del insert a los campos del formulario
$insert->bindParam(':apellido_p', $_POST['apellido_p']);
$insert->bindParam(':apellido_m', $_POST['apellido_m']);
$insert->bindParam(':nombre', $_POST['nombre']);
$insert->bindParam(':area', $area);
$insert->bindParam(':password', $pass_cifrada);
$insert->bindParam(':sexo', $_POST['sexo']);
//ejecutamos codigo anterior
$insert->execute();
//cierramos la conexion
$DB = null;
//redirijo a un archivo php
// header('Location: login.html');
echo'<script type="text/javascript">
alert("Registro Exitoso");
window.location.href="login.html";
</script>';
} else {
  echo'<script type="text/javascript">
  alert("Registro Erroneo");
  window.location.href="login.html";
  </script>';
}
?>
