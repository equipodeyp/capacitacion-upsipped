jQuery(document).ready(function(){

      jQuery("#NOMBRE_CAP").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-]/g, ''));
      });

      jQuery("#TEMA_CAP").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z0-9-]/g, ''));
			});

      jQuery("#NOMBRE_PONENTE").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ-]/g, ''));
      });

      jQuery("#DUR_HORAS").on('input', function (evt) {
			 	jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			 });


      jQuery("#SEDE_CAP").on('input', function (evt) {
				jQuery(this).val(jQuery(this).val().replace(/[^A-Za-zÑ-ñáéíóúÁÉÍÓÚ ]/g, ''));
			});


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
