$( "#image_img" ).click(function() {
    id = $('#image_id').val();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $.ajax({
        type:'POST',
        url:'/banner/bannerEliminar/'+id,
        success:function(data) {
            alert('funka')
            location.reload()
        }
     });

});

