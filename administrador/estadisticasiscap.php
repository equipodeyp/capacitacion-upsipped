

<?php
include("conexion.php");
// error_reporting(0);
date_default_timezone_set("America/Mexico_City");
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

                               <!-- Search Forms -->
                                   <div class="container d-flex justify-content-center">
                                     <div class="row mt-8">
                                         <form class="d-flex" style="width: 500px;" action="" method="GET">
                                           <div class="col-md-4">
                                               <div class="form-group">
                                                   <label for="" class="form-label"><b> Del dia</b></label>
                                                   <input type="date" name="star" id="starfech" class="form-control" required>
                                               </div>
                                           </div>

                                           <div class="col-md-4">
                                               <div class="form-group">
                                                   <label for="" class="form-label"><b>Hasta el dia</b> </label>
                                                   <input type="date" name="fin" id="finfech" class="form-control" required>
                                               </div>
                                           </div>
                                           <div class="col-md-2">
                                               <div class="form-group">
                                                   <label for="" class="form-label"><b>BUSCAR</b></label><br>
                                                   <button type="submit" id="ocultar-mostrar" class="btn btn-primary" name="enviar"><i class="fa fa-search" aria-hidden="true"></i></button>
                                               </div>
                                           </div>
                                         </form>
                                     </div>
                                   </div>

                                   <?php
                                   // Database connection and variables initialization
                                   $conexion = mysqli_connect("localhost","root","","sistemacapacitacion");
                                   $where = "";
                                   $length = 0;
                                   $fechainicial = "";
                                   $fechafin = "";
                                   $mostrar = 0;
                                   $servidoresid = array();

                                   // Process form submission
                                   if(isset($_GET['enviar'])){
                                       $fechainicial = date("Y-m-d", strtotime($_GET['star']));
                                       $fechafin = date("Y-m-d", strtotime($_GET['fin']));

                                       if(isset($_GET['star'])) {
                                           $where = "WHERE datos_capacitaciones.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'";
                                           $mostrar = 1;
                                       }
                                   }

                                   if($mostrar === 1) {
                                       $SQL = "SELECT * FROM datos_capacitaciones $where";
                                       $dato = mysqli_query($conexion, $SQL);
                                       if($dato->num_rows > 0) {
                                           while($fila = mysqli_fetch_array($dato)) {
                                               $idunica_cap = $fila['id'];
                                               $c1 = "SELECT DISTINCT curso_por_servidor.id_servidor FROM curso_por_servidor INNER JOIN datosservidor ON curso_por_servidor.id_servidor = datosservidor.id WHERE datosservidor.funciones = 'ADMINISTRATIVAS' AND curso_por_servidor.id_curso = '$idunica_cap'";
                                               $rc1 = $mysqli->query($c1);
                                               while($fc1 = $rc1->fetch_assoc()) {
                                                   array_push($servidoresid, $fc1['id_servidor']);
                                               }
                                           }
                                           $resultado = array_unique($servidoresid);
                                           $length = count($resultado);
                                       } else {
                                           echo "<h1>No existen registros</h1>";
                                       }
                                   }

                                   // Initialize arrays to store administrative and operational server IDs
                                   $servidores_administrativos = array();
                                   $servidores_operativos = array();
                                   // Initialize counts for function-based statistics to prevent warnings
                                   $total_administrativos = 0;
                                   $total_operativos = 0;
                                   $total_servidores_funcion = 0;

                                   if($mostrar === 1) {
                                       $SQL = "SELECT * FROM datos_capacitaciones $where";
                                       $dato = mysqli_query($conexion, $SQL);

                                       if($dato->num_rows > 0) {
                                           while($fila = mysqli_fetch_array($dato)) {
                                               $idunica_cap = $fila['id'];

                                               // Query to get servers by function
                                               $c1 = "SELECT DISTINCT curso_por_servidor.id_servidor, datosservidor.funciones
                                                      FROM curso_por_servidor
                                                      INNER JOIN datosservidor ON curso_por_servidor.id_servidor = datosservidor.id
                                                      WHERE curso_por_servidor.id_curso = '$idunica_cap'";
                                               $rc1 = $mysqli->query($c1);

                                               while($fc1 = $rc1->fetch_assoc()) {
                                                   // Store server IDs in appropriate array based on function
                                                   if($fc1['funciones'] == 'ADMINISTRATIVAS') {
                                                       array_push($servidores_administrativos, $fc1['id_servidor']);
                                                   } else if($fc1['funciones'] == 'OPERATIVAS') {
                                                       array_push($servidores_operativos, $fc1['id_servidor']);
                                                   }
                                               }
                                           }

                                           // Get unique counts for each function
                                           $resultado_administrativos = array_unique($servidores_administrativos);
                                           $resultado_operativos = array_unique($servidores_operativos);

                                           // Calculate totals
                                           $total_administrativos = count($resultado_administrativos);
                                           $total_operativos = count($resultado_operativos);

                                           // Calculate total ensuring no double counting
                                           $total_servidores_funcion = $total_administrativos + $total_operativos;

                                           // Debug output
                                           echo "<!-- Debug: Administrativos: $total_administrativos, Operativos: $total_operativos, Total: $total_servidores_funcion -->";
                                       } else {
                                           echo "<h1>No existen registros</h1>";
                                       }
                                   }





                                    ?>
                                    <br><br>
                                    <?php
                                    function transformarmesaletra($pasardia, $pasarmes, $pasaranio){
                                      switch ($pasarmes) {
                                        case 1:
                                        echo $fecha_formateada = $pasardia." DE ENERO DE ".$pasaranio;
                                        break;
                                        case 2:
                                        echo $fecha_formateada = $pasardia." DE FEBRERO DE ".$pasaranio;
                                        break;
                                        case 3:
                                        echo $fecha_formateada = $pasardia." DE MARZO DE ".$pasaranio;
                                        break;
                                        case 4:
                                        echo $fecha_formateada = $pasardia." DE ABRIL DE ".$pasaranio;
                                        break;
                                        case 5:
                                        echo $fecha_formateada = $pasardia." DE MAYO DE ".$pasaranio;
                                        break;
                                        case 6:
                                        echo $fecha_formateada = $pasardia." DE JUNIO DE ".$pasaranio;
                                        break;
                                        case 7:
                                        echo $fecha_formateada = $pasardia." DE JULIO DE ".$pasaranio;
                                        break;
                                        case 8:
                                        echo $fecha_formateada = $pasardia." DE AGOSTO DE ".$pasaranio;
                                        break;
                                        case 9:
                                        echo $fecha_formateada = $pasardia." DE SEPTIEMBRE DE ".$pasaranio;
                                        break;
                                        case 10:
                                        echo $fecha_formateada = $pasardia." DE OCTUBRE DE ".$pasaranio;
                                        break;
                                        case 11:
                                        echo $fecha_formateada = $pasardia." DE NOVIEMBRE DE ".$pasaranio;
                                        break;
                                        case 12:
                                        echo $fecha_formateada = $pasardia." DE DICIEMBRE DE ".$pasaranio;
                                        break;
                                      }
                                    }
                                    // $fechainicial;
                                    $diainicial = date('d', strtotime($fechainicial));
                                    $mesnumeroinicial = date('m', strtotime($fechainicial));
                                    $anioinicial = date('Y', strtotime($fechainicial));
                                    // transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial);
                                    // $fechafin;
                                    $diafinal = date('d', strtotime($fechafin));
                                    $mesnumerofinal = date('m', strtotime($fechafin));
                                    $aniofinal = date('Y', strtotime($fechafin));


                                    ?>
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
                                                <td><?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fecha de Término</td>
                                                <td><?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?></td>
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
                                                                <td><?php echo $total_administrativos; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Operativo</td>
                                                                <td><?php echo $total_operativos; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td><?php echo $total_servidores_funcion; ?></td>
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
                                                          <?php
                                                          // Get women count
                                                          $mujeres_query = "SELECT COUNT(DISTINCT datosservidor.id) as total FROM datosservidor
                                                          INNER JOIN curso_por_servidor ON datosservidor.id = curso_por_servidor.id_servidor
                                                          INNER JOIN datos_capacitaciones ON curso_por_servidor.id_curso = datos_capacitaciones.id
                                                          WHERE datos_capacitaciones.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'
                                                          AND datosservidor.sexo = 'FEMENINO'";
                                                          $r_mujeres = $mysqli->query($mujeres_query);
                                                          $f_mujeres = $r_mujeres->fetch_assoc();
                                                          $total_mujeres = $f_mujeres['total'];

                                                          // Get men count
                                                          $hombres_query = "SELECT COUNT(DISTINCT datosservidor.id) as total FROM datosservidor
                                                          INNER JOIN curso_por_servidor ON datosservidor.id = curso_por_servidor.id_servidor
                                                          INNER JOIN datos_capacitaciones ON curso_por_servidor.id_curso = datos_capacitaciones.id
                                                          WHERE datos_capacitaciones.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'
                                                          AND datosservidor.sexo = 'MASCULINO'";
                                                          $r_hombres = $mysqli->query($hombres_query);
                                                          $f_hombres = $r_hombres->fetch_assoc();
                                                          $total_hombres = $f_hombres['total'];

                                                          // Calculate total
                                                          $total_general = $total_mujeres + $total_hombres;
                                                          ?>
                                                          <tr>
                                                              <td>Mujeres</td>
                                                              <td><?php echo $total_mujeres; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Hombres</td>
                                                              <td><?php echo $total_hombres; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td>Total</td>
                                                              <td><?php echo $total_general; ?></td>
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
                                                    <?php
                                                    $var123 = "SELECT COUNT(*) as total FROM datosservidor
                                                    INNER JOIN curso_por_servidor ON datosservidor.id = curso_por_servidor.id_servidor
                                                    INNER JOIN datos_capacitaciones ON curso_por_servidor.id_curso = datos_capacitaciones.id
                                                    WHERE datos_capacitaciones.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'";
                                                    $rvar123 = $mysqli ->query($var123);
                                                    $fvar123 = $rvar123->fetch_assoc();


                                                    $var1 = "SELECT DISTINCT datosservidor.adscripcion FROM datosservidor
                                                    INNER JOIN curso_por_servidor ON datosservidor.id = curso_por_servidor.id_servidor
                                                    INNER JOIN datos_capacitaciones ON curso_por_servidor.id_curso = datos_capacitaciones.id
                                                    WHERE datos_capacitaciones.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'";
                                                    $rvar1 = $mysqli ->query($var1);
                                                    while ($fvar1 = $rvar1->fetch_assoc()) {
                                                      $nameadscrpcion = $fvar1['adscripcion'];

                                                      $var5 = "SELECT COUNT(*) as total FROM datosservidor
                                                      INNER JOIN curso_por_servidor ON datosservidor.id = curso_por_servidor.id_servidor
                                                      INNER JOIN datos_capacitaciones ON curso_por_servidor.id_curso = datos_capacitaciones.id
                                                      WHERE datos_capacitaciones.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin' AND datosservidor.adscripcion = '$nameadscrpcion'";
                                                      $rvar5 = $mysqli ->query($var5);
                                                      $fvar5 = $rvar5->fetch_assoc();

                                                      ?>
                                                      <tr>
                                                        <td><?php echo $fvar1['adscripcion']; ?></td>
                                                        <td><?php echo $fvar5['total']; ?></td>
                                                      </tr>

                                                    <?php  // code...
                                                    }
                                                    ?>
                                                      <!-- <tr>
                                                          <td>Subdirección de Ejecución de Medidas</td>
                                                          <td>0</td>
                                                      </tr> -->
                                                      <tr>
                                                          <td>Total</td>
                                                          <td><?php echo $fvar123['total']; ?></td>
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
                                              <?php
                                              // Get all unique institutions from datos_capacitaciones
                                              $var1 = "SELECT DISTINCT institucion FROM datos_capacitaciones
                                              WHERE fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'";
                                              $rvar1 = $mysqli->query($var1);

                                              while ($fvar1 = $rvar1->fetch_assoc()) {
                                                $institucion = $fvar1['institucion'];

                                                // Get courses for this institution
                                                $var2 = "SELECT dc.*,
                                                       COUNT(cps.id_servidor) as total_servidores
                                                FROM datos_capacitaciones dc
                                                LEFT JOIN curso_por_servidor cps ON dc.id = cps.id_curso
                                                WHERE dc.institucion = '$institucion'
                                                AND dc.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'
                                                GROUP BY dc.id";
                                                $rvar2 = $mysqli->query($var2);
                                                $num_cursos = $rvar2->num_rows;

                                                if($num_cursos > 0) {
                                                  $first = true;
                                                  while($fvar2 = $rvar2->fetch_assoc()) {
                                                    if($first) {
                                                      echo "<tr>";
                                                      echo "<td rowspan='$num_cursos'>" . $institucion . "</td>";
                                                      $first = false;
                                                    } else {
                                                      echo "<tr>";
                                                    }
                                                    echo "<td>" . $fvar2['id'] . "</td>";
                                                    echo "<td>" . $fvar2['nombre_capacitacion'] . "</td>";
                                                    echo "<td>" . $fvar2['modalidad'] . "</td>";
                                                    echo "<td>" . $fvar2['total_servidores'] . "</td>";
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
                                    </div>

                                    <div class="">
                                   <div class="row">
                                   <div class="col-lg-12">
                                   <div class="table-center container">
                                   <?php
                                   // Get monthly statistics for the selected date range
                                   $meses = array(
                                       'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                       'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                                   );

                                   $total_capacitaciones = 0;
                                   $total_servidores = 0;
                                   ?>
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
                                              <?php
                                              foreach($meses as $index => $mes) {
                                                  $mes_num = $index + 1;

                                                  // Count trainings for this month
                                                  $query_capacitaciones = "SELECT COUNT(*) as total_cap
                                                                         FROM datos_capacitaciones
                                                                         WHERE MONTH(fecha_inicio) = $mes_num
                                                                         AND fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'";
                                                  $result_cap = $mysqli->query($query_capacitaciones);
                                                  $num_capacitaciones = $result_cap->fetch_assoc()['total_cap'];

                                                  // Count trained servers for this month
                                                  $query_servidores = "SELECT COUNT(DISTINCT cps.id_servidor) as total_serv
                                                                     FROM curso_por_servidor cps
                                                                     INNER JOIN datos_capacitaciones dc ON cps.id_curso = dc.id
                                                                     WHERE MONTH(dc.fecha_inicio) = $mes_num
                                                                     AND dc.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'";
                                                  $result_serv = $mysqli->query($query_servidores);
                                                  $num_servidores = $result_serv->fetch_assoc()['total_serv'];

                                                  $total_capacitaciones += $num_capacitaciones;
                                                  $total_servidores += $num_servidores;
                                                  ?>
                                                  <tr>
                                                      <td><?php echo $mes; ?></td>
                                                      <td><?php echo $num_capacitaciones; ?></td>
                                                      <td><?php echo $num_servidores; ?></td>
                                                  </tr>
                                              <?php } ?>
                                              <tr class="total-row">
                                                  <td><strong>Total</strong></td>
                                                  <td><strong><?php echo $total_capacitaciones; ?></strong></td>
                                                  <td><strong><?php echo $total_servidores; ?></strong></td>
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
