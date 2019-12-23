$(document).ready(function() {
    $(".select2").select2({
        language: "es"
    });

    // Editor de texto
    $('.summernote').summernote({
        tabsize: 2,
        height: 200
    });

    // Botones de radio
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });

    // Formatea el campo como precio
    $('.precio').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.',
        limit: 12,
        centsLimit: 0
    });

    // Formatea el campo como porcentaje
    $('.impuesto').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.',
        limit: 12,
        centsLimit: 2
    });

     // File input
     $('#fotografia').fileinput({
        theme: 'fa',
        language: 'es',
        showUpload: false,
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
        maxFileSize: 2000,
        maxFilesNum: 4,
    });

    $("#categoria").change(function(event){
        var categoria_id = $(this).val();
        if (categoria_id != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/lstSubcategorias/get/'+categoria_id,
                type: 'GET',
                dataType: 'json',
                cache: false,
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },
            })
            .done(function(data) {
                $("#subcategoria").empty();
                $("#subcategoria").append('<option value="">Seleccione la subcategoría</option>');
                
                $.each(data, function(index, value) {
                    /* iterar a través de una matriz u objeto */
                    $('#subcategoria').append('<option value="'+ index +'">' + value + '</option>');
                });

                $('#loader').css("visibility", "hidden");
            })
            .fail(function() {
                console.log("error al procesar los datos.");
            })
        } else {
            $("#subcategoria").empty();
            $("#subcategoria").append('<option value="">Seleccione la subcategoría</option>');
        }
    });

});