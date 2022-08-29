@extends('template.master')

@section('title','Edit Rintangan Game')

@section('judul','Edit Rintangan Game : '.$rintangangames->judul)

@section('content')
    <form action="{{url('admin/rintangangame/update/'.$rintangangames->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="images" class="form-label">Gambar</label>
            <input class="form-control @error('images') is-invalid @enderror" type="file" id="formFile" name="images">
            @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="text" name="level" id="level" class="form-control @error('level') is-invalid @enderror" value="{{$rintangangames->level}}">
            @error('level')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{$rintangangames->judul}}">
            @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jawaban" class="form-label">Jawaban</label>
            <input type="text" name="jawaban" id="jawaban" class="form-control @error('jawaban') is-invalid @enderror" value="{{$rintangangames->jawaban}}">
            @error('jawaban')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="waktu" class="form-label">waktu</label>
            <input type="number" name="waktu" id="waktu" class="form-control @error('waktu') is-invalid @enderror" value="{{$rintangangames->waktu}}">
            @error('waktu')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="emailHelp" class="form-text">waktu harus ditulis angka ya contoh 60 artinya itu 1 menit</div>
        </div>
        <div class="mb-3">
            <label for="required" class="form-label">required</label>
            <input type="number" name="required" id="required" class="form-control" value="{{$rintangangames->required}}">
            <div id="emailHelp" class="form-text">required harus ditulis angka ya</div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{url('admin/rintangangame')}}" class="btn btn-danger">Back</a>
    </form>
@endsection