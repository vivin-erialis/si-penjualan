@extends('admin.dashboard.layouts.main')
@section('container')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-4 col-md-6">

            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text mr-1">Rp.<span class="count">{{ $totalPendapatan }}</span></div>
                                <div class="stat-heading">Pendapatan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text mr-1">Rp.<span class="count">{{ $totalPengeluaran }}</span></div>
                                <div class="stat-heading">Pengeluaran</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-cart"></i>
                        </div>
                        <div class="stat-content">

                            <div class="text-left dib">
                                <div class="stat-text">
                                    <span class="count">{{ $totalTerjual }}</span>
                                </div>
                                <div class="stat-heading">Terjual</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row header-data mb-4 mt-3">
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">
                                    <p class="">
                                         Penjualan Toko Pada Bulan {{ $namaBulan }} Tahun {{ $tahunIni }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                      <canvas id="myChart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
    <!--  /Traffic -->
</div>
<!-- .animated -->




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  console.log(@json($labelGrafik))

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @json($labelGrafik),
      datasets: [{
        label: 'Jumlah Terjual :',
        data: @json($dataGrafik),
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@endsection
