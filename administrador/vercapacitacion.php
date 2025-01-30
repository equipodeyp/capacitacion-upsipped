<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $var_fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h1 class="modal-title" id="myModalLabel">DATOS DE LA CAPACITACIÓN</h1></center>
            </div>
            <div class="modal-body">
			           <div class="container-fluid">
                   <?php
                   $contar = 0;
                   $id_capacitacion =$var_fila['id'];
                   $fol=" SELECT * FROM datos_capacitaciones WHERE id='$id_capacitacion'";
                   $resultfol = $mysqli->query($fol);
                   $rowfol=$resultfol->fetch_assoc();
                //    echo$rowfol['fecha_nacimiento'];
                   $fechanac = $rowfol['nombre_capacitacion'];
                    ?>
                    <div class="col-md-4 mb-3 validar">
                        <label for="modalidad" class="is-required">MODALIDAD<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="MODALIDAD" name="MODALIDAD" value="<?php echo $rowfol['modalidad']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="tipo_capacitacion" class="is-required">TIPO DE CAPACITACIÓN<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="tipo_capacitacion" name="tipo_capacitacion" value="<?php echo $rowfol['tipo_capacitacion']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                            <label for="otros_cap" class="is-required">OTROS CAPACITACIONES<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="otros_cap" name="otros_cap" value="<?php echo $rowfol['otros_cap']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="nombre_capacitacion" class="is-required">NOMBRE DE LA CAPACITACIÓN<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="nombre_capacitacion" name="nombre_capacitacion" value="<?php echo $rowfol['nombre_capacitacion']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="tema" class="is-required">TEMA<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="tema" name="tema" value="<?php echo $rowfol['tema']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="fecha_inicio" class="is-required">FECHA DE INICIO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $rowfol['fecha_inicio']; ?>" type="date" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="fecha_termino" class="is-required">FECHA DE TERMINO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="fecha_termino" name="fecha_termino" value="<?php echo $rowfol['fecha_termino']; ?>" type="date" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="ponente" class="is-required">PONENTE<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="ponente" name="ponente" value="<?php echo $rowfol['ponente']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="institucion" class="is-required">INSTITUCIÓN<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="institucion" name="institucion" value="<?php echo $rowfol['institucion']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="total_horas" class="is-required">TOTAL DE HORAS<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="total_horas" name="total_horas" value="<?php echo $rowfol['total_horas']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="resultado" class="is-required">RESULTADO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="resultado" name="resultado" value="<?php echo $rowfol['resultado']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="constancia" class="is-required">CONSTANCIA<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="constancia" name="constancia" value="<?php echo $rowfol['constancia']; ?>" type="text" disabled required>
                    </div>
                    <div class="col-md-4 mb-3 validar">
                        <label for="sede" class="is-required">SEDE<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="sede" name="sede" value="<?php echo $rowfol['sede']; ?>" type="text" disabled required>
                    </div>
                    
			      </div>
                 <div class="center">
                     
                      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
                      <!-- <a style="display: block; margin: 0 auto;" href="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>" class="btn color-btn-success" ><i class=""></i>VALIDAR</a> -->

                  </div>
                 </div>
               
        </div>
    </div>
</div>
