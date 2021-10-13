@extends('layouts.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <a href="/productos/create" type="button" class="btn btn bg-gradient-primary btn-sm float-right p-2 m-2"><i class="fa fa-user"></i>  New producto</a>
           </li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
{{-- //////////////////// --}}
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create producto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form id="frm" method = "POST" action= "{{ route('productos.store') }}" enctype="multipart/form-data" >
                {{method_field('post')}}
                @csrf
                @include('productos.form.form')

              <!-- /.card-body -->


            </form>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')
  <script src="/js/productoCategoria.js"></script>
  <script type="text/javascript">

// Ready
$(document).ready(function () {

  //Image loader var to use when you need a function from object
  var auctionImages = null;

  // Create image loader plugin
  var imagesloader = $('[data-type=imagesloader]').imagesloader({
    maxFiles: 5
    , minSelect: 1
    , imagesToLoad: auctionImages
  });

  //Form
  $frm = $('#frm');

  // Form submit
  $frm.submit(function (e) {

    var $form = $(this);

    var files = imagesloader.data('format.imagesloader').AttachmentArray;

    var il = imagesloader.data('format.imagesloader');
   
    console.log('file: '+ files);

    if (il.CheckValidity())
      // alert('Upload ' + files.length + ' files');        

    e.preventDefault();
    e.stopPropagation();
  });

//     var arrayFiles =  [];
//   $('input#files').on('change', function() {

//   var filenames = Array.from(this.files).map(function(f) {
//     return arrayFiles.push(f.name;
//   });
//   console.log('Mark',arrayFiles);
// })
});

</script>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>


@stop
