<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Web Survey Harga Pasar </title>

    <!-- Favicon  -->
    <link rel="icon" type="image/png" href="{{URL::to('assets/img/core-img/logopemkabbaru.png')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{URL::to('assets/style.css')}}">
    <script src="{{URL::to('assets/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{URL::to('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{URL::to('assets/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{URL::to('assets/js/active.js')}}"></script>
    

    
<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

</head>
<link rel="stylesheet" href="{{URL::to('assets/main.css')}}">

<body>
	<div class="flex-center pull-right">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                    @endauth
                </div>
            @endif
            
             
        </div>
  
    <div class="main-content-wrapper section-padding-50" id="maincontentatas">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area ============= -->
                <div class="col-md-12 " >
                   <div class="single-blog-content mb-100">
                       <div class="post-content">
                        <h3>Data Survey Harga Terbaru</h3>
                      
                        <hr>
                        <h4>Terbaru</h4>    
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Jenis Komoditi</th>
                                    <th>Tanggal</th>
                                    <th>Harga</th>
                                </tr>
                                 @foreach($barang as $adu)
                                <tr>
                                    <td>{{$adu->nama_barang}}</td>
                                    <td>{{$adu->tanggal}}</td>
                                    <td>{{$adu->harga}}</td>
                                   
                                </tr>
                                @endforeach
                               
                            </thead>
                        </table>
                        <hr>
                        <h4>Lebih lama</h4>    
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Jenis Komoditi</th>
                                    <th>Tanggal</th>
                                    <th>Harga</th>
                                </tr>
                                 @foreach($log as $adu)
                                <tr>
                                    <td>{{$adu->nama_barang}}</td>
                                    <td>{{$adu->tanggal}}</td>
                                    <td>{{$adu->harga}}</td>
                                   
                                </tr>
                                @endforeach
                               
                            </thead>
                        </table>
                       </div>
                   </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                
            </div>

            
            
        </div>

    </div>
   <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
        
        <h5 class="modal-title">Detil Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="tabel">
          
        </div>
      </div>
      <div class="modal-footer">
                </div>
    </div>
  </div>
</div>
</body>
</html>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
      $(document).on('ajaxComplete ready',function(){
           $('.myModal').on('click',function(e){
          
          var modal = $('#myModal');
          var id = $(this).data('id');
          var tanggapan = $(this).data('tanggapan');
          var isi = $(this).data('isi');
          modal.find('#modalMdContent #id').val($(this).data('id'));
          modal.find('#tabel').html('<table class="table"><tr><th>Isi Pengaduan </th><td>'+ isi +'</td></tr><tr><th>Tanggapan</th><td>'+ tanggapan+'</td></tr></table');
          
        })
        })
</script>