<?php
    /*require 'conexion.php';*/
    include("conexion.php");
    session_start ();
    $name = $_SESSION['usuario'];
    if (!isset($name)) {
      header("location: ../logout.php");
    }
    $sentencia=" SELECT nombre, area, apellido_p, apellido_m FROM usuarios WHERE nombre='$name'";
    $result = $mysqli->query($sentencia);
    $row=$result->fetch_assoc();

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
      <nav class="menu-nav">
        <ul>
            <li class="menu-items"><a  href="#" onclick="location.href='registrarservidor.php'"><i class="color-icon fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;">SERVIDOR PUBLICO</span></a></li>
            <li class="menu-items"><a  href="#" onclick="location.href='registrarcapacitacion.php'"><i class="color-icon fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;">CAPACITACIÓN</span></a></li>
            <li class="menu-items"><a  href="#" onclick="location.href='asignarcurso.php'"><i class="color-icon fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;">ASIGNAR CURSO</span></a></li>
            <li class="menu-items"><a  href="#" onclick="location.href='estadistica.php'"><i class="color-icon fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;">BUSCAR CAPACITACION</span></a></li>
            <li class="menu-items"><a  href="#" onclick="location.href='Kardexservidor.php'"><i class="color-icon fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;">KARDEX</span></a></li>
            <li class="menu-items"><a  href="#" onclick="location.href='estadisticasiscap.php'"><i class="color-icon fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;">ESTADISTICA SISCAP</span></a></li>
            <!-- <li class="menu-items"><a  href="#" onclick="location.href='repo.php'"><i class="fa-solid fa-folder-plus menu-nav--icon fa-fw  "></i><span> Repositorio </span></a></li> -->
            <!-- <a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='color-icon fas fa-file-pdf  menu-nav--icon fa-fw'></i><span style="color: white; font-weight:bold;" class="menu-items">GLOSARIO</span></a>
            <a href="#"><i class='color-icon fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span style="color: white; font-weight:bold;" class="menu-items">BUSQUEDA</span></a>
            <li class="menu-items"><a href="../administrador/estadistica.php"><i class="color-icon fa-solid fa-chart-line menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;"class="menu-items"> ESTADISTICA</span></a></li> -->
        </ul>
    </nav>

    </div>
    <!-- checar -->
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/capupsipped.png" alt="" width="1080" height="170">
      </div>
      <div class="">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive container">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <h3 style="text-align:center">Registros</h3>
                  <tr>
                    <th style="text-align:center">No.</th>
                    <th style="text-align:center">NOMBRE DE LA CAPACITACION</th>
                    <th style="text-align:center">FECHA DE INICIO</th>
                    <th style="text-align:center">FECHA DE TERMINO</th>
                    <th style="text-align:center">NO. DE PARTICIPANTES</th>
                    <th style="text-align:center">LISTA DE PARTICIPANTES</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                                          $contador= 0;
                                          $tabla="SELECT * FROM datos_capacitaciones";
                                          $var_resultado = $mysqli->query($tabla);
                                          while ($var_fila=$var_resultado->fetch_array())
                                          {
                                            $fol_exp2=$var_fila['id'];
                                            $abc="SELECT count(*) as c FROM datos_capacitaciones";
                                            $result=$mysqli->query($abc);
                                            if($result)
                                            {
                                              while($row=mysqli_fetch_assoc($result)){
                                                $cant="SELECT COUNT(*) AS cant FROM curso_por_servidor WHERE id_curso = '$fol_exp2'";
                                                $r=$mysqli->query($cant);
                                                $row2 = $r->fetch_array(MYSQLI_ASSOC);
                                                $contador = $contador + 1;
                                                echo "<tr>";
                                                echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                                echo "<td style='text-align:center'>"; echo $var_fila['nombre_capacitacion']; echo "</td>";
                                                echo "<td style='text-align:center'>"; echo $var_fila['fecha_inicio']; echo "</td>";
                                                echo "<td style='text-align:center'>"; echo $var_fila['fecha_termino']; echo "</td>";
                                                echo "<td style='text-align:center'>"; echo $row2['cant']; echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                echo "<a href='#edit_".$var_fila['id']."' class='btn color-btn-success btn-sm' data-toggle='modal'><i class='fa-solid fa-file-pen'></i> Detalle</a>";
                                                include('verparticipantes.php');
                                                echo "</td>";
                                                echo "</tr>";

                                              }

                                            }
                                          }

                                        ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
        </div>
      </div>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!-- <script src="js/jquery.min.js"></script> -->
  <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
</body>
</html>
