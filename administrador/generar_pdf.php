<?php
$fechainicial = $_POST['diainicio'];
$fechafin  = $_POST['diafin'];
$dateprin = date("d-m-Y", strtotime($fechainicial));
$dateconclu = date("d-m-Y", strtotime($fechafin));
require_once '../mpdf/vendor/autoload.php';
include("conexion.php");
$css = file_get_contents('../../css/main2.css');

$mpdf = new \Mpdf\Mpdf([
          'mode' => '',
          'format' => 'A4',
          'default_font_size' => 0,
          'default_font' => '',
          'margin_left' => 10,
          'margin_right' => 7,
          'margin_top' => 32,
          'margin_bottom' => 20,
          'margin_header' => 2,
          'margin_footer' => 2,
          'orientation' => 'P',
    ]);
    $mpdf->SetHTMLHeader('<table width="100%">
    <tr>
    <td width="10%"><img  src="../image/gobierno2.jpeg" width="120" height="130"></td>
    <td width="80%" style="font-family: gothambook" align="center"><span align="center">SUBDIRECCION DE ENLACE INTERINSTITUCIONAL </span><br>
    </td>
    <td width="10%" style="text-align: right;"><img  src="../image/fiscalia.png" width="60" height="60"></td>
    </tr>
    </table>');
    $mpdf->SetHTMLFooter('
    <div>
    <table width="4%" align="right">
    <tr>
    <td width="3%" align="center" bgcolor="#97897D" style="height:30vh;"><h3 class=""></font></span>
    <span style="font-size: .55em; align:left;width:6px; color:white;"><font style="font-family: gothambook">
    <p align="center">
    <span style="font-size: 2em;">{PAGENO}</span>
    </p>
    </font></span></h3>
    </td>
    </tr>
    </table>
    <table width="100%">
    <tr>
    <td width="100%" align="right" bgcolor="#63696D" style="height:38vh;"><h3 class=""></font></span>
    <span style="font-size: .55em; align:center;width:6px; color:white;"><font style="font-family: gothambook">
    Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio<br>
    Subdirección de Enlace interinstitucional
    </font></span></h3>
    </td>
    </tr>
    </table>
    </p>
    </p>
    </div>
    ');

$data .= '';
// $data .= ''.$fechainicial.'';
// $data .= '<br>';
// $data .= ''.$fechafin.'';



$diainicial = date('d', strtotime($fechainicial));
$mesnumeroinicial = date('m', strtotime($fechainicial));
$anioinicial = date('Y', strtotime($fechainicial));

$diafinal = date('d', strtotime($fechafin));
$mesnumerofinal = date('m', strtotime($fechafin));
$aniofinal = date('Y', strtotime($fechafin));
  switch ($mesnumeroinicial) {
    case 1:
    echo $fecha_formateada_inicial = $diainicial." DE ENERO DE ".$anioinicial;
    break;
    case 2:
    echo $fecha_formateada_inicial = $diainicial." DE FEBRERO DE ".$anioinicial;
    break;
    case 3:
    echo $fecha_formateada_inicial = $diainicial." DE MARZO DE ".$anioinicial;
    break;
    case 4:
    echo $fecha_formateada_inicial = $diainicial." DE ABRIL DE ".$anioinicial;
    break;
    case 5:
    echo $fecha_formateada_inicial = $diainicial." DE MAYO DE ".$anioinicial;
    break;
    case 6:
    echo $fecha_formateada_inicial = $diainicial." DE JUNIO DE ".$anioinicial;
    break;
    case 7:
    echo $fecha_formateada_inicial = $diainicial." DE JULIO DE ".$anioinicial;
    break;
    case 8:
    echo $fecha_formateada_inicial = $diainicial." DE AGOSTO DE ".$anioinicial;
    break;
    case 9:
    echo $fecha_formateada_inicial = $diainicial." DE SEPTIEMBRE DE ".$anioinicial;
    break;
    case 10:
    echo $fecha_formateada_inicial = $diainicial." DE OCTUBRE DE ".$anioinicial;
    break;
    case 11:
    echo $fecha_formateada_inicial = $diainicial." DE NOVIEMBRE DE ".$anioinicial;
    break;
    case 12:
    echo $fecha_formateada_inicial = $diainicial." DE DICIEMBRE DE ".$anioinicial;
    break;
  }

  switch ($mesnumerofinal) {
    case 1:
    echo $fecha_formateada_final = $diafinal." DE ENERO DE ".$aniofinal;
    break;
    case 2:
    echo $fecha_formateada_final = $diafinal." DE FEBRERO DE ".$aniofinal;
    break;
    case 3:
    echo $fecha_formateada_final = $diafinal." DE MARZO DE ".$aniofinal;
    break;
    case 4:
    echo $fecha_formateada_final = $diafinal." DE ABRIL DE ".$aniofinal;
    break;
    case 5:
    echo $fecha_formateada_final = $diafinal." DE MAYO DE ".$aniofinal;
    break;
    case 6:
    echo $fecha_formateada_final = $diafinal." DE JUNIO DE ".$aniofinal;
    break;
    case 7:
    echo $fecha_formateada_final = $diafinal." DE JULIO DE ".$aniofinal;
    break;
    case 8:
    echo $fecha_formateada_final = $diafinal." DE AGOSTO DE ".$aniofinal;
    break;
    case 9:
    echo $fecha_formateada_final = $diafinal." DE SEPTIEMBRE DE ".$aniofinal;
    break;
    case 10:
    echo $fecha_formateada_final = $diafinal." DE OCTUBRE DE ".$aniofinal;
    break;
    case 11:
    echo $fecha_formateada_final = $diafinal." DE NOVIEMBRE DE ".$aniofinal;
    break;
    case 12:
    echo $fecha_formateada_final = $diafinal." DE DICIEMBRE DE ".$aniofinal;
    break;
  }





  $data .='<div style=""><div style=""><div >
  <table style="width: 50%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#97897D">
      <thead class="thead-dark">
          <tr>
              <th colspan="2" style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; margin-top: 40px;"><font size=1><b style="text-align:center; color:white;">PERIODO DE CONSULTA DE LA INFORMACIÓN</b></font></th>
          </tr>
          <tr>
              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">Fecha de Inicio </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha_formateada_inicial.'</p></font></th>

          </tr>
          <tr>

              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">Fecha de Termino </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha_formateada_final.'</p></font></th>
          </tr>
      </thead>
  </table>
</div>';

  // Contenedor principal con tabla para layout horizontal
  $data .= '<table width="100%" style="font-family: gothambook; margin-bottom: 20px;"><tr>';

  // Tabla 1: Por función
  $data .= '<td style="vertical-align: top; width: 33%; padding: 0;">
  <table width="100%" bgcolor="#97897D" style="color:white; border-collapse: collapse; font-family: gothambook; margin-top: 20px;">
      <thead>
          <tr>
              <th colspan="2" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 14px;"><b style="color: white;">SERVIDORES PÚBLICOS CAPACITADOS POR FUNCIÓN</b></th>
          </tr>
      </thead>
      <tbody bgcolor="white" style="color: black;">
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Administrativo</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <th style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Operativo</th>
              <th style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</th>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>Total</b></td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>0</b></td>
          </tr>
      </tbody>
  </table>
  </td>';

  // Tabla 2: Por sexo
  $data .= '<td style="vertical-align: top; width: 33%; padding: 0;">
  <table width="100%" bgcolor="#97897D" style="color:white; border-collapse: collapse; font-family: gothambook; margin-top: 20px; ">
      <thead>
          <tr>
              <th colspan="2" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 14px;"><b style="color: white;">SERVIDORES PÚBLICOS CAPACITADOS POR SEXO</b></th>
          </tr>
      </thead>
      <tbody bgcolor="white" style="color: black;">
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Mujeres</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Hombres</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>Total</b></td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>0</b></td>
          </tr>
      </tbody>
  </table>
  </td>';

  // Tabla 3: Por subdirección
  $data .= '<td style="vertical-align: top; width: 33%; padding: 0;">
  <table width="100%" bgcolor="#97897D" style="color:white; border-collapse: collapse; font-family: gothambook; margin-top: 20px; ">
      <thead>
          <tr>
              <th colspan="2" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 14px;"><b style="color: white;">SERVIDORES PÚBLICOS CAPACITADOS POR SUBDIRECCIÓN</b></th>
          </tr>
      </thead>
      <tbody bgcolor="white" style="color: black;">
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>Total</b></td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>0</b></td>
          </tr>
      </tbody>
  </table>
  </td>';

  // Cerrar tabla contenedora
  $data .= '</tr></table>';

  // TABLA LISTADO DE CAPACITACIONES
  $data .= '<table width="100%" bgcolor="#97897D" style="font-family: gothambook; border-collapse: collapse; margin-top: 1px;">
      <!-- Encabezado principal -->
      <thead>
      <tr>
          <th colspan="5" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 16px;">
              <b style="color: white;">LISTADO DE CAPACITACIONES</b>
          </th>
      </tr>

      <tr>
          <th rowspan="2" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; vertical-align: middle; font-size: 14px;">
              <b style="color: white;">Institución</b>
          </th>
          <th colspan="2" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 14px;">
              <b style="color: white;">Curso</b>
          </th>
          <th rowspan="2" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; vertical-align: middle; font-size: 14px;">
              <b style="color: white;">Modalidad</b>
          </th>
          <th rowspan="2" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; vertical-align: middle; font-size: 14px;">
              <b style="color: white;">Total de servidores públicos asistentes*</b>
          </th>
      </tr>
      <tr>
          <th style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 14px;">
              <b style="color: white;">Número</b>
          </th>
          <th style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 14px;">
              <b style="color: white;">Nombre</b>
          </th>
      </tr>
      </thead>
        <tbody bgcolor="white" style="color: black;">';
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
                // echo "<tr>";
                // echo "<td rowspan='$num_cursos'>" . $institucion . "</td>";
                $data .= '<tr>
                    <td rowspan='.$num_cursos.' style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>'.$institucion.'</b></td>';
                $first = false;
              } else {
                $data .= '<tr>';
              }
              $data .='<td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>'.$fvar2['id'].'</b></td>
                    <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>'.$fvar2['nombre_capacitacion'].'</b></td>
                    <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>'.$fvar2['modalidad'].'</b></td>
                    <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>'.$fvar2['total_servidores'].'</b></td>
                    </tr>';
            }
          }
        }

        $data .= '</tbody>
  </table>';
$data .= '</div></div>';

$data .= '
  <table width="100%" bgcolor="#97897D" style="color:white; border-collapse: collapse; font-family: gothambook; margin-top: 20px;">
      <thead>
          <tr>
              <th colspan="3" style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 14px;"><b style="color: white;">CAPACITACIÓN UPSIPPED 2025</b></th>
          </tr>
          <tr>
              <th style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 13px;"><b style="color: white;">Mes</b></th>
              <th style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 13px;"><b style="color: white;">Capacitaciones</b></th>
              <th style="border: 1px solid #A19E9F; text-align: center; padding: 8px; font-size: 13px;"><b style="color: white;">Servidores Públicos capacitados</b></th>
          </tr>
      </thead>
      <tbody bgcolor="white" style="color: black;">
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Enero</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Febrero</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Marzo</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Abril</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Mayo</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Junio</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Julio</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Agosto</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Septiembre</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Octubre</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Noviembre</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">Diciembre</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-size: 13px;">0</td>
          </tr>
          <tr>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>Total</b></td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>0</b></td>
              <td style="border: 1px solid #A19E9F; padding: 6px; text-align: center; font-weight: bold; font-size: 13px;"><b>0</b></td>
          </tr>
      </tbody>
  </table>
  ';





$mpdf ->WriteHtml($css, \Mpdf\HTMLParsermode::HEADER_CSS);
$mpdf->WriteHtml($data);
// $mpdf->output("REPORTE DEL $dateprin AL $dateconclu.pdf",'D');
$mpdf->output();
?>
