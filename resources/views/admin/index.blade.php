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
            <div class="col-sm-6">
                <h3>Data Covid Seluruh Indonesia</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table table-striped table-hover table table-dark">
                        <thead>
                        <tr>
                        <th scope="col" class="text-danger">No</th>
                        <th scope="col" class="text-danger">Kota</th>
                        <th scope="col" class="text-danger">Jumlah Sembuh</th>
                        <th scope="col" class="text-danger">Jumlah Meninggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['list_data'] as $datacorona)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$datacorona['key']}}</td>
                                <td>{{number_format($datacorona['jumlah_sembuh'])}}</td>
                                <td>{{number_format($datacorona['jumlah_meninggal'])}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <h3>Jam Sholat Dan Rangking Badminton</h3>
                <div class="card" style="width: 100%;">
                    <div class="card-header bg-dark text-danger">
                    Kota Depok : {{ $datasholat['tanggal'] }}
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Imsak : {{$datasholat['imsak']}}</li>
                    @if (date("H:i") == $datasholat['subuh'])
                    <li class="list-group-item active">Subuh : {{$datasholat['subuh']}}</li>
                    @else
                    <li class="list-group-item">Subuh : {{$datasholat['subuh']}}</li>
                    @endif
                    <li class="list-group-item">Terbit : {{$datasholat['terbit']}}</li>
                    <li class="list-group-item">Dhuha : {{$datasholat['dhuha']}}</li>
                    @if (date("H:i") == $datasholat['dzuhur'])
                    <li class="list-group-item active">Dzuhur : {{$datasholat['dzuhur']}}</li>
                    @else
                    <li class="list-group-item">Dzuhur : {{$datasholat['dzuhur']}}</li>
                    @endif
                    @if (date("H:i" == $datasholat['ashar']))
                    <li class="list-group-item active">Ashar : {{$datasholat['ashar']}}</li>
                    @else
                    <li class="list-group-item">Ashar : {{$datasholat['ashar']}}</li>
                    @endif
                    @if (date("H:i") == $datasholat['maghrib'])
                    <li class="list-group-item active">Maghrib : {{$datasholat['maghrib']}}</li>
                    @else
                    <li class="list-group-item">Maghrib : {{$datasholat['maghrib']}}</li>
                    @endif
                    @if (date("H:i") == $datasholat['isya'])
                    <li class="list-group-item active">Isya : {{$datasholat['isya']}}</li>
                    @else
                    <li class="list-group-item">Isya : {{$datasholat['isya']}}</li>
                    @endif
                    </ul>
                </div>
                <hr>
                <hr>
                <table class="table table-bordered table table-striped table-hover table table-dark">
                <thead>
                    <tr>
                    <th scope="col" class="text-danger">Rank</th>
                    <th scope="col" class="text-danger">Nama Pemain</th>
                    <th scope="col" class="text-danger">Negara</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($databadminton as $badminton)
                        <tr>
                            <td>{{$badminton['rank']}}</td>
                            <td>{{$badminton['player']}}</td>
                            <td>{{$badminton['country']}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection