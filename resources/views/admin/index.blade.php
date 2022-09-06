@extends('template.master')

@section('title','Halaman Admin')

@section('judul','Halaman Admin')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">User</h5>
            <h1 class="card-subtitle mb-2 text-muted">{{$users}}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Saran</h5>
            <h1 class="card-subtitle mb-2 text-muted">{{$sarans}}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Rintangan Game</h5>
            <h1 class="card-subtitle mb-2 text-muted">{{$rintangangames}}</h1>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card" style="width: 100%;height:300px;">
                    <div class="card-header" style="background-color: #6777ef;">
                        <h2 class="text-white">Data Chart User</h2>
                    </div>
                    {{-- start --}}
                    <canvas id="barChart"></canvas>
                </div>
                {{-- end --}}
            </div>
            <div class="col-lg-6">
                <div class="card" style="width: 100%;height:300px;">
                    <div class="card-header" style="background-color: #6777ef;">
                        <h2 class="text-white">Data Detail Play Game</h2>
                    </div>
                    {{-- start --}}
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Jumlah Seluruh Pemain : {{$playgamescount}}</li>
                        <li class="list-group-item">Waktu Pemain Tercepat : {{$playgamesfast}}</li>
                        <li class="list-group-item">Waktu Pemain Terlama : {{$playgamesslow}}</li>
                        <li class="list-group-item">API Tentang : Covid 19 , BWF , JamSholat</li>
                        <li class="list-group-item">Jumlah API : 3</li>
                    </ul>
                </div>
            </div>
        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        var dataplay = <?php echo json_encode($dataplay); ?>;
        var barCanvas = $("#barChart");
        var barChart = new Chart(barCanvas,{
            type:'bar',
            data:{
                labels:['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                datasets:[
                {
                    label:'Data User',
                    data:dataplay,
                    backgroundColor:['red','orange','pink','lavender','green','salmon','gold','silver','chocolate','blue','purple','brown','lightskyblue']
                }
                ]
            },
            options:{
                scales:{
                    yAxes:[{
                        ticks:{
                            // min:0,
                            // max:50,
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    })
</script>