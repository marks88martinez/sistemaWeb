$( "#banner_img" ).click(function() {
    id_banner = $('#banner_id').val();
    alert( "Valor"+id_banner );


    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/banners/bannerEliminar/'+id_banner,
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            id: id_banner
        }
    });

});
