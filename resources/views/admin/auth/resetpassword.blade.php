@extends('template.master')

@section('title','Reset Password')

@section('judul', 'Reset Password')

@section('content')
<form action="{{ url('admin/update/password') }}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="oldPasswordInput" class="form-label">Password Lama</label>
            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                placeholder="Old Password">
            @error('old_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="newPasswordInput" class="form-label">Password Baru</label>
            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                placeholder="New Password">
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password Baru</label>
            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
    </div>
    <button class="btn btn-success">Submit</button>
</form>
@endsection