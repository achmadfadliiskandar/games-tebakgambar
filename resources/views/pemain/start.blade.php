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
                        {{-- <img src="{{asset('images/'.$game->images)}}" class="card-img-top" alt="gambar"> --}}
                        <div class="card-body" style="background: {{$game->warna}}">
                        <h3 class="card-title">Judul : {{$game->judul}}</h3>
                        <h5 class="card-subtitle mb-2 text-muted">Level : {{$game->level}}</h5>
                        @if ($game->required == NULL)
                        <h6 class="card-text text-dark text-capitalize">tidak ada persyaratan/required</h6>
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
            @if (empty($getdataterakhir))
                {{-- <div class="alert alert-danger my-3">gamenya nggak ada datanya</div> --}}
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                    <h5 class="card-title">Pengumuman</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-capitalize">mohon maaf atas ketidaknyamananya</h6>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam quo, quam blanditiis voluptas repellendus labore commodi, nisi possimus incidunt voluptatem cum eum quis. Veniam quos cum vitae minus? Beatae, adipisci enim temporibus quod, excepturi sit minima possimus, nulla accusantium a vel quae nihil eligendi reprehenderit magni recusandae tenetur doloribus laboriosam autem numquam totam at vitae illo. Fuga, cumque modi voluptatum quaerat quo at deserunt nobis inventore qui cupiditate hic, odit id eius illo fugit quidem eum enim accusamus perferendis quam nulla dolore? Doloremque dolore eaque adipisci similique, porro necessitatibus hic numquam quaerat consequuntur iure excepturi illo nesciunt deserunt expedita incidunt odio earum tempore distinctio assumenda voluptas temporibus! Eos delectus, reprehenderit recusandae tempore quibusdam accusamus aliquid aliquam ab omnis ducimus voluptatum.</p>
                    </div>
                </div>
            @else
            @if ($aktifbermain == $getdataterakhir)
            <div class="alert alert-success my-3">Selamat Anda Berhasil Menamatkan Games Ini</div>
            @else
            <div class="alert alert-info my-3">Selamat Bermain Sampai Tamat</div>
            @endif
            @endif
    </div>
@endsection