@extends('layouts.panel')

@section('content')
<div class="row mb-3 mt-5">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="col-auto">
                    <span class="color-text mb-2" style="font-weight: 500;">Cantidad de personal</span>
                    <i class="fas fa-users fa-2x text-info" style="margin-left: 7px"></i>
                </div>
                <div class="row no-gutters align-items-center mt-3">
                    <div class="col me-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Users}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="col-auto">
                    <span class="color-text mb-2" style="font-weight: 500;">Cantidad de pacientes</span>
                    <i class="fas fa-users fa-2x text-info" style="margin-left: 1px"></i>
                </div>
                <div class="row no-gutters align-items-center mt-3">
                    <div class="col me-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Patients}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="col-auto">
                    <span class="color-text mb-2" style="font-weight: 500;">Cantidad de consultas</span>
                    <i class="fas fa-users fa-2x text-info" style="margin-left: 1px"></i>
                </div>
                <div class="row no-gutters align-items-center mt-3">
                    <div class="col me-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Patients}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="col-auto">
                    <span class="color-text mb-2" style="font-weight: 500;">Cantidad de servicios</span>
                    <i class="fas fa-users fa-2x text-info" style="margin-left: 1px"></i>
                </div>
                <div class="row no-gutters align-items-center mt-3">
                    <div class="col me-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Patients}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cantidad de consultas por mes</h4>
                <canvas id="ConsultationAreaChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Cantidad de citas por dia</h4>
            <canvas id="AppoinmentBarChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Ennfermedades mas comunes</h4>
            <canvas id="DiseaseDoughnutChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Especialiades mas concurridas</h4>
            <canvas id="SpecialtyPieChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-7 mb-4">
    <div class="card">
        <div class="card-body">
            <h6 class="m-0 font-weight-bold color-text mb-2">Notificaciones</h6>
            {{-- @if (auth()->User())
                @forelse($Posts as $notificaciones)
                    <div class="alert alert-info" role="alert">
                        <span class="text-dark">Titulo: {{ $notificaciones->data['title']}}</span>
                        <div class="">
                            <span class="text-dark">Descripcion: {{ $notificaciones->data['description']}}</span>
                        </div>
                        <div class="text-dark">
                            <p>{{ $notificaciones->created_at->diffForHumans() }}</p>
                            <button type="submit" class="mark-as-read btn btn-sm btn-dark" data-id ="{{ $notificaciones->id }}">Marcar como leida</button>
                        </div>
                    </div>
                @if ($loop->last)
                    <a href="#" id="mark-all">Marcar todas como leidas</a>
                @endif
                @empty
                    No tienes ninguna notificacion pendiente
                @endforelse
            @endif --}}
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
<script>
    $(function() {
    'use strict';
    const DataSpecialty = JSON.parse(`<?php echo $dataSpecialty['data']; ?>`);
    const DataDisease = JSON.parse(`<?php echo $dataDisease['data']; ?>`);

    var AppoinmentBarChartdata = {
        labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"],
        datasets: [{
        data: [10, 19, 3, 5, 2],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        fill: false
        }]
    };
    var options = {
        scales: {
        yAxes: [{
            ticks: {
            beginAtZero: true
            }
        }]
        },
        legend: {
        display: false
        },
        elements: {
        point: {
            radius: 0
        }
        }
    };
    var SpecialtyPieData = {
        datasets: [{
        data: [30, 40, 30, 50, 20],
        backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)'
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        }],
        labels: DataSpecialty.data
    };
    var Options = {
        responsive: true,
        animation: {
        animateScale: true,
        animateRotate: true
        }
    };
    var ConsultationAreaData = {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
        data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
        }]
    };
    var areaOptions = {
        legend: {
        display: false
        },
        plugins: {
        filler: {
            propagate: true
            
        }
        }
    }
    var DiseaseMultiAreaData = {
        labels: DataDisease.data,
        datasets: [{
            data: [8, 11, 13, 15, 12],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1,
            fill: true
        }
        ]
    };
    if ($("#ConsultationAreaChart").length) {
        var areaChartCanvas = $("#ConsultationAreaChart").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: ConsultationAreaData,
        options: areaOptions
        });
    }
    if ($("#AppoinmentBarChart").length) {
        var barChartCanvas = $("#AppoinmentBarChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: AppoinmentBarChartdata,
        options: options
        });
    }
    if ($("#DiseaseDoughnutChart").length) {
        var doughnutChartCanvas = $("#DiseaseDoughnutChart").get(0).getContext("2d");
        var doughnutChart = new Chart(doughnutChartCanvas, {
        type: 'doughnut',
        data: DiseaseMultiAreaData,
        options: Options
        });
    }
    if ($("#SpecialtyPieChart").length) {
        var pieChartCanvas = $("#SpecialtyPieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: SpecialtyPieData,
        options: Options
        });
    }
});
</script>
@endsection