<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>@yield('title')</title>

<!-- Icon -->
<link rel="icon" href="{{asset('logo.jpeg')}}">

<!-- General CSS Files -->
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/modules/fontawesome/css/all.min.css')}}">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/modules/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('stisla-stisla-db12ded/dist/assets/css/components.css')}}">

@yield('css')
<body>
<div id="app">
<div class="main-wrapper main-wrapper-1">
    <!-- navbar -->
    @include('template.navbar')
    <div class="main-sidebar sidebar-style-2">
        <!-- sidebar -->
    @include('template.sidebar')
        <!-- end sidebar -->
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- content -->
    <section class="section">
        <div class="section-header">
            <h1>@yield('judul')</h1>
        </div>
        @yield('content')
        </div>
    </section>
        <!-- end content -->
    </div>
    <!-- footer -->
    @include('template.footer')
    <!-- end footer -->
</div>
</div>

<!-- General JS Scripts -->
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/popper.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/chart.min.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('stisla-stisla-db12ded/dist/assets/js/page/index.js')}}"></script>

<!-- Template JS File -->
<script src="{{asset('stisla-stisla-db12ded/dist/assets/js/scripts.js')}}"></script>
<script src="{{asset('stisla-stisla-db12ded/dist/assets/js/custom.js')}}"></script>


@stack('script')
@include('sweetalert::alert')
</body>
<script>
    const d = new Date();
let year = d.getFullYear();
document.getElementById("tahun").innerHTML = year;
</script>
</html>