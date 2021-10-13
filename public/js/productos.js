// $( "#image_img" ).click(function() {
//     id = $('#image_id').val();
//     $.ajaxSetup({
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//       });
//
//     $.ajax({
//         type:'POST',
//         url:'/marca/marcaEliminar/'+id,
//         success:function(data) {
//             alert('Imagen Eliminado')
//             location.reload()
//         }
//      });
//
// });

// $(".deletePhoto").click(function(){
function imagenAlert(id){
  Swal.fire({
  title: 'Estas seguro de Eliminar ?',
  // showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Si',
  // denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    imagenDelete(id);


  } else if (result.isDenied) {
    // Swal.fire('Changes are not saved', '', 'info')
  }
})
}
// })

function imagenDelete(id){
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  $.ajax({
      type:'POST',
      url:'/producto/imageEliminar/'+id,
      success:function(data) {
          // alert('Imagen Eliminado')
          // Swal.fire('Elimnado Correctamente: '+id, '', 'success')
          console.log('data: ',data.producto_id);
          id = data.producto_id
          imagenTable(id);
          // location.reload();
      }
   });
}

function imagenTable(id){
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  $.ajax({
      type:'POST',
      url:'/producto/imagenTable/'+id,
      success:function(data) {
        console.log(data.productoPhotos);
          // alert('Imagen Eliminado')
          // Swal.fire('Elimnado Correctamente: '+id, '', 'success')
          photos = data.productoPhotos;

              $('#tablaPhotos').replaceWith(`
                <tbody id="tablaPhotos">
                </tbody>
                `);
                photos.forEach((data) => {
                  $('#tablaPhotos').append(`
                    <tr>
                      <td>
                        `+data.id+`
                          <img src="`+data.path_image+`"  style="width: 80px">
                      </td>
                      <td>
                          <a id="deletePhoto"  onclick="imagenAlert(`+data.id+`)" class="btn btn bg-gradient-danger btn-sm deletePhoto"> <i class="fa fa-trash"></i> Delete</a>
                          
                      </td>
                    </tr>
                    `);

                });



          // location.reload()
      }
   });

}
