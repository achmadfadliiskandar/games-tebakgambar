@extends('layouts.app')

@section('judul','Tebak Rintangan')

@section('content')
    <div class="container">
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
            <div class="col-sm-6">
                <div class="card" style="width: 75%;">
                    <img src="{{asset('images/'.$rintangangames->images)}}" class="card-img-top" alt="gambar">
                    <div class="card-body">
                    <h3 class="card-title">Judul : {{$rintangangames->judul}}</h3>
                    <h5 class="card-text">Level : {{$rintangangames->level}}</h5>
                    <p class="card-text">Created at : {{$rintangangames->created_at}}</p>
                    @if ($rintangangames->required == null)
                    <p class="card-text text-danger text-capitalize">Required : tidak ada persyaratan</p>
                    @else
                    <p class="card-text">Required : Harus Kelar Level : {{$rintangangames->required}}</p>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h2>Silahkan Tebak Jawabanya</h2>
                <div class="timer alert alert-danger">
                    Waktu Dimulai Dari :
                    <time id="countdown"></time>
                    <strong id="keteranganwaktu" style="display: none; text-capitalize">waktunya sudah habis silahkan refresh</strong>
                </div>
            @if ($aktifbermain > $rintangangames->required)
            <form action="{{url('pemain/kirim/jawaban/coba/lagi')}}" method="POST" name="form" id="form">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Judul</label>
                    <select class="form-select" aria-label="Default select example" name="rintangan_games_id" id="rintangan_games_id">
                        <option value="{{$rintangangames->id}}" selected>{{$rintangangames->judul}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="text" readonly name="waktu_menjawab" id="waktu" class="form-control @error('waktu_menjawab') is-invalid @enderror" value="{{old('waktu_menjawab')}}">
                    @error('waktu_menjawab')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jawaban" class="form-label">Jawaban</label>
                    <input type="text" name="jawaban" id="jawaban" class="form-control @error('jawaban') is-invalid @enderror" value="{{old('jawaban')}}" oninput="hurufbesarsemua()">
                    @error('jawaban')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary my-3 w-100" id="btnsubmit">Submit</button>
            </form>
            @elseif($aktifbermain == $rintangangames->required)
            <form action="{{url('pemain/kirim/jawaban')}}" method="POST" name="form" id="form">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Judul</label>
                    <select class="form-select" aria-label="Default select example" name="rintangan_games_id" id="rintangan_games_id">
                        <option value="{{$rintangangames->id}}" selected>{{$rintangangames->judul}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="text" readonly name="waktu_menjawab" id="waktu" class="form-control @error('waktu_menjawab') is-invalid @enderror" value="{{old('waktu_menjawab')}}">
                    @error('waktu_menjawab')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jawaban" class="form-label">Jawaban</label>
                    <input type="text" name="jawaban" id="jawaban" class="form-control @error('jawaban') is-invalid @enderror" value="{{old('jawaban')}}" oninput="hurufbesarsemua()">
                    @error('jawaban')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if ($aktifbermain >= $rintangangames->required)
                <button type="submit" class="btn btn-primary my-3 w-100" id="btnsubmit">Submit</button>
                @else
                <button type="submit" disabled class="btn btn-primary my-3 w-100">Submit</button>
                @endif
            </form>
            @else
            <form action="{{url('pemain/kirim/jawaban')}}" method="POST" name="form" id="form">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Judul</label>
                    <select class="form-select" aria-label="Default select example" name="rintangan_games_id" id="rintangan_games_id" disabled>
                        <option value="{{$rintangangames->id}}" selected>{{$rintangangames->judul}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="text" readonly name="waktu_menjawab" id="waktu" class="form-control @error('waktu_menjawab') is-invalid @enderror" value="{{old('waktu_menjawab')}}" disabled>
                    @error('waktu_menjawab')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jawaban" class="form-label">Jawaban</label>
                    <input type="text" name="jawaban" id="jawaban" class="form-control @error('jawaban') is-invalid @enderror" value="{{old('jawaban')}}" disabled oninput="hurufbesarsemua()">
                    @error('jawaban')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if ($aktifbermain >= $rintangangames->required)
                <button type="submit" class="btn btn-primary my-3 w-100" id="btnsubmit">Submit</button>
                @else
                <button type="submit" disabled class="btn btn-primary my-3 w-100">Submit</button>
                @endif
            </form>
            @endif
            </div>
        </div>
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