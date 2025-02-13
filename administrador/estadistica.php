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
          className: 'btn btn-success'
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

            <!-- Search Forms -->
            <div class="container d-flex justify-content-center">
              <div class="row mt-4">
                  <form class="d-flex" style="width: 500px;">
            			<form action="" method="GET">
            			<input class="form-control me-2 fw-bold" type="search" placeholder="Buscar Capacitacion"
            			name="busqueda"> <br>
            			<button class="btn btn control me-2 fw-bold" type="submit" name="enviar" id="ocultar-mostrar"> <b>Buscar </b> </button>
            			</form>
              </div>
              <?php
            $conexion=mysqli_connect("localhost","root","","sistemacapacitacion");
            $where="";

            if(isset($_GET['enviar'])){
              $busqueda = $_GET['busqueda'];


            	if (isset($_GET['busqueda']))
            	{
            		$where="WHERE datos_capacitaciones.nombre_capacitacion LIKE'%".$busqueda."%' OR modalidad  LIKE'%".$busqueda."%'
                OR tema  LIKE'%".$busqueda."%'";
                $mostrar = 1;
            	}

            }


            ?>
                       <br>


            			</form>
            </div>

            <?php
            if ($mostrar === 1) {
              // code...
             ?>
                  <div class="container">
                  <table id="example" class=" container table table-striped table-bordered" cellspacing="0" width="50%">


                                     <thead>

                                     <tr>
                                       <th class="text-center">No.</th>
                                       <th class="text-center">NUM DE GAFETE</th>
                                       <th class="text-center">RFC</th>
                                       <th class="text-center">CUIP</th>
                                       <th class="text-center">APELLIDO PATERNO</th>
                                       <th class="text-center">APELLIDO MATERNO</th>
                                       <th class="text-center">NOMBRE</th>
                                       <th class="text-center">CARGO/PUESTO</th>
                                       <th class="text-center">FUNCIONES</th>
                                       <th class="text-center">ADSCRIPCIÓN</th>
                                       <th class="text-center">MODALIDAD</th>
                                       <th class="text-center">TIPO DE CAPACITACIÓN(SEMINARIO, PLATICA, CURSO, CONFERENCIA,)</th>
                                       <th class="text-center">NOMBRE DEL CURSO</th>
                                       <th class="text-center">FECHA INICIO</th>
                                       <th class="text-center">FECHA TERMINO</th>
                                       <th class="text-center">PONENTES</th>
                                       <th class="text-center">PROYECTO</th>
                                       <th class="text-center">TOTAL DE HORAS</th>
                                       <th class="text-center">SEDE</th>
                                       <th class="text-center">CORREO ELECTRÓNICO</th>
                                       <th class="text-center">NUM DE CELULAR</th>
                                       <th class="text-center">ULTIMO GRADO DE ESTUDIOS</th>
                                       <th class="text-center">SEXO</th>

                                    </tr>
                                    </thead>
                                    <tbody>

            				                                    <?php

                                                        $conexion=mysqli_connect("localhost","root","","sistemacapacitacion");
                                                        $SQL="SELECT * FROM datos_capacitaciones
                                                        LEFT JOIN curso_por_servidor ON datos_capacitaciones.id = curso_por_servidor.id_curso $where";
                                                        $dato = mysqli_query($conexion, $SQL);

                                                        if($dato -> num_rows >0){

                                                          while($fila=mysqli_fetch_array($dato)){
                                                            $fila['id_servidor'];
                                                            $contador = $contador + 1;

                                                            $idservidor = $fila['id_servidor'];//variable que almacena el id unico del servidor publico
                                                            $idcapacitacion = $fila['id_curso'];//variable que guarda el id de la capacitacion
                                                            // consulta para traer datos del servidor unico
                                                            $datosservidor = "select * from datosservidor WHERE id='$idservidor'";
                                                            $rdatosservidor = $conexion->query($datosservidor);
                                                            $fdatosservidor = $rdatosservidor->fetch_assoc();
                                                              // consulta para traer datos de la capacitacion
                                                              $datos_capacitaciones = "select * from datos_capacitaciones WHERE id='$idcapacitacion'";
                                                              $rdatos_capacitaciones = $conexion->query($datos_capacitaciones);
                                                              while ($fdatos_capacitaciones = $rdatos_capacitaciones->fetch_assoc()) {
                                                                // code...
                                                                echo "<tr>";
                                                                echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['num_gafete']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['rfc']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['cuip']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['a_paterno']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['a_materno']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['nombre']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['cargo']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['funciones']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['adscripcion']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['modalidad']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['tipo_capacitacion']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['nombre_capacitacion']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['fecha_inicio']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['fecha_termino']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['ponente']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo "pendiente por checar"; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['total_horas']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatos_capacitaciones['sede']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['correo_institucional']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['celular']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['grado_estudios']; echo "</td>";
                                                                echo "<td style='text-align:center'>"; echo $fdatosservidor['sexo']; echo "</td>";
                                                                echo "</tr>";
                                                              }

                                                              ?>



                                                              <?php
                                                            }
                                                          }else{

                                                            ?>
                                                            <tr class="text-center">
                                                              <td colspan="16">No existen registros</td>
                                                            </tr>


                                                            <?php

                                                          }

                                                          ?>






                                                                             <tr>
                                                                               <th class="text-center" style="border:0px dotted black;">CONFERENCIA:</th>
                                                                               <th class="text-center" style="border:0px dotted black;"><?php echo $busqueda; ?></th>
                                                                               <th class="text-center" style="border:0px dotted black;">PARTICIPANTES:</th>
                                                                               <th class="text-center" style="border:0px dotted black;"><?php echo $dato -> num_rows; ?></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>
                                                                               <th class="text-center" style="border:0px dotted black;"></th>

                                                                            </tr>


                                                        </tbody>
                                                      </table>
                                                      <?php
                                                    }
                                                    ?>
        </div>
    </div>
<a href="admin.php" class="btn-flotante">Regresar</a>

</body>
</html>
