
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

$qry = "select max(ID) As id from datosservidor";
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
    <script src="../js/validar_campos.js"></script>
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
      <nav class="menu-nav">
        <ul>
            <li class="menu-items"><a  href="#" onclick="location.href='buscarservidor.php'"><i class="color-icon fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span style="color: white; font-weight:bold;">CONSULTAR SERVIDOR</span></a></li>
            </ul>
      </nav>

    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/capupsipped.png" alt="" width="1080" height="170">
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
						  <!-- menu de navegacion de la parte de arriba -->
						  <div class="secciones form-horizontal sticky breadcrumb flat">
						            <!-- <a href="../administrador/admin.php">REGISTROS</a>
						            <a href="../administrador/detalles_expediente.php?folio=<?php echo $fol_exp; ?>">EXPEDIENTE</a> -->

						  </div>

              <H1 style="text-align:center">
                REGISTRO DEL SERVIDOR
              </H1>
						  <p><span><label ></label> * CAMPOS OBLIGATORIOS</span></p>
						    <div class="container">
						      <form class="container well form-horizontal" id="myform" method="POST" action="../administrador/guardar_servidor.php " enctype= "multipart/form-data">
						        <div class="row">


						          <div class="alert div-title">
						            <h3 style="text-align:center">INFORMACIÓN DEL SERVIDOR PUBLICO</h3>
						          </div>
						          <!-- <div class="col-md-6 mb-3 validar">
						            <label for="ID_SERVIDOR" class="is-required">ID SERVIDOR PUBLICO<span ></span></label>
						            <input autocomplete="off" class="verific form-control" id="ID_SERVIDOR" name="ID_SERVIDOR" placeholder="" required type="text" value="<?php echo $filacheckautoridad['idservidor']; ?>">
						          </div> -->

                      <div class="col-md-6 mb-3 validar">
                        <label for="NUMERO_GAFETE" class="is-required">NUMERO DE GAFETE<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="NUMERO_GAFETE" name="NUMERO_GAFETE" value="" type="text" required>
                      </div>

                      <div class="col-md-6 mb-3 validar">
                        <label for="CLAVE_SERVIDOR" class="is-required">CLAVE DEL SERVIDOR<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CLAVE_SERVIDOR" name="CLAVE_SERVIDOR" value="" type="text" maxlength="9" required>
                      </div>

						          <div class="col-md-6 mb-3 validar">
						            <label for="RFC_SERVIDOR" class="is-required">RFC<span class="required"></span></label>
						            <input autocomplete="off" class="verific form-control" id="RFC_SERVIDOR" name="RFC_SERVIDOR" value="" type="text" required>
						          </div>

                      <div class="col-md-6 mb-3 validar">
                        <label for="CURP_SERVIDOR" class="is-required">CURP<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CURP_SERVIDOR" name="CURP_SERVIDOR" value="" type="text" required>
                      </div>


                      <div class="col-md-6 mb-3 validar">
                        <label for="CUIP_SERVIDOR" class="is-required">CUIP<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CUIP_SERVIDOR" name="CUIP_SERVIDOR" value="" type="text" required>
                      </div>

                      <div class="col-md-6 mb-3 validar">
						            <label for="PATERNO_SERVIDOR" class="is-required">APELLIDO PATERNO DEL SERVIDOR PÚBLICO<span class="required"></span></label>
						            <input autocomplete="off" class="verific form-control" id="PATERNO_SERVIDOR" name="PATERNO_SERVIDOR" value="" type="text" required>
						          </div>

                      <div class="col-md-6 mb-3 validar">
                        <label for="MATERNO_SERVIDOR" class="is-required">APELLIDO MATERNO DEL SERVIDOR PÚBLICO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="MATERNO_SERVIDOR" name="MATERNO_SERVIDOR" value="" type="text" required>
                      </div>

                      	 <div class="col-md-6 mb-3 validar">
                      		 <label for="NOMBRE_SERVIDOR" class="is-required">NOMBRE DEL SERVIDOR PÚBLICO<span class="required"></span></label>
                      		  <input autocomplete="off" class="verific form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" value="" type="text" required>
                      		    </div>


						          <div class="col-md-6 mb-3 validar">
                      	<label for="CARGO_SERVIDOR" class="is-required">CARGO DEL SERVIDOR PÚBLICO<span class="required"></span></label>
                      	  <input autocomplete="off" class="verific form-control" id="CARGO_SERVIDOR" name="CARGO_SERVIDOR" value="" type="text" required>
                      	     </div>



                            <div class="col-md-6 mb-3 validar">
                            <label for="FUNCIONES_SERVIDOR">FUNCIONES<span class="required"></span></label>
                            <select class="form-select form-select-lg" name="FUNCIONES_SERVIDOR" id="FUNCIONES_SERVIDOR" >
                              <option disabled selected value>SELECCIONE UNA OPCION</option>
                              <?php
                              $funciones = "SELECT * FROM funciones";
                              $answerasis = $mysqli->query($funciones);
                              while($funcioness = $answerasis->fetch_assoc()){
                               echo "<option value='".$funcioness['tipo']."'>".$funcioness['tipo']."</option>";
                              }
                              ?>
                            </select>
                          </div>


                            <div class="col-md-6 mb-3 validar">
                             <label for="ADSCRIPCION_SERVIDOR" class="is-required">ADSCRIPCION<span class="required"></span></label>
                               <input autocomplete="off" class="verific form-control" id="ADSCRIPCION_SERVIDOR" name="ADSCRIPCION_SERVIDOR" value="" type="text" required>
                                  </div>

                                  <div class="col-md-6 mb-3 validar">
                                   <label for="UNIDAD_ADMON" class="is-required">UNIDAD ADMINISTRATIVA<span class="required"></span></label>
                                     <input autocomplete="off" class="verific form-control" id="UNIDAD_ADMON" name="UNIDAD_ADMON" value="" type="text" required>
                                        </div>

                                        <div class="col-md-6 mb-3 validar">
        <label for="FECHA_NACIMIENTO" class="is-required">FECHA DE NACIMIENTO<span class="required"></span></label>
        <input class="verific form-control" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" value="" type="date" value="" required>
      </div>

      <div class="col-md-6 mb-3 validar">
      <label for="MUN_NACIMIENTO">MUNICIPIO DE NACIMIENTO<span class="required"></span></label>
      <input autocomplete="off" class="verific form-control" id="MUN_NACIMIENTO" name="MUN_NACIMIENTO" value="" type="text">
         </div>

    <div class="col-md-6 mb-3 validar">
    <label for="EST_NACIMIENTO">ESTADO DE NACIMIENTO<span class="required"></span></label>
    <input autocomplete="off" class="verific form-control" id="EST_NACIMIENTO" name="EST_NACIMIENTO" value="" type="text" >
       </div>


    <div class="col-md-6 mb-3 validar">
    <label for="PAIS_NACIMIENTO">PAIS DE NACIMIENTO<span class="required"></span></label>
    <input autocomplete="off" class="verific form-control" id="PAIS_NACIMIENTO" name="PAIS_NACIMIENTO" value="" type="text">
       </div>


    <div class="col-md-6 mb-3 validar">
    <label for="SEXO">SEXO<span class="required"></span></label>
    <select class="form-select form-select-lg" name="SEXO" id="SEXO" >
      <option disabled selected value>SELECCIONE UNA OPCION</option>
      <?php
      $sexo = "SELECT * FROM sexo";
      $answerasis = $mysqli->query($sexo);
      while($sexos = $answerasis->fetch_assoc()){
       echo "<option value='".$sexos['sexo']."'>".$sexos['sexo']."</option>";
      }
      ?>
    </select>
  </div>




    <div class="col-md-6 mb-3 validar">
     <label for="CORREO_PERSONAL" class="is-required">CORREO PERSONAL<span class="required"></span></label>
       <input autocomplete="off" class="verific form-control" id="CORREO_PERSONAL" name="CORREO_PERSONAL" value="" type="email" required >
          </div>

          <div class="col-md-6 mb-3 validar">
           <label for="CORREO_INSTI" class="is-required">CORREO INSTITUCIONAL<span class="required"></span></label>
             <input autocomplete="off" class="verific form-control" id="CORREO_INSTI" name="CORREO_INSTI" value="" type="email" required>
                </div>

                <div class="col-md-6 mb-3 validar">
                 <label for="CORREO_GMAIL" class="is-required">CORREO GMAIL<span class="required"></span></label>
                   <input autocomplete="off" class="verific form-control" id="CORREO_GMAIL" name="CORREO_GMAIL" value="" type="email" required>
                      </div>

                      <div class="col-md-6 mb-3 validar">
                       <label for="TELEFONO_FIJO" class="is-required">TELEFONO DE CASA<span class="required"></span></label>
                         <input autocomplete="off" class="verific form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" value="" type="text" required>
                            </div>

                            <div class="col-md-6 mb-3 validar">
                             <label for="TELEFONO_CELULAR" class="is-required">TELEFONO CELULAR<span class="required"></span></label>
                               <input autocomplete="off" class="verific form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" value="" type="text" required>
                                  </div>

                                  <div class="col-md-6 mb-3 validar">
                                   <label for="TELEFONO_TRABAJO" class="is-required">TELEFONO DE TRABAJO<span class="required"></span></label>
                                     <input autocomplete="off" class="verific form-control" id="TELEFONO_TRABAJO" name="TELEFONO_TRABAJO" value="" type="text" required>
                                        </div>



                                        <div class="col-md-6 mb-3 validar">
                                        <label for="MUN_RESIDENCIA">MUNICIPIO DE RESIDENCIA<span class="required"></span></label>
                                        <input autocomplete="off" class="verific form-control" id="MUN_RESIDENCIA" name="MUN_RESIDENCIA" value="" type="text">
                                           </div>


                                           <div class="col-md-6 mb-3 validar">
                                           <label for="EST_RESIDENCIA">ESTADO DE RESIDENCIA<span class="required"></span></label>
                                           <input autocomplete="off" class="verific form-control" id="EST_RESIDENCIA" name="EST_RESIDENCIA" value="" type="text">
                                              </div>

                                              <div class="col-md-6 mb-3 validar">
                                              <label for="PAIS_RESIDENCIA">PAIS DE RESIDENCIA<span class="required"></span></label>
                                              <input autocomplete="off" class="verific form-control" id="PAIS_RESIDENCIA" name="PAIS_RESIDENCIA" value="" type="text">
                                                 </div>

                                                 <div class="col-md-6 mb-3 validar">
                                                 <label for="IDIOMA_DOMINIO">IDIOMA DE DOMINIO<span class="required"></span></label>
                                                 <input autocomplete="off" class="verific form-control" id="IDIOMA_DOMINIO" name="IDIOMA_DOMINIO" value="" type="text">
                                                    </div>










                                                 <div class="col-md-6 mb-3 validar">
                                                  <label for="NIVEL_IDIOMA">NIVEL DE DOMINIO<span class="required"></span></label>
                                                    <select class="form-select form-select-lg" name="NIVEL_IDIOMA" id="NIVEL_IDIOMA" >
                                                       <option disabled selected value>SELECCIONE UNA OPCION</option>
                                                       <?php
                                                        $nivelidioma = "SELECT * FROM nivel_idioma";
                                                        $answerasis = $mysqli->query($nivelidioma);
                                                        while($nivelidiomas = $answerasis->fetch_assoc()){
                                                        echo "<option value='".$nivelidiomas['nivel']."'>".$nivelidiomas['nivel']."</option>";
                                                        }
                                                        ?>
                                                      </select>
                                                    </div>



                                              <div class="col-md-6 mb-3 validar">
                                               <label for="GRADO_DEESTUDIOS" class="is-required">GRADO DE ESTUDIOS<span class="required"></span></label>
                                               <select class="form-select form-select-lg" name="GRADO_DEESTUDIOS" id="GRADO_DEESTUDIOS" >
                                                  <option disabled selected value>SELECCIONE UNA OPCION</option>
                                                  <?php
                                                   $grado_deestudios = "SELECT * FROM gradodeestudios";
                                                   $answerasis = $mysqli->query($grado_deestudios);
                                                   while($grado_deestudioss = $answerasis->fetch_assoc()){
                                                   echo "<option value='".$grado_deestudioss['grado']."'>".$grado_deestudioss['grado']."</option>";
                                                   }
                                                   ?>
                                                 </select>
                                                    </div>



      <!-- <a href="../admin.php" class="btn-flotante-dos">Guardar</a> -->
  <!-- </div> -->
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
