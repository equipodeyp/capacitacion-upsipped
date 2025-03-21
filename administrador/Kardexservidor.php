<?php
include("conexion.php");
session_start();

$name = $_SESSION['usuario'];
if (!isset($name)) {
    header("location: ../logout.php");
}

// Search functionality
$where = "";
$mostrar = 0;
$contador = 0;


$sentencia = "SELECT nombre, area, apellido_p, apellido_m FROM usuarios WHERE nombre='$name'";
$result = $mysqli->query($sentencia);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPACITACION SIPPSIPPED</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/cli.css">
    <link rel="stylesheet" href="../css/main2.css">
    <link rel="stylesheet" href="../datatables/datatables.min.css">
    <link rel="stylesheet" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">

    <!-- JavaScript Files -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/botonatras.js"></script>
    <script src="../datatables/datatables.min.js"></script>
    <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

                            <!-- DataTables Configuration -->
                             <script type="text/javascript">
                            $(document).ready(function() {
                                $('#example').DataTable({
                                  scrollX: true,
                                  scrollCollapse: true,
                                  searching: false, //Bfrtilp
                                    language: {
                                            "lengthMenu": "Mostrar _MENU_ registros",
                                            "zeroRecords": "No se encontraron resultados",
                                            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                            "sSearch": "false",
                                            "oPaginate": {
                                                "sFirst": "Primero",
                                                "sLast":"Último",
                                                "sNext":"Siguiente",
                                                "sPrevious": "Anterior"
                                       },
                                       "sProcessing":"Procesando...",
                                        },
                                    // para usar los botones
                                    responsive: "true",
                                    dom: '<"dt-top-container"<"dt-left-in-div"f><"dt-center-in-div"B><"dt-left-in-div"l>r>t<ip>',
                                    // dom: '<"dt-top-container"<"dt-left-in-div"B><"dt-center-in-div"f><"dt-right-in-div"rtilp>><>',
                                    buttons:[
                                  {
                                    extend:    'excelHtml5',
                                    text:      '<i class="fas fa-file-excel"></i> ',
                                    titleAttr: 'Exportar a Excel',
                                    className: 'btn btn-success',
                                    title:      'KARDEX SERVIDOR'
                                  },
                                  // {
                                  //   extend:    'pdfHtml5',
                                  //   text:      '<i class="fas fa-file-pdf"></i> ',
                                  //   titleAttr: 'Exportar a PDF',
                                  //   className: 'btn btn-danger'
                                  // },
                                  // {
                                  //   extend:    'print',
                                  //   text:      '<i class="fa fa-print"></i> ',
                                  //   titleAttr: 'Imprimir',
                                  //   className: 'btn btn-info'
                                  // },
                                ]
                                });
                            });
                            </script>
                          <link rel="stylesheet" href="../css/button_notification.css" type="text/css">
                          <style media="screen">
                          div.dt-top-container {
                          /*     display: grid;
                            grid-template-columns: auto auto auto;
                             */
                          text-align:left;
                          margin: 30px 0;
                          }

                          div.dt-center-in-div {
                            margin: 0 auto;
                            display: inline-block;
                          }

                          div.dt-filter-spacer {
                            margin: 10px 0;
                          }

                          td.highlight {
                            background-color: whitesmoke !important;
                          }

                          div.dt-left-in-div {
                            float: right;
                          }

                          div.dt-right-in-div {
                            float: right;
                          }
                          </style>
                          </head>
                          <body>
                                  <div class="contenedor">
                                      <!-- Sidebar -->
                                      <div class="sidebar ancho">
                                          <div class="logo text-warning"></div>
                                          <div class="user text-center">
                                              <?php
                                              $sentencia = "SELECT nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE nombre='$name'";
                                              $result = $mysqli->query($sentencia);
                                              $row = $result->fetch_assoc();
                                              $genero = $row['sexo'];

                                              if ($genero == 'Mujer') {
                                                  echo "<img src='../image/mujerup.png' width='100' height='100'>";
                                              } else if ($genero == 'Hombre') {
                                                  echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
                                              }
                                              ?>
                                              <h6 class="user-nombre"><?php echo $_SESSION['usuario']; ?></h6>
                                          </div>
                                      </div>

                                      <!-- Main Content -->
                                      <div class="main bg-light">
                                          <!-- Header -->
                                          <div class="barra">
                                              <img src="../image/fiscalia.png" alt="Fiscalia" width="150" height="150">
                                              <img src="../image/capupsipped.png" alt="CAPUPSIPPED" width="1080" height="170">
                                          </div>
                                          <div class="">
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <div class="table-center container">
                                                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                      <h3 style="text-align:center">KARDEX SERVIDOR</h3>
                                                      <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-center">NOMBRE DEL SERVIDOR PÚBLICO </th>
                                                        <th class="text-center">ÁREA ADMINISTRATIVA</th>
                                                        <th class="text-center">PLAZA DEL SERVICIO PÚBLICO</th>
                                                        <th class="text-center">CURSO QUE RECIBIÓ </th>
                                                        <th class="text-center">NOMBRE DE LA ISTITUCIÓN</th>
                                                        <th class="text-center">MODALIDAD</th>
                                                        <th class="text-center">FECHA DE INICIO DEL CURSO</th>
                                                        <th class="text-center">FECHA FIN DE CURSO</th>
                                                        <th class="text-center">TOTAL DE HORAS CURSO</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php
                                                      $contador= 0;
                                                      $tabla="SELECT * FROM curso_por_servidor";
                                                      $var_resultado = $mysqli->query($tabla);
                                                      while ($var_fila=$var_resultado->fetch_assoc())
                                                      {
                                                        $idcurso=$var_fila['id_curso'];
                                                        $idservidor=$var_fila['id_servidor'];
                                                        $cant="SELECT * FROM datosservidor WHERE id = '$idservidor'";
                                                        $r=$mysqli->query($cant);
                                                        $row2 = $r->fetch_assoc();

                                                        $cant21="SELECT * FROM datos_capacitaciones WHERE id = '$idcurso'";
                                                        $r21=$mysqli->query($cant21);
                                                        $row221 = $r21->fetch_assoc();

                                                        $contador = $contador + 1;
                                                        echo "<tr>";
                                                        echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                                        echo "<td style='text-align:center'>";
                                                        echo $row2['a_paterno'] . " " . $row2['a_materno'] . " " .  $row2['nombre']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row2['unidad_administrativa']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row2['cargo']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row221['nombre_capacitacion']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row221['institucion']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row221['modalidad']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row221['fecha_inicio']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row221['fecha_termino']; echo "</td>";
                                                        echo "<td style='text-align:center'>"; echo $row221['total_horas']; echo "</td>";
                                                        echo "</tr>";
                                                      }

                                                      ?>
                                                    </tbody>
                                                  </table>
              </div>
            </div>
          </div>
           <a href="admin.php" class="btn-flotante">Regresar</a>
          <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
        </div>
      </div>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!-- <script src="js/jquery.min.js"></script> -->
  <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
</body>
</html>
