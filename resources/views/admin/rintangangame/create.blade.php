@extends('template.master')

@section('title','Tambah Rintangan Game')

@section('judul','Tambah Rintangan Game')

@section('content')
    <form action="{{url('admin/rintangangame/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="images" class="form-label">Gambar</label>
            <input class="form-control @error('images') is-invalid @enderror" type="file" id="formFile" name="images">
            @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="text" name="level" id="level" class="form-control @error('level') is-invalid @enderror" value="{{old('level')}}">
            @error('level')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}">
            @error('judul')
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
        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="number" name="waktu" id="waktu" class="form-control @error('waktu') is-invalid @enderror" value="{{old('waktu')}}">
            @error('waktu')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="emailHelp" class="form-text">waktu harus ditulis angka ya contoh 60 artinya itu 1 menit</div>
        </div>
        <div class="mb-3">
            <label for="warna" class="form-label">warna</label>
            <input type="color" name="warna" id="warna" class="form-control @error('warna') is-invalid @enderror form-control-color" value="{{old('warna')}}">
            @error('warna')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="emailHelp" class="form-text">warna dipilih dengan rgb contoh #000 berarti itu warna hitam</div>
        </div>
        @if ($rintangangamesjmlh >= 1)
        <div class="mb-3">
            <label for="required" class="form-label">required</label>
            <input type="number" name="required" id="required" class="form-control" value="{{$rintangangamesjmlh}}" readonly>
            <div id="emailHelp" class="form-text">required harus ditulis angka ya</div>
        </div>
        @else
        <div class="mb-3">
            <label for="required" class="form-label">required</label>
            <div class="alert alert-danger">required nggak usah di isi</div>
            {{-- <input type="number" name="required" id="required" class="form-control" value="{{$rintangangamesjmlh}}"> --}}
            {{-- <div id="emailHelp" class="form-text">required harus ditulis angka ya</div> --}}
        </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

<script>
    function hurufbesarsemua(){
        // alert('testing')
        const huruf = document.getElementById("jawaban");
        huruf.value = huruf.value.toUpperCase();
    }
</script>