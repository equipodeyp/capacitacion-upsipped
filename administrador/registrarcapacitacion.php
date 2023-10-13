
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
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validar_camposcap.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!-- datatables JS -->
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <!-- para usar botones en datatables JS -->
  <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
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
          // para usar los botones
          responsive: "true",
          dom: 'Bfrtilp',
          buttons:[
        {
          extend:    'excelHtml5',
          text:      '<i class="fas fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn color-btn-export-xls'
        },
        {
          extend:    'pdfHtml5',
          text:      '<i class="fas fa-file-pdf"></i> ',
          titleAttr: 'Exportar a PDF',
          className: 'btn color-btn-export-ppt'
        },
        {
          extend:    'print',
          text:      '<i class="fa fa-print"></i> ',
          titleAttr: 'Imprimir',
          className: 'btn color-btn-export-imp'
        },
      ]
      });
  });
  </script>

  <style>
    .pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #63696D;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #63696D;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #63696D;
  border-color: #5F6D6B;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

a:hover,
a:focus {
  color: #FFFFFF;
  text-decoration: underline;
}
  </style>
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

      </div>
        <br><br><br><br><br><br><br>
        <div class="row">
          <!-- <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1> -->
          <h5 style="text-align:center">


						<div class="wrap">

						  <div class="secciones">

						  <article id="tab1">

						  <div class="secciones form-horizontal sticky breadcrumb flat">

						           <H1> REGISTRO DE LA CAPACITACIÓN</H1>
						  </div>


						  <p><span><label ></label> * CAMPOS OBLIGATORIOS</span></p>
						    <div class="container">
						      <form class="container well form-horizontal" id="myform" method="POST" action="../administrador/guardar_capacitacion.php" enctype= "multipart/form-data">
						        <div class="row">


						          <div class="alert div-title">
						            <h3 style="text-align:center">INFORMACIÓN DE LA CAPACITACIÓN </h3>
						          </div>

						          <!-- <div class="col-md-6 mb-3 validar">
						            <label for="ID_SOLICITUD" class="is-required">ID DE LA CAPACITACIÓN<span ></span></label>
						            <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="ID_SOLICITUD" name="ID_SOLICITUD" placeholder="" required type="text" value="">
						          </div> -->

                      <div class="col-md-6 mb-3 validar">
                      <label for="MODALIDAD_CAP">MODALIDAD<span class="required"></span></label>
                      <select class="form-select form-select-lg" name="MODALIDAD_CAP" id="MODALIDAD_CAP" >
                        <option disabled selected value>SELECCIONE UNA OPCION</option>
                        <?php
                        $modalidad = "SELECT * FROM modalidad";
                        $answerasis = $mysqli->query($modalidad);
                        while($modalidads = $answerasis->fetch_assoc()){
                         echo "<option value='".$modalidads['modalidad']."'>".$modalidads['modalidad']."</option>";
                        }
                        ?>
                      </select>
                    </div>


                    <div class="col-md-6 mb-3 validar">
                    <label for="TIPO_CAP">TIPO DE CAPACITACION<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="TIPO_CAP" id="TIPO_CAP" >
                      <option disabled selected value>SELECCIONE UNA OPCION</option>
                      <?php
                      $tipocapacitacion = "SELECT * FROM tipocapacitacion";
                      $answerasis = $mysqli->query($tipocapacitacion);
                      while($tipocapacitacions = $answerasis->fetch_assoc()){
                       echo "<option value='".$tipocapacitacions['tipo']."'>".$tipocapacitacions['tipo']."</option>";
                      }
                      ?>
                    </select>
                  </div>




						          <div class="col-md-6 mb-3 validar"><br />
						            <label for="NOMBRE_CAP" class="is-required">NOMBRE DE LA CAPACITACIÓN<span class="required"></span></label>
						            <input autocomplete="off"  class="verific form-control" id="NOMBRE_CAP" name="NOMBRE_CAP" value="" type="text" required>
						          </div>

                      <div class="col-md-6 mb-3 validar"><br />
                        <label for="TEMA_CAP" class="is-required">TEMA<span class="required"></span></label>
                        <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="TEMA_CAP" name="TEMA_CAP" value="" type="text" required>
                      </div>


                      <div class="col-md-6 mb-3 validar"><br />
                        <label for="FECHAINICIO_CAP" class="is-required">FECHA DE INICIO<span class="required"></span></label>
                        <input onkeyup="validarfrm()" class="verific form-control" id="FECHAINICIO_CAP" name="FECHAINICIO_CAP" value="" type="date" value="" required>
                      </div>


                      <div class="col-md-6 mb-3 validar"><br />
                        <label for="FECHATERMINO_CAP" class="is-required">FECHA DE TERMINO<span class="required"></span></label>
                        <input onkeyup="validarfrm()" class="verific form-control" id="FECHATERMINO_CAP" name="FECHATERMINO_CAP" value="" type="date" value="" required>
                      </div>


                      <div class="col-md-6 mb-3 validar"><br />
						            <label for="NOMBRE_PONENTE" class="is-required">NOMBRE DEL PONENTE<span class="required"></span></label>
						            <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="NOMBRE_PONENTE" name="NOMBRE_PONENTE" value="" type="text">
						          </div>

                      <div class="col-md-6 mb-3 validar"><br />
                        <label for="DUR_HORAS" class="is-required">DURACION TOTAL DE HORAS<span class="required"></span></label>
                        <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="DUR_HORAS" name="DUR_HORAS" value="" type="text" required>
                      </div>



                    <div class="col-md-6 mb-3 validar"><br />
                    <label for="RESUL_CAP">RESULTADO DE  LA CAPACITACION<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="RESUL_CAP" id="RESUL_CAP" >
                      <option disabled selected value>SELECCIONE UNA OPCION</option>
                      <?php
                      $resultado = "SELECT * FROM resultado";
                      $answerasis = $mysqli->query($resultado);
                      while($resultados = $answerasis->fetch_assoc()){
                       echo "<option value='".$resulados['resultado']."'>".$resultados['resultado']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar"><br />
                  <label for="CONSTANCIA_CAP">CONSTANCIA DE  LA CAPACITACION<span class="required"></span></label>
                  <select class="form-select form-select-lg" name="CONSTANCIA_CAP" id="CONSTANCIA_CAP" >
                    <option disabled selected value>SELECCIONE UNA OPCION</option>
                    <?php
                    $acreditacion = "SELECT * FROM acreditacion";
                    $answerasis = $mysqli->query($acreditacion);
                    while($acreditacions = $answerasis->fetch_assoc()){
                     echo "<option value='".$acreditacions['tipo']."'>".$acreditacions['tipo']."</option>";
                    }
                    ?>
                  </select>
                </div>




                  <div class="col-md-6 mb-3 validar"><br />
                    <label for="SEDE_CAP" class="is-required">SEDE<span class="required"></span></label>
                    <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="SEDE_CAP" name="SEDE_CAP" value="" type="text">
                  </div>






      <!-- <a href="../admin.php" class="btn-flotante-dos">Guardar</a> -->
  </div>
  </div>
  <div class="row">
    <div>
      <br>
      <br>
      <button style="display: block; margin: 0 auto;"  class="btn color-btn-success" id="enter" type="submit">GUARDAR</button>
    </div>
  </div>
  <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
  <a href="admin.php" class="btn-flotante">Regresar</a>
</body>
