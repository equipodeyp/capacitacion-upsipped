<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $var_fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">SERVIDORES PUBLICOS</h4></center>
            </div>
            <div class="modal-body">
			           <div class="container-fluid">
                   <?php
                   $contador = 0;
                   $idcurso =$var_fila['id'];
                   $fol=" SELECT * FROM curso_por_servidor WHERE id_curso='$idcurso'";
                   $resultfol = $mysqli->query($fol);
                   while ($rowfol=$resultfol->fetch_assoc()) {
                     $contador = $contador + 1;
                     $idservidor =$rowfol['id_servidor'];
                     $fol2=" SELECT * FROM datosservidor WHERE id='$idservidor'";
                     $resultfol2 = $mysqli->query($fol2);
                     $rowfol2=$resultfol2->fetch_assoc();
                     $namecomplete = $rowfol2['nombre'].' '.$rowfol2['a_paterno'].' '.$rowfol2['a_materno'];

                    ?>

                   <div class="col-md-12 mb-3 validar">
                     <label for="SIGLAS DE LA UNIDAD">NOMBRE DEL SERVIDOR <?php echo $contador; ?><span ></span></label>
                     <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" readonly value="<?php echo $namecomplete; ?>" maxlength="50">
                   </div>

                   <?php
                    }
                    ?>

                 </div>

			      </div>
            <div class="modal-footer">
                <!-- <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  VALIDAR</a> -->
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
                <!-- <a style="display: block; margin: 0 auto;" href="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>" class="btn color-btn-success" ><i class=""></i>VALIDAR</a> -->

            </div>
        </div>
    </div>
</div>
