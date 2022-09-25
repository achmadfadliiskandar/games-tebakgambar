@extends('layouts.app')

@section('judul','Hasil Permainan')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <div class="container">
        <h1 class="text-center text-capitalize">Data Pemain </h1>
        <p class="text-capitalize text-center">semua data pemain yang bermain ada di sini</p>
        <div class="row my-4">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Jumlah Semua Pemain</h3>
                        <p class="card-text">{{$seluruhpemain}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Pemain Tercepat</h3>
                        <p class="card-text">{{$playgamesfast}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Pemain Terlama</h3>
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
            @foreach ($playgames as $playgame)
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