 @extends ('admin.master')
@section('content')
<section class="content">
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang</h3>
                   @if(Auth::user()->role==2)
               <br><br><a href="{{url('admin/barang/create')}}"><button type="submit" class="btn btn-primary">Tambah Data Barang</button></a>
               @endif
            </div>
            <!-- /.box-header -->
              <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang </th>
                  <th>Nama Barang</th>
                  <th>Tanggal</th>
                  <th>Harga Barang</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($barang as $us)
                <tr>
                  <td>{{$us->id}}</td>
                  <td>{{$us->nama_barang}}</td>
                  <td>{{$us->tanggal}}</td>
                  <td>{{$us->harga}}</td>
                  <td>{{$us->get_status->status}}</td>
                 <td>
                    <center>
                    @if(Auth::user()->role==2)
                    <a class="btn btn-warning" href="{{url('/admin/barang/edit/'.$us->id)}}" title="Edit Data">
                      Update Harga
                    </a> 
                    @endif
                    @if(Auth::user()->role==1)
                    @if($us->status==1)
                    <a class="btn btn-success" href="{{url('/admin/barang/validasi/'.$us->id)}}" title="Validasi Harga" onclick="return confirm('Anda yakin ingin menyetujui data ini?')">
                      Setujui
                    </a>
                    @endif
                    @endif
                    
                    </center>
                  </td>

                </tr>
                @endforeach
               
                </tbody>
                
              </table>
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