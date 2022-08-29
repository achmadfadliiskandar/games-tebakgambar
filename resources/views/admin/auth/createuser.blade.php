@extends('template.master')

@section('title','Tambah User')

@section('judul', 'Tambah User')

@section('content')
<form action="{{url('admin/tambah/user')}}" method="POST">
    @csrf
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select name="role" id="role" class="form-select form-control">
        {{-- <option value="admin">Admin</option> --}}
        <option value="pemain">Pemain</option>
    </select>
</div>
<div class="mb-3">
    <label for="password" class="form-label">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection