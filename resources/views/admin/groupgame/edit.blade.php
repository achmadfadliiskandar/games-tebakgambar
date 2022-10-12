@extends('template.master')

@section('title','Edit Kelompok Game')

@section('judul','Edit Kelompok Game')

@section('content')
    <div class="container">
        <form action="{{url('/admin/groupgame/update/'.$detaildata->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="level_games_id" class="form-label">Rintangan Game</label>
            <select class="form-select form-control @error('level_games_id') is-invalid @enderror" id="level_games_id" name="level_games_id">
                {{-- <option value="">Silahkan Pilih Level</option> --}}
                <option selected value="{{$detaildata->level_games_id}}">{{$detaildata->levelgames->level}}(level lama)</option>
                @foreach ($levelgamesss as $level)
                    <option value="{{$level->id}}" {{old('level_games_id') == $level->id ? 'selected':null}}>{{$level->level}}</option>
                @endforeach
            </select>
            @error('level_games_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rintangan_games_id" class="form-label">Rintangan Game</label>
            <select class="form-select form-control @error('rintangan_games_id') is-invalid @enderror" id="rintangan_games_id" name="rintangan_games_id">
                {{-- <option value="">Silahkan Pilih Jawaban Game</option> --}}
                <option selected value="{{$detaildata->rintangan_games_id}}">{{$detaildata->rintangangames->jawaban}}(jawaban lama)</option>
                @foreach ($rintangangamessss as $item)
                    <option value="{{$item->id}}" {{old('rintangan_games_id') == $item->id ? 'selected':null}}>{{$item->jawaban}}</option>
                @endforeach
            </select>
            @error('rintangan_games_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary text-capitalize">submit</button>
        <a href="{{url('admin/groupgame')}}" class="btn btn-danger text-capitalize">back</a>
        </form>
    </div>
@endsection