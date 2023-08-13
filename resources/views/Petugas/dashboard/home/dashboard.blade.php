@extends('petugas.dashboard.layouts.main')
@section('container')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->

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
