<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $var_fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h1 class="modal-title" id="myModalLabel">SERVIDOR PUBLICO</h1></center>
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
                <form action="actualizar_servidor.php?id=<?php echo $idservidor; ?>" method="post">
                    <div class="col-md-6 mb-3 validar">
                        <label for="NUMERO_GAFETE" class="is-required">NUMERO DE GAFETE<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="NUMERO_GAFETE" name="NUMERO_GAFETE" value="<?php echo $rowfol['num_gafete']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="CLAVE_SERVIDOR" class="is-required">CLAVE DEL SERVIDOR<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CLAVE_SERVIDOR" name="CLAVE_SERVIDOR" value="<?php echo $rowfol['clave_servidor']; ?>" type="text" maxlength="9" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="RFC_SERVIDOR" class="is-required">RFC<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="RFC_SERVIDOR" name="RFC_SERVIDOR" value="<?php echo $rowfol['rfc']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="CURP_SERVIDOR" class="is-required">CURP<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CURP_SERVIDOR" name="CURP_SERVIDOR" value="<?php echo $rowfol['curp']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="LUGAR_NACIMIENTO" class="is-required">CUIP<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CUIP_SERVIDOR" name="CUIP_SERVIDOR" value="<?php echo $rowfol['cuip']; ?>" type="text" required>
                    </div>
                     <div class="col-md-6 mb-3 validar">
                        <label for="APELLIDO_PATERNO" class="is-required">APELLIDO PATERNO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="APELLIDO_PATERNO" name="APELLIDO_PATERNO" value="<?php echo $rowfol['a_paterno']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="APELLIDO_MATERNO" class="is-required">APELLIDO MATERNO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="APELLIDO_MATERNO" name="APELLIDO_MATERNO" value="<?php echo $rowfol['a_materno']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="NOMBRE_SERVIDOR" class="is-required">NOMBRE<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" value="<?php echo $rowfol['nombre']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="CARGO" class="is-required">CARGO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="cargo" name="cargo" value="<?php echo $rowfol['cargo']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="funciones" class="is-required">FUNCIONES<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="funciones" name="funciones" value="<?php echo $rowfol['funciones']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="adscripcion" class="is-required">ADSCRIPCION<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="adscripcion" name="adscripcion" value="<?php echo $rowfol['adscripcion']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="unidad_administrativa" class="is-required">UNIDAD ADMINISTRATIVA<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="unidad_administrativa" name="unidad_administrativa" value="<?php echo $rowfol['unidad_administrativa']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="FECHA_NACIMIENTO" class="is-required">FECHA DE NACIMIENTO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" value="<?php echo date('d/m/Y', strtotime($fechanac)); ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="MUNICIPIO_DE_NACIMIENTO" class="is-required">MUNICIPIO DE NACIMIENTO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="MUNICIPIO_DE_NACIMIENTO" name="MUNICIPIO_DE_NACIMIENTO" value="<?php echo $rowfol['municipio_nacimiento']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="ESTADO_DE_NACIMIENTO" class="is-required">ESTADO DE NACIMIENTO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="ESTADO_DE_NACIMIENTO" name="ESTADO_DE_NACIMIENTO" value="<?php echo $rowfol['estado_nacimiento']; ?>" type="text" required>
                    </div>
                     <div class="col-md-6 mb-3 validar">
                        <label for="PAIS_DE_NACIMIENTO" class="is-required">PAIS_NACIMIENTO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="PAIS_DE_NACIMIENTO" name="PAIS_DE_NACIMIENTO" value="<?php echo $rowfol['pais_nacimiento']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="SEXO" class="is-required">SEXO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="SEXO" name="SEXO" value="<?php echo $rowfol['sexo']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="CORREO_PERSONAL" class="is-required">CORREO PERSONAL<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CORREO_PERSONAL" name="CORREO_PERSONAL" value="<?php echo $rowfol['correo_personal']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="CORREO_INSTITUCIONAL" class="is-required">CORREO INSTITUCIONAL<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CORREO_INSTITUCIONAL" name="CORREO_INSTITUCIONAL" value="<?php echo $rowfol['correo_institucional']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="TELEFONO_FIJO" class="is-required">TELEFONO FIJO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" value="<?php echo $rowfol['telefono_casa']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="TELEFONO_TRABAJO" class="is-required">TELEFONO TRABAJO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="TELEFONO_TRABAJO" name="TELEFONO_TRABAJO" value="<?php echo $rowfol['telefono_trabajo']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="TELEFONO_CELULAR" class="is-required">TELEFONO CELULAR<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" value="<?php echo $rowfol['celular']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="MUN_RESIDENCIA" class="is-required">MUNICIPIO DE RESIDENCIA<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="MUN_RESIDENCIA" name="MUN_RESIDENCIA" value="<?php echo $rowfol['municipio_residencia']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar"> 
                        <label for="ESTADO_RESIDENCIA" class="is-required">ESTADO DE RESIDENCIA<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="ESTADO_RESIDENCIA" name="ESTADO_RESIDENCIA" value="<?php echo $rowfol['estado_residencia']; ?>" type="text" required>
                    </div>  
                    <div class="col-md-6 mb-3 validar">     
                        <label for="PAIS_RESIDENCIA" class="is-required">PAIS DE RESIDENCIA<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="PAIS_RESIDENCIA" name="PAIS_RESIDENCIA" value="<?php echo $rowfol['pais_residencia']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="CORREO_GMAIL" class="is-required">CORREO GMAIL<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="CORREO_GMAIL" name="CORREO_GMAIL" value="<?php echo $rowfol['correo_gmail']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="IDIOMA_DOMINIO" class="is-required">IDIOMA DOMINIO<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="IDIOMA_DOMINIO" name="IDIOMA_DOMINIO" value="<?php echo $rowfol['idioma_dominio']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="NIVEL_DOMINIO" class="is-required">NIVEL DE IDIOMA<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="NIVEL_IDIOMA" name="NIVEL_IDIOMA" value="<?php echo $rowfol['nivel_dominio']; ?>" type="text" required>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                        <label for="GRADO_DE_ESTUDIOS" class="is-required">GRADO DE ESTUDIOS<span class="required"></span></label>
                        <input autocomplete="off" class="verific form-control" id="GRADO_DE_ESTUDIOS" name="GRADO_DE_ESTUDIOS" value="<?php echo $rowfol['grado_estudios']; ?>" type="text" required>
                    </div>

                  

                 </div>

			      </div>
                  <div class="modal-footer">
                      <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  ACTUALIZAR</a>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
                      <!-- <a style="display: block; margin: 0 auto;" href="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>" class="btn color-btn-success" ><i class=""></i>VALIDAR</a> -->
      
                  </div>
                </form>
        </div>
    </div>
</div>
