@extends('petugas.dashboard.layouts.main')
@section('container')
    <!-- Animated -->
    <div class="animated fadeIn">
        <!--  Traffic  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Grafik Penjualan </h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->
                                <div id="traffic-chart" class="traffic-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    

@endsection