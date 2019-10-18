  @extends ('admin.master')
@section('content')
<section class="content">
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Barang</h3>
               
            </div>

            <!-- /.box-header -->
            <div class="box-body">
               <form role="form" action="{{url('/admin/barang/store/')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- text input -->
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input name="nama_barang" type="text" class="form-control" placeholder="Ketikkan nama barang..">
                </div>
                 <div class="form-group">
                  <label>Tanggal Update</label>
                  <input name="tanggal" type="date" class="form-control" >
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input name="harga" type="text" class="form-control" placeholder="Ketikkan harga barang..">
                </div>
                
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
</section>
@endsection
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
  $(function () {
    $('#example1').dataTable()
   
  })
</script>
<script>
  function tampilkan(){
   var role1 =document.getElementById("role").value;
   $dinas = @mysql_query("SELECT * FROM master_dinas");
   if (role1=="3"){
    document.getElementById("tampil").innerHTML="<option value='Nasi Goreng'>Nasi Goreng</option><option value='Bakso'>Bakso</option>";
   } 
   else if (role1=="1"||role1=="2s"){
    document.getElementById("tampil").innerHTML="";
   }
  }
</script>