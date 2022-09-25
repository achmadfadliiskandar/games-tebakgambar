@extends('layouts.app')

@section('judul','Data Profile')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<div class="container">
    <h1 class="text-center text-capitalize">Data Pemain : {{Auth::user()->name}}</h1>
    <p class="text-capitalize text-center">data pemain khusus {{Auth::user()->name}} dan role {{Auth::user()->role}}</p>
    <div class="row">
        <div class="col-sm-6">
            <h3>Ubah Data Diri</h3>
            <form action="{{ url('pemain/update/data/diri/'.$getuserlogin) }}" method="POST">
                @csrf
                @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Old Password" value="{{Auth::user()->name}}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="New Password" value="{{Auth::user()->email}}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select form-control">
                            <option value="{{Auth::user()->role}}" selected>{{Auth::user()->role}}</option>
                        </select>
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="col-sm-6">
            <h3>Ubah Password</h3>
            <form action="{{ url('pemain/update/password') }}" method="POST">
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
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Jumlah Anda Bermain</h3>
                    <p class="card-text">{{$aktifbermain}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Bermain Tercepat Anda</h3>
                    <p class="card-text">{{$playgamesfast}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Bermain Terlama Anda</h3>
                    <p class="card-text">{{$playgamesslow}}</p>
                </div>
            </div>
        </div>
    </div>
    <table id="example" class="table table-striped table table-bordered" style="width:100%">
    <thead class="bg-primary">
        <tr>
            <th>No</th>
            {{-- <th>Judul</th>
            <th>Level</th> --}}
            <th>Waktu</th>
            <th>Pemain</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($playerplay as $playgame)
        <tr>
            <td>{{$loop->iteration}}</td>
            {{-- <td>{{$playgame->rintangangames->judul}}</td>
            <td>{{$playgame->rintangangames->level}}</td> --}}
            <td>{{$playgame->waktu_menjawab}}</td>
            <td>{{$playgame->user->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="alert alert-info my-3">Poin Anda : {{$aktifbermain}}</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}
<script>
$(document).ready( function () {
$('#example').DataTable();
});
</script>