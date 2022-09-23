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
        <a href="{{url('admin/levelgame')}}" class="btn btn-danger">Back</a>
    </div>
@endsection