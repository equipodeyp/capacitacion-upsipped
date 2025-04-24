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
                                    <?php
                                    // Button in HTML form
                                        echo '<form method="post">';
                                        echo '<button type="submit" name="download_pdf">Download PDF</button>';
                                        echo '</form>';

                                        // PHP code to handle the button click
                                        if(isset($_POST['download_pdf'])) {
                                            require_once '../mpdf/vendor/autoload.php';
                                            $mpdf = new \Mpdf\Mpdf();
                                            $mpdf->WriteHTML('<h1>Hello world!</h1>');
                                            $mpdf->Output('document.pdf', 'D'); // 'D' forces download
                                        }
                                    ?>
                                    <!-- Search Forms -->
                                    <div class="container d-flex justify-content-center">
                                      <div class="row mt-8">
                                          <form class="d-flex" style="width: 500px;">
                                          <form action="" method="GET">
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
                                             <br>
                                          <!-- <button class="btn btn-primary control me-2 fw-bold" type="submit" name="enviar" id="ocultar-mostrar"> <b>Buscar </b> </button> -->
                                          </form>
                                      </div>
                                      <?php
                                    $conexion=mysqli_connect("localhost","root","","sistemacapacitacion");
                                    $where="";

                                    if(isset($_GET['enviar'])){
                                      $fechainicial = date("Y-m-d", strtotime($_GET['star']));
                                      $fechafin  = date("Y-m-d", strtotime($_GET['fin']));


                                      if (isset($_GET['star']))
                                      {
                                        $where="WHERE datos_capacitaciones.fecha_inicio BETWEEN '$fechainicial' AND '$fechafin'";
                                        $mostrar = 1;
                                      }

                                    }


                                    ?>
                                               <br>


                                          </form>
                                    </div>
                                    <?php
                                    $totalfin2 = 0;
                                    $totalfin = 0;
                                    $totaladmns = array();
                                    $servidoresid = array();
                                    function contaradmin($idcapacitacion){
                                      $mysqli = new mysqli('localhost', 'root', '', 'sistemacapacitacion');
                                      $traeradm = "SELECT COUNT(*) as total FROM curso_por_servidor
                                      INNER JOIN datosservidor ON curso_por_servidor.id_servidor = datosservidor.id
                                      WHERE datosservidor.funciones = 'ADMINISTRATIVAS'AND curso_por_servidor.id_curso = '$idcapacitacion'";
                                      $rtraeradm = $mysqli->query($traeradm);
                                      $ftraeradm = $rtraeradm->fetch_assoc();
                                      echo $totalfin = $ftraeradm['total'];
                                    }
                                    if ($mostrar === 1) {
                                      // echo "fecha inicial--->".$fechainicial;
                                      // echo "<br>";
                                      // echo "fecha final--->".$fechafin;
                                      // echo "<br>";
                                      $conexion=mysqli_connect("localhost","root","","sistemacapacitacion");
                                      $SQL="SELECT * FROM datos_capacitaciones $where";
                                      $dato = mysqli_query($conexion, $SQL);
                                      $row_cnt = $dato->num_rows;
                                      if($dato -> num_rows >0){
                                        while($fila=mysqli_fetch_array($dato)){
                                        $idunica_cap = $fila['id'];

                                        $c1 = "SELECT DISTINCT curso_por_servidor.id_servidor FROM curso_por_servidor
                                        INNER JOIN datosservidor ON curso_por_servidor.id_servidor = datosservidor.id
                                        WHERE datosservidor.funciones = 'ADMINISTRATIVAS'AND curso_por_servidor.id_curso = '$idunica_cap'";
                                        $rc1 = $mysqli->query($c1);
                                        while ($fc1 = $rc1->fetch_assoc()) {
                                          // code...
                                          echo $iddd = $fc1['id_servidor'];
                                          array_push($servidoresid, $iddd);
                                          echo "<br>";
                                        }

                                          // $mysqli = new mysqli('localhost', 'root', '', 'sistemacapacitacion');
                                          // $traeradm = "SELECT DISTINCT datosservidor.id FROM curso_por_servidor
                                          // INNER JOIN datosservidor ON curso_por_servidor.id_servidor = datosservidor.id
                                          // WHERE datosservidor.funciones = 'ADMINISTRATIVAS'AND curso_por_servidor.id_curso = '$idunica_cap'";
                                          // $rtraeradm = $mysqli->query($traeradm);
                                          // $ftraeradm = $rtraeradm->fetch_assoc();
                                          // $totalfin = $ftraeradm['id'];
                                          // array_push($totaladmns, $totalfin);
                                          // echo "<br>";
                                          // array_push($array);
                                          // $restotal = $restotal + $sumatotal;
                                          // echo $restotal;
                                          // code...

                                      }
                                      var_dump($servidoresid);
                                      echo "<br>";
                                      $resultado = array_unique($servidoresid);
                                      print_r($resultado);
                                      echo "<br>";
                                      // $vartotaladbs = array_sum($totaladmns);
                                      $length = count($resultado);
                                      echo $length;



                                    }else {
                                      ?>
                                      <h1>no existen registros</h1>
                                      <?php
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
                                                                <td><?php
                                                                echo $length;
                                                                ?></td>
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
