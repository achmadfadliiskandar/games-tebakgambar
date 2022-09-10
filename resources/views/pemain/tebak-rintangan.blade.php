@extends('layouts.app')

@section('judul','Halaman Level-'.$rintangangames->id)

@section('content')
<style>
    .active{
        border: 3px solid blue;
        box-shadow: 5px 5px black;
    }
</style>
    <div class="container">
        <h2 class="text-center text-capitalize">Level {{$rintangangames->id}}</h2>
        <div class="row">
            {{-- pointnya lebih --}}
            @if ($aktifbermain > $rintangangames->required)
            <div class="row">
                <div class="col-sm-6">
                    <div class="alert alert-info my-3">Silahkan Bermain : {{Auth::user()->name}}</div>
                </div>
                <div class="col-sm-6">
                    <div class="alert alert-info my-3">Point Anda : {{$aktifbermain}}</div>
                </div>
            </div>
            {{-- kalau poin nya pas di tengah --}}
            @elseif($aktifbermain == $rintangangames->required)
            <div class="alert alert-success my-3">Selamat Datang : {{Auth::user()->name}}</div>
            {{-- kalau poin nya kurang di bawah --}}
            @else
            <div class="alert alert-danger my-3">Maaf Persyaratan Tidak Cukup</div>
            @endif
            {{-- form lebih --}}

            {{-- menu --}}
            @forelse ($rintangangamess as $game)
                @if ($game->id == $rintangangames->id)
                <div class="col-md-4 my-3">
                    <div class="card active" style="width: 100%;">
                        {{-- <img src="{{asset('images/'.$game->images)}}" class="card-img-top" alt="gambar"> --}}
                        <div class="card-body" style="background: {{$game->warna}}">
                        <h3 class="card-title">Judul : {{$game->judul}}</h3>
                        <h5 class="card-subtitle mb-2 text-muted">Level : {{$game->level}}</h5>
                        @if ($game->required == NULL)
                        <h6 class="card-text text-dark text-capitalize">tidak ada persyaratan/required</h6>
                        @else
                        <h6 class="card-text">Required : Harus Kelar Level : {{$game->required}}</h6>
                        @endif
                        <a href="{{url('pemain/answer/jawab/'.$game->id)}}" class="btn btn-primary">Silahkan Menebak</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-4 my-3">
                    <div class="card" style="width: 100%;">
                        {{-- <img src="{{asset('images/'.$game->images)}}" class="card-img-top" alt="gambar"> --}}
                        <div class="card-body" style="background: {{$game->warna}}">
                        <h3 class="card-title">Judul : {{$game->judul}}</h3>
                        <h5 class="card-subtitle mb-2 text-muted">Level : {{$game->level}}</h5>
                        @if ($game->required == NULL)
                        <h6 class="card-text text-dark text-capitalize">tidak ada persyaratan/required</h6>
                        @else
                        <h6 class="card-text">Required : Harus Kelar Level : {{$game->required}}</h6>
                        @endif
                        @if ($aktifbermain >= $game->required)
                        <a href="{{url('pemain/tebak-rintangan/'.$game->id)}}" class="btn btn-primary">Level : {{$game->id}}</a>
                        @else
                        <button class="btn btn-danger" disabled>
                            <a href="{{url('pemain/tebak-rintangan/'.$game->id)}}" class="text-white" style="text-decoration: none;">Maaf Poin Belum Mencukupi</a>
                        </button>
                        @endif
                        </div>
                    </div>
                </div>
                @endif
                @empty
                <div class="alert alert-danger text-capitalize">tidak ada rintangan game</div>
                @endforelse
            {{-- menu --}}
        <a href="{{url('/pemain/start')}}" class="btn btn-warning my-3 text-capitalize">back</a>
    </div>
@endsection
<script>
    // alert('test harusnya bisa')
    var seconds = {{$rintangangames->waktu}}; // waktu ini hitungan nya dari seconds
    function secondPassed(){
        var minutes = Math.round((seconds-30)/60),
        remainingSeconds = seconds % 60;

        if (remainingSeconds < 10) {
            remainingSeconds = "0" + remainingSeconds;
        }
        document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
        document.getElementById('waktu').value =  minutes + ":" + remainingSeconds;
        // var angka5 = 60 - remainingSeconds;
        // var angka4 = 5 - minutes;
        // if (angka5 < 10) {
        //     document.getElementById('waktu').value = angka4 +":"+ +"0"+ angka5;
        // }else{
        //     document.getElementById('waktu').value = angka4 +":"+ angka5;
        // }
        // alert(angka5)
        if (seconds == 0) {
            clearInterval(countdownTimer);
            document.getElementById("btnsubmit").disabled = true;
            document.getElementById("keteranganwaktu").style.display = 'block';
        } else {
            seconds--;
        }
    }
    var countdownTimer = setInterval('secondPassed()', 1000);
    function hurufbesarsemua(){
        // alert('testing')
        const huruf = document.getElementById("jawaban");
        huruf.value = huruf.value.toUpperCase();
    }
</script>