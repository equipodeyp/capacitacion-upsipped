jQuery(document).ready(function(){
      // input id de la solicitud
      jQuery("#NUMERO_GAFETE").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-]/g, ''));
      });
			// input otra autoridad
      jQuery("#CLAVE_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      //input rfc de lam persona
      jQuery("#RFC_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-]/g, ''));
			});
      //input curp de la persona
      jQuery("#CURP_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-]/g, ''));
			});
      //input curp de la persona
      jQuery("#CUIP_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-]/g, ''));
			});
      //input appellido paterno del servidor
      jQuery("#PATERNO_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input apelliod materno del servidor
      jQuery("#MATERNO_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input nombre_servidor
      jQuery("#NOMBRE_SERVIDOR").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
      });
      //input cargo del servidor
      jQuery("#CARGO_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input nacionalidad de la persona
      jQuery("#ADSCRIPCION_SERVIDOR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input nacionalidad de la persona
      jQuery("#UNIDAD_ADMON").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
      });
      //input cargo del servidor
      jQuery("#MUN_NACIMIENTO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input cargo del servidor
      jQuery("#EST_NACIMIENTO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input cargo del servidor
      jQuery("#PAIS_NACIMIENTO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input alias de la persona
      // jQuery("#CORREO_PERSONAL").on('input', function (evt) {
			// 	jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9@_-]/g, ''));
			// });
      jQuery("#CORREO_PERSONAL").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9@_.-]/g, ''));
			});
      jQuery("#CORREO_INSTI").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9@_.-]/g, ''));
			});
      jQuery("#CORREO_GMAIL").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9@_.-]/g, ''));
			});

      jQuery("#TELEFONO_FIJO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      //input telefono celular de la persona
      jQuery("#TELEFONO_CELULAR").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      //input telefono celular de la persona
      jQuery("#TELEFONO_TRABAJO").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
      });
      jQuery("#MUN_RESIDENCIA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input cargo del servidor
      jQuery("#EST_RESIDENCIA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input cargo del servidor
      jQuery("#PAIS_RESIDENCIA").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input cargo del servidor
      jQuery("#IDIOMA_DOMINIO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      //input calle del domicilio de la persona
      jQuery("#CALLE").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9Ñ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input del codigo postal del domicilio de la persona
			jQuery("#CP").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
      // input nombre del tutor de la persona
      jQuery("#TUTOR_NOMBRE").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input apellido paterno del tutor de la persona
      jQuery("#TUTOR_PATERNO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input del apellido materno de la persona
      jQuery("#TUTOR_MATERNO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input de otro delito principal del proceso penal
      jQuery("#OTRO_DELITO_PRINCIPAL").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input de otro delito secundario del proceso penal
      jQuery("#OTRO_DELITO_SECUNDARIO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input de etapa de procedimiento del proceso penal
      jQuery("#ETAPA_PROCEDIMIENTO").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});
      // input del numero unico de carpeta del proceso penal
      jQuery("#NUC").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-/]/g, ''));
			});
      //input del convenio de entendimiento de la INCORPORACION

		});


    // PRIMER FUNCION PARA OBTENER ESTADO-MUNICIPIO-LOCALIDAD
    $('#correo').on('keyup', function() {
  var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
  if(!re) {
  $('#error').show();
  $('#success').hide();
  } else {
  $('#error').hide();
  $('#success').show();
  }
  })
