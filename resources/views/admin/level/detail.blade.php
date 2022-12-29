@extends('template.master')

@section('title','Detail Level Game')

@section('judul','Detail Level Game')

@section('content')
    <div class="container">
        {{-- <p>{{$levelgames->detailgames->rintangangames}}</p> --}}
        <h2>Judul :{{$levelgames->judul}}</h2>
        <p>Level : {{$levelgames->level}}</p>
        
        @forelse ($levelgames->detailgames as $item)

        <div class="alert alert-primary">Soal Ke : {{$loop->iteration}} {{$item->rintangangames->jawaban}}</div>
        @empty
        <div class="alert alert-danger">data kosong</div>
        @endforelse
        {{-- <div class="alert alert-danger mt-3 mb-3">{{$levelgamess}}  | {{$levelgames->batas}}</div> --}}
        @if ($levelgamess == $levelgames->batas)
            <p class="text-danger">sudah cukup anda tidak bisa menambahkan konten lagi</p>
        @elseif($levelgamesss >= $levelgames->batas)
            <p class="text-warning">tambahkan konten di level selanjutnya</p>
        @else
            <p class="text-info">masih ada kesempatan</p>
        @endif
        <a href="{{url('admin/levelgame')}}" class="btn btn-danger">Back</a>
    </div>
@endsection