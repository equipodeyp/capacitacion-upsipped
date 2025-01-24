
<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$verificar_no_recarga = 1;
$_SESSION["verificar_no_recarga"] = $verificar_no_recarga;
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT nombre, area, apellido_p, apellido_m FROM usuarios WHERE nombre='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();




$qry = "select max(ID) As id from datos_capacitaciones";
$result = $mysqli->query($qry);
$row = $result->fetch_assoc();
$num_consecutivo =$row["id"];




 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<script src="../js/botonatras.js"></script>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>CAPACITACION SIPPSIPPED</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-theme.css" rel="stylesheet">
<script src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/cli.css">
<!-- CSS personalizado -->
<link rel="stylesheet" href="../css/main2.css">
<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
<!--datables estilo bootstrap 4 CSS-->
<link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
<!--font awesome con CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<!-- datatables JS -->
<script type="text/javascript" src="../datatables/datatables.min.js"></script>
<!-- para usar botones en datatables JS -->
<script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
<!-- MATERIAL PARA USAR TOAST MENSAJES DE ALERTA  -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
           },
           "sProcessing":"Procesando...",
            },
    });
});
</script>

</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">

      </div>
      <div style="text-align:center" class="user">
        <?php
        $sentencia=" SELECT nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE nombre='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];

        if ($genero=='Mujer') {
          echo "<img src='../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='Hombre') {
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
        ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
    </div>


    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/capupsipped.png" alt="" width="1080" height="170">
      </div>
        <!-- <br><br><br><br><br><br><br> -->
        <div class="row">
          <!-- <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1> -->
        </div>
        <div>
         <H1 style="text-align:center">
                         BUSQUEDA DEL SERVIDOR PUBLICO
         </H1>
         <div class="container" >
                                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                          <h3 style="text-align:center">Registros</h3>
                                            <tr>
                                                <th style="text-align:center">No.</th>
                                                <th style="text-align:center">NOMBRE DEL SERVIDOR</th>
                                                <th style="text-align:center">ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $contador= 0;
                                          $tabla="SELECT * FROM datosservidor";
                                          $var_resultado = $mysqli->query($tabla);

                                          while ($var_fila=$var_resultado->fetch_array())
                                          {
                                                $contador = $contador + 1;
                                                echo "<tr>";
                                                echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                                echo "<td style='text-align:center'>"; echo $var_fila['nombre'].' '.$var_fila['a_paterno'].' '.$var_fila['a_materno']; echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                echo "<a href='#edit_".$var_fila['id']."' class='btn color-btn-success btn-sm' data-toggle='modal'><i class='fa-solid fa-file-pen'></i> MODIFICAR</a>"; echo "     ";
                                                echo "<a href='#eliminar_".$var_fila['id']."' class='btn color-btn-success btn-sm' data-toggle='modal'><i class='fa-solid fa-file-pen'></i> ELIMINAR</a>";
                                                include('verservidor.php'); 
                                                include('eliminar_servidor.php');
                                                echo "</td>";
                                                echo "</tr>";
                                          }

                                        ?>

                                        </tbody>
                                       </table>
                                    </div>
        </div>
    </div>
 </div>

  <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
  <a href="admin.php" class="btn-flotante">Regresar</a>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</body>
