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

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo dolorem sapiente illum. Sapiente quibusdam, aperiam nostrum et consequuntur nisi illum incidunt ratione aliquid iure quisquam laboriosam similique eveniet minima eos consectetur molestias aspernatur eum ut? Non maxime sequi vero qui aperiam odio voluptatem, culpa hic veritatis id nostrum, sunt dignissimos. Illo, distinctio sapiente eos, tempore nam laboriosam et voluptatem reiciendis aliquam dolores magnam tenetur quos repellat odio minima, a eligendi in quibusdam! Aperiam, minima sunt.</p>
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
