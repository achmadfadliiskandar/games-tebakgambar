@extends('template.master')

@section('title','Detail Level Game')

@section('judul','Detail Level Game')

@section('content')
    <div class="container">
        {{-- <p>{{$levelgames->detailgames->rintangangames}}</p> --}}
        <h2>Judul :{{$levelgames->judul}}</h2>
        <p>Level : {{$levelgames->level}}</p>
        <p>Batas Isi Level : {{$levelgames->batas}}</p>
        {{-- {{$levelgamess}} --}}
        @if ($levelgamess == $levelgames->awal_level)
            <p class="text-danger text-capitalize">Keterangan : anda bisa menambahkan level</p>
        @elseif($levelgames->awal_level == null)
        <p class="text-danger text-capitalize">ini level nggak ada batasnya</p>
        @else
            <p class="text-capitalize">Keterangan : anda tidak bisa menambahkan level</p>
        @endif
        @if ($levelgamess <= $levelgames->awal_level)
            <p class="text-capitalize text-danger">Anda Belum Bisa mendirikan Isi Konten Level</p>
        @else
            <p class="text-info text-capitalize">Silahkan Mendirikan Level</p>
        @endif
        @forelse ($levelgames->detailgames as $item)

        <div class="alert alert-primary">Soal Ke : {{$loop->iteration}} {{$item->rintangangames->jawaban}}</div>
        @empty
        <div class="alert alert-danger">data kosong</div>
        @endforelse
        <a href="{{url('admin/levelgame')}}" class="btn btn-danger">Back</a>
    </div>
@endsection