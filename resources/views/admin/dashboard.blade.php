@extends('admin.layout.appadmin')
@section('content')

<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <a href="{{url('admin/anggota')}}">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Data Anggota</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{$totalAnggota}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Data Petugas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPetugas}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
    <a href="{{url('admin/buku')}}">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Buku
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$buku}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
</a>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
    <a href="{{url('admin/kategori')}}">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Kategori</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kategori}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</a>
</div>
</div>

<div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Chart Perbandingan Kategori Pada Buku</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBar"></canvas>
                                    </div>
                                    <hr>
                                    Berikut adalah perbandingan kategori dari total {{$buku}} buku.
                                    
                                </div>
                            </div>

                            

                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Chart Perbandingan Penerbit Pada Buku</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPie"></canvas>
                                    </div>
                                    <hr>
                                    Berikut adalah perbandingan penerbit dari total {{$buku}} buku.
                                </div>
                            </div>
                        </div>
                    </div>
<script>
    // Pie Chart Example
// var ctx = document.getElementById("myPieChart");
// var myPieChart = new Chart(ctx, {
    var label1 = [@foreach($penerbit_info as $item) '{{$item->nama}}', @endforeach];
    var data2 = [@foreach($penerbit_info as $item) {{$item->jumlah}}, @endforeach];

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#myPie'),{  
  type: 'doughnut',
  data: {
    labels: label1,
    datasets: [{
      data: data2,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
});

</script>

<script>
  // Bar Chart Example
// var ctx = document.getElementById("myBar");
// var myBarChart = new Chart(ctx, {
  var lbl = [@foreach($kategori_info as $kategori) '{{$kategori->nama}}', @endforeach];
  var data = [@foreach($kategori_info as $kategori) {{$kategori->total}}, @endforeach];
  document.addEventListener("DOMContentLoaded", () => {
    new Chart(document.querySelector ('#myBar'), {
  
  type: 'bar',
  data: {
            labels: lbl,
            datasets: [{
                label: 'Kategori',
                data: data,
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1 // Mengatur langkah antara nilai pada sumbu Y
                    }
                }]
            }
        }
});
});
</script>
@endsection