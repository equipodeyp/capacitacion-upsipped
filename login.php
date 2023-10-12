<?php
session_start();
require 'dbc.php';
try {
  $usuario=htmlentities(addslashes($_POST['inputUsuario']));
  $password=htmlentities(addslashes($_POST['inputPassword']));
  // contador
  $contador = 0;
  $sqluser = "SELECT * FROM usuarios WHERE nombre = BINARY :nombre";
  $resultado = $DB->prepare($sqluser);
  $resultado->execute(array(":nombre"=>$usuario));
  while ($login=$resultado->fetch(PDO::FETCH_ASSOC)) {
    if (password_verify($password, $login['password'])) {
      /*
      aqui se podra crear sesiones
      */
      $_SESSION['IS_LOGIN']='yes';
          $_SESSION['usuario']=$usuario;
          if($login['area']=='subdireccion de enlace interinstitucional'){ //administrador
                echo'<script type="text/javascript">
                alert("Bienvenido");
                window.location.href="administrador/admin.php";
                </script>';
          }
      $contador++;
    }else {
          echo'<script type="text/javascript">
          alert("CONTRASEÑA INCORRECTA");
          window.location.href="login.html";
          </script>';
    }
  }
  if ($contador>0) {
  echo "el usuario existe";
  } else {
    echo'<script type="text/javascript">
    alert("USUARIO INCORRECTO");
    window.location.href="login.html";
    </script>';
  }
  //cierro la conexion
  $conexion = null;
} catch (\Exception $e) {
  die($e->getMessage());
}
?>
