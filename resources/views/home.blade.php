@extends('layouts.app')

@section('judul', 'Home')

@section('content')
<div class="container">
    <h1 class="text-center text-capitalize">Halaman Home</h1>
    <p class="text-center text-capitalize">welcome to tebar (tebak gambar)</p>
    <div class="alert alert-success my-5">Welcome : {{Auth::user()->name}}</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <p>Assalamualaikum wr wb 
                    cara penggunaan
                    <br>
                    1.laptop/pc = silahkan klik menu play now untuk bermain
                    <br>
                    2.laptop/pc = jika ingin melihat hasil dari semua pemain silahkan ke menu result
                    <br>
                    3.laptop/pc = jika ingin melihat profil kalian silahkan ke menu profile 
                    <br>
                    4.mobile/tablet = silahkan klik menu di icon bars click play now untuk bermain
                    <br>
                    5.mobile/tablet = jika ingin melihat hasil dari semua pemain silahkan klik menu di icon bars click menu result
                    <br>
                    6.mobile/tablet = jika ingin melihat profil kalian silahkan klik menu di icon bars click menu profile 
                    <br>
                    <div class="alert alert-info text-capitalize my-2">terima kasih</div>
                </p>
                    {{-- <p>{{"You Role Is"}} : {{Auth::user()->role}}</p> --}}
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->role == 'admin')
        <a href="/admin" class="btn btn-info text-center text-capitalize my-3 w-100">go to dashboard</a>
    @endif
</div>
@endsection
