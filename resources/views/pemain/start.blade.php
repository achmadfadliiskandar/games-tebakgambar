@extends('layouts.app')

@section('judul','Play Now')

@section('content')
    <div class="container">
        <h1 class="text-center text-capitalize">Selamat Bermain : {{Auth::user()->name}}</h1>
        <p class="text-capitalize text-center">semoga sukses mendapatkan point</p>
            <div class="row">
                @forelse ($rintangangamess as $game)
                <div class="col-md-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{asset('images/'.$game->images)}}" class="card-img-top" alt="gambar">
                        <div class="card-body">
                        <h3 class="card-title">Judul : {{$game->judul}}</h3>
                        <h5 class="card-subtitle mb-2 text-muted">Level : {{$game->level}}</h5>
                        @if ($game->required == NULL)
                        <h6 class="card-text text-danger text-capitalize">tidak ada persyaratan/required</h6>
                        @else
                        <h6 class="card-text">Required : Harus Kelar Level : {{$game->required}}</h6>
                        @endif
                        {{-- <div class="alert alert-info my-3">Jumlah Anda Bermain : {{$aktifbermain}}</div> --}}
                        @if ($aktifbermain >= $game->required)
                        <a href="{{url('pemain/tebak-rintangan/'.$game->id)}}" class="btn btn-primary">Silahkan Menebak</a>
                        @else
                        <button class="btn btn-danger" disabled>
                            <a href="{{url('pemain/tebak-rintangan/'.$game->id)}}" class="text-white" style="text-decoration: none;">Maaf Poin Belum Mencukupi</a>
                        </button>
                        @endif
                        {{-- <a href="{{url('pemain/tebak-rintangan/'.$game->id)}}" class="btn btn-primary">Silahkan Menebak</a> --}}
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger text-capitalize">tidak ada rintangan game</div>
                @endforelse
            </div>
            @if ($aktifbermain >= $getdataterakhir)
                <div class="alert alert-success my-3">Selamat Anda Berhasil Menamatkan Games Ini</div>
            @else
                <div class="alert alert-info my-3">Selamat Bermain Sampai Tamat</div>
            @endif
    </div>
@endsection