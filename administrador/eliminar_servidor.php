<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="eliminar_<?php echo $var_fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:30%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h1 class="modal-title" id="myModalLabel">ELIMINAR SERVIDOR</h1></center>
                <img src="../image/caution.png" alt="" width="150" height="150">
            </div>
            <div class="modal-body">
			           <div class="container-fluid">
                       <?php
                       $contar = 0;
                        $idservidor =$var_fila['id'];
                        $fol=" SELECT * FROM datosservidor WHERE id='$idservidor'";
                        $resultfol = $mysqli->query($fol);
                        $rowfol=$resultfol->fetch_assoc();
                        //    echo$rowfol['fecha_nacimiento'];
                        $fechanac = $rowfol['fecha_nacimiento'];
                        ?>
                      <form action="actualizar_servidor.php?id=<?php echo $idservidor;?>" method="post" 
                      <center><h1 class="modal-title" id="myModalLabel">ESTA SEGURO DE ELIMINAR AL SERVIDOR</h1></center>
                      <div class="modal-footer">
                      <div style="text-align: center;">
                      <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  ELIMINAR</a>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                      <!-- <a style="display: block; margin: 0 auto;" href="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>" class="btn color-btn-success" ><i class=""></i>VALIDAR</a> -->
      
                      </div>
                      </form>
                    </div>
    </div>
</div>
