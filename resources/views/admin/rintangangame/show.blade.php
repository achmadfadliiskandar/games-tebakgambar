@extends('template.master')

@section('title','Detail Rintangan Game')

@section('judul','Detail Rintangan Game')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h2>Gambar</h2>
            <img src="{{asset('images/'.$rintangangames->images)}}" alt="gambar" class="rounded" style="width: 60%;">
        </div>
        <div class="col-sm-6">
            <h2>Judul : </h2>
            <p>{{$rintangangames->judul}}</p>
            <h2>Level : </h2>
            <p>{{$rintangangames->level}}</p>
            <h2>Jawaban : </h2>
            <p>{{$rintangangames->jawaban}}</p>
            <h2>Required</h2>
            @if ($rintangangames->required == null)
            <p class="text-capitalize text-danger">tidak ada persyaratan</p>
            @else
            <p class="text-capitalize">Harus Kelar Level : {{$rintangangames->required}}</p>
            @endif
        </div>
        <div class="col-sm-12 my-3">
            <h2>Pembuat Rintangan Game : {{$rintangangames->user->name}}</h2>
            <p>Dibuat Pada : {{$rintangangames->created_at}}</p>
            <a href="{{url('admin/rintangangame')}}" class="text-capitalize btn btn-danger">back</a>
        </div>
    </div>
@endsection