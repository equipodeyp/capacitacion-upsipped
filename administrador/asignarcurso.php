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
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/capupsipped.png" alt="" width="1080" height="170">
      </div>
        <br><br><br><br><br><br><br>
        <!-- <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1> -->
          <h5 style="text-align:center">
            <!-- <?php echo utf8_decode(strtoupper($row['area'])); ?> </span> -->

<br><br><br><br><br>

<H1 style="text-align:center">
  ASIGNAR CURSO
</H1>
<div class="wrap">

<form class="container well form-horizontal" id="myform" method="POST" action="../administrador/guardar_asignacion.php" enctype= "multipart/form-data">



  <div class="secciones">
    <article id="tab1">



      <!-- menu de navegacion de la parte de arriba -->
    <!-- <div class="secciones form-horizontal sticky breadcrumb flat">
      <a href="../subdireccion_de_apoyo_tecnico_juridico/menu.php">REGISTROS</a>
      <a class="actived">NUEVO EXPEDIENTE</a>
    </div> -->





      <div class=" well form-horizontal">
        <div class="row">
          <form class="" method="POST" action="guardar_expediente.php">
            <!-- <div class="alert div-title">
              <h3 style="text-align:center">ASIGNAR CURSO</h3>
            </div> -->

            <div class="form-group">
              <label class="col-md-4 control-label">NOMBRE DE LA CAPACITACION</label>
              <div class="col-md-4 selectContainer">
                <!-- <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span> -->
                  <select name="namecapacitacion" class="form-control selectpicker" id="namecapacitacion" required>
                    <option disabled selected value>SELECCIONE UNA OPCION</option>
                    <?php
                    $capacitacion = "SELECT * FROM datos_capacitaciones";
                    $answerasis = $mysqli->query($capacitacion);
                    while($capacitacions = $answerasis->fetch_assoc()){
                      echo "<option value='".$capacitacions['id']."'>".$capacitacions['nombre_capacitacion']."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>


  <div class="form-group">
    <label class="col-md-4 control-label">NOMBRE DEL(OS) SERVIDOR(ES)</label>
    <div class="col-md-4 selectContainer">
      <!-- <div class="input-group">
        <span class="input-group-addon"><i class="fas fa-project-diagram"></i></span> -->
        <div class="col-md-6 mb-12 validar">
          <!-- <label for="">SELECCIONA SERVIDOR(ES)</label> -->

          <select class="mul-select form-select form-select-lg mb-3" multiple="true" name="sel_relacional[]" style="width:300px">
            <?php
            $servidor = "SELECT * FROM datosservidor";
            $answerasis = $mysqli->query($servidor);
            while($servidors = $answerasis->fetch_assoc()){
              echo "<option value='".$servidors['id']."'>".$servidors['nombre'].' '.$servidors['a_paterno'].' '.$servidors['a_materno']."</option>";
            }
            ?>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div>
      <br>
      <br>
      <button style="display: block; margin: 0 auto;"  class="btn color-btn-success" id="enter" type="submit">GUARDAR</button>
    </div>
  </div>
          </form>
        </div>
      </div><!-- /.container -->
    </article>
  </div>
</form>
</div>






  <a href="admin.php" class="btn-flotante">Regresar</a>
    <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
  </div>
  <script type="text/javascript">
$(document).ready(function(){
          $(".mul-select").select2({
                  placeholder: "SELECCIONA", //placeholder
                  tags: true,
                  tokenSeparators: ['/',',',';'," "]
              });
          })
</script>
<script src="../js/pruebadisabled.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
