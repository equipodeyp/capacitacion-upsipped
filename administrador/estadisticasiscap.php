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

    require_once '../mpdf/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->Output();
    require_once '../mpdf/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->Output();
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
                            //         buttons:[
                            //       {
                            //         extend:    'excelHtml5',
                            //         text:      '<i class="fas fa-file-excel"></i> ',
                            //         titleAttr: 'Exportar a Excel',
                            //         className: 'btn btn-success',
                            //         title:      'KARDEX SERVIDOR'
                            //       },
                            //       // {
                            //       //   extend:    'pdfHtml5',
                            //       //   text:      '<i class="fas fa-file-pdf"></i> ',
                            //       //   titleAttr: 'Exportar a PDF',
                            //       //   className: 'btn btn-danger'
                            //       // },
                            //       // {
                            //       //   extend:    'print',
                            //       //   text:      '<i class="fa fa-print"></i> ',
                            //       //   titleAttr: 'Imprimir',
                            //       //   className: 'btn btn-info'
                            //       // },
                            //     ]
                            //     });
                            // });
                            </script>
                          <link rel="stylesheet" href="../css/button_notification.css" type="text/css">
                          <style>
                              body {
                                  font-family: Arial, sans-serif;
                              }
                              .tables-container {
                                  display: flex;
                                  justify-content: space-between;
                                  margin-top: 20px;
                              }
                              .table-wrapper {
                                  width: 30%;
                              }
                              .table {
                                  width: 100%;
                                  border-collapse: collapse;
                              }
                              .table-header {
                                  background-color: #607d8b;
                                  color: white;
                                  text-align: center;
                                  padding: 10px;
                                  font-weight: bold;
                              }
                              .table td {
                                  border: 1px solid #607d8b;
                                  padding: 8px;
                                  text-align: center;
                              }
                              .consultation-period {
                                  width: 100%;
                                  border-collapse: collapse;
                                  margin-bottom: 20px;
                              }
                              .consultation-period th,
                              .consultation-period td {
                                  border: 1px solid #607d8b;
                                  padding: 8px;
                              }
                              .consultation-period .table-header {
                                  background-color: #607d8b;
                                  color: white;
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
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="table-header">PERIODO DE CONSULTA DE LA INFORMACIÓN</th>
                                            </tr>
                                            <tr>
                                                <td>Fecha de Inicio</td>
                                                <td>01 DE MARZO DE 2025</td>
                                            </tr>
                                            <tr>
                                                <td>Fecha de Término</td>
                                                <td>24 DE MARZO DE 2025</td>
                                            </tr>
                                        </thead>
                                    </table>

                                        <div class="tables-container">
                                            <div class="table-wrapper">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2" class="table-header">SERVIDORES PÚBLICOS CAPACITADOS POR FUNCIÓN</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Administrativo</td>
                                                                <td>5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Operativo</td>
                                                                <td>9</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>14</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            <div class="table-wrapper">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2" class="table-header">SERVIDORES PÚBLICOS CAPACITADOS POR SEXO</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Mujeres</td>
                                                                <td>10</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hombres</td>
                                                                <td>4</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>14</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            <div class="table-wrapper">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2" class="table-header">SERVIDORES PÚBLICOS CAPACITADOS POR SUBDIRECCIÓN</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Subdirección de Análisis de Riesgo</td>
                                                                <td>0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Subdirección de Ejecución de Medidas</td>
                                                                <td>0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>14</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                              <div class="">
                                              <div class="row">
                                              <div class="col-lg-12">
                                              <div class="table-center container">
                                              <table class="table table-striped table-bordered">
                                              <thead>
                                                <tr>
                                                  <th style="text-align:center" colspan="5">LISTADO DE CAPACITACIONES</th>
                                                </tr>
                                                <tr>
                                                  <th style="text-align:center" rowspan="2">Institución</th>
                                                  <th style="text-align:center" colspan="2">Curso</th>
                                                  <th style="text-align:center" rowspan="2">Modalidad</th>
                                                  <th style="text-align:center" rowspan="2">Total de servidores públicos asistentes*</th>
                                                </tr>
                                                <tr>
                                                  <th style="text-align:center">Número</th>
                                                  <th style="text-align:center">Nombre</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td rowspan="7">Comisión Estatal de Derechos Humanos</td>
                                                  <td rowspan="">1</td>
                                                  <td rowspan="">Legalidad y seguridad</td>
                                                  <td rowspan="">En línea</td>
                                                  <td rowspan="">2</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">2</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">3</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">4</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">5</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">6</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">7</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>

                                                <!--  -->

                                                <tr>
                                                  <td rowspan="7">Fiscalía General de Justicia del Estado de México</td>
                                                  <td rowspan="">8</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">9</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">10</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">11</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">12</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">13</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <tr>
                                                  <td rowspan="">14</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                                <!--  -->
                                                </tr>
                                                  <td rowspan="1">Impunidad Cero</td>
                                                  <td rowspan="">15</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                  <td rowspan="">szdfhdgf</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                          <div class="">
                                          <div class="row">
                                          <div class="col-lg-12">
                                          <div class="table-center container">
                                          <table class="table table-striped table-bordered">
                                              <thead>
                                                <tr>
                                                    <th colspan="3" class="table-header">CAPACITACIÓN UPSIPPED 2025</th>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: center;">Mes</th>
                                                    <th style="text-align: center;">Capacitaciones</th>
                                                    <th style="text-align: center;">Servidores Públicos capacitados</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td>Enero</td>
                                            <td>1</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>Febrero</td>
                                            <td>3</td>
                                            <td>8</td>
                                        </tr>
                                        <tr>
                                            <td>Marzo</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Abril</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Mayo</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Junio</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Julio</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Agosto</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Septiembre</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Octubre</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Noviembre</td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Diciembre</td>
                                            <td>7</td>
                                            <td>10</td>
                                        </tr>
                                        <tr class="total-row">
                                            <td>Total</td>
                                            <td>8</td>
                                            <td>13</td>
                                        </tr>
                                            </tbody>
                                        </table>
                                    </div>

                            <div>
                            <a href="admin.php" class="btn-flotante">Regresar</a>
                            <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
                            <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
                            </div>
</body>
</html>
