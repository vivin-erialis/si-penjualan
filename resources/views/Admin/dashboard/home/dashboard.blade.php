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
    <!-- /Widgets -->
    <!--  Traffic  -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Bar chart </h4>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Rader chart </h4>
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->

    </div>
    <!--  /Traffic -->
</div>
<!-- .animated -->

@endsection
