@extends('template.master')

@section('title','Level Game Tambah')

@section('judul','Level Game Tambah')

@section('content')
    <div class="container">
        <form action="{{url('/admin/levelgame/update/'.$levelgames->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="text" class="form-control @error('level') is-invalid @enderror" id="level" name="level" value="{{$levelgames->level}}">
            @error('level')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{$levelgames->judul}}">
            @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="batas" class="form-label">Batas</label>
            <input type="text" class="form-control @error('batas') is-invalid @enderror" id="batas" name="batas" value="{{$levelgames->batas}}">
            @error('batas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{$levelgames->url}}">
            @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('/admin/levelgame')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection