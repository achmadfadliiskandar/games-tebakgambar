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
        {{-- <div class="mb-3">
            <label for="rintangan_games_id" class="form-label">Rintangan Game</label>
            <select class="form-select form-control @error('rintangan_games_id') is-invalid @enderror" id="rintangan_games_id" name="rintangan_games_id">
                <option value="">Silahkan Pilih Jawaban Game</option>
                @foreach ($rintangangamessss as $item)
                    <option value="{{$item->id}}" {{old('rintangan_games_id') == $item->id ? 'selected':null}}>{{$item->jawaban}}</option>
                @endforeach
            </select>
            @error('rintangan_games_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{url('/admin/levelgame')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection