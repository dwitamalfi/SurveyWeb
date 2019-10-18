@extends ('admin.master')
@section('content')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{URL::to('assets/highchart/code/highcharts.js')}}"></script>
<script src="{{URL::to('assets/highchart/code/modules/data.js')}}"></script>
<script src="{{URL::to('assets/highchart/code/modules/series-label.js')}}"></script>
<script src="{{URL::to('assets/highchart/code/modules/exporting.js')}}"></script>
<script src="{{URL::to('assets/highchart/code/modules/export-data.js')}}"></script>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$jumlahPengaduan}}</h3>

              <p>Total Pengaduan Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$terjawab}}</h3>

              <p>Pengaduan Terjawab</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$terlapor}}</h3>

              <p>Pengaduan Terlaporkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$belum}}</h3>

              <p>Belum Terjawab</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
           <div id="grafik" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          <!-- /.nav-tabs-custom -->

        

          

      
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <div id="kategori">
            
          </div>
         

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
      
    </section>
     <script type="text/javascript">
        $(function(){
            Highcharts.chart('grafik', {

    chart: {
        scrollablePlotArea: {
            minWidth: 700
        }
    },

    

    title: {
        text: 'Statistik Pengaduan yang Masuk Tahun 2019'
    },

    

    xAxis: {

       
            categories: {!! json_encode($jml_pengaduan['bulan']) !!},
                    crosshair: true

           },

    yAxis: [{ // left y axis
        title: {
            text: 'Total Pengaduan'
        },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],

    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },

    tooltip: {
        shared: true,
        crosshairs: true
    },

    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },

    series:{!! json_encode($jml_pengaduan['series']) !!}
});

        })
    </script>
    <script type="text/javascript">
      Highcharts.chart('kategori', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik Pengaduan Tiap Kategori'
    },
    subtitle: {
        text: 'Tahun 2019'
    },
    xAxis: {
        categories: [
            'Jalan',
            'Sarana',
            'E-KTP',
            'lain-lain',

            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Kategori',
        data: {!! json_encode($jml_kategori['series']) !!}
   

    }]
});
    </script>
@endsection