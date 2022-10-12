@extends('template.master')

@section('title','Tambah Kelompok Game')

@section('judul','Tambah Kelompok Game')

@section('content')
    <div class="container">
        <form action="{{url('/admin/groupgame/store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="level_games_id" class="form-label">Rintangan Game</label>
            <select class="form-select form-control @error('level_games_id') is-invalid @enderror" id="level_games_id" name="level_games_id">
                <option value="">Silahkan Pilih Level</option>
                @foreach ($levelgamesss as $level)
                    <option value="{{$level->id}}" {{old('level_games_id') == $level->id ? 'selected':null}}>{{$loop->iteration}} {{$level->level}}</option>
                @endforeach
            </select>
            @error('level_games_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rintangan_games_id" class="form-label">Rintangan Game</label>
            <select class="form-select form-control @error('rintangan_games_id') is-invalid @enderror" id="rintangan_games_id" name="rintangan_games_id">
                <option value="">Silahkan Pilih Jawaban Game</option>
                @foreach ($rintangangamessss as $item)
                    <option value="{{$item->id}}" {{old('rintangan_games_id') == $item->id ? 'selected':null}}>{{$loop->iteration}} {{$item->jawaban}}</option>
                @endforeach
            </select>
            @error('rintangan_games_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary text-capitalize">submit</button>
        </form>
    </div>
@endsection