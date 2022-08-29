<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TebarF2Game</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="icon" href="{{asset('logo.jpeg')}}">
</head>
<style>
html{
    scroll-behavior: smooth;
}
section {
padding-top: 5rem;
padding-bottom: 5rem;
}
footer{
    height: 120px;
}
#myBtn {
display: none;
position: fixed;
bottom: 20px;
right: 30px;
z-index: 99;
font-size: 18px;
border: none;
outline: none;
/* background-color: red; */
color: white;
cursor: pointer;
padding: 15px;
border-radius: 4px;
}
.active{
    border-bottom: 1px solid white;
    /* background: rebeccapurple; */
}
</style>
<body data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
<nav id="navbar-example2" class="navbar navbar-dark navbar-expand-lg bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('logo.jpeg')}}" alt="gambarlogo" width="30" height="24" class="d-inline-block align-text-top">
            TebarF2Game
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link " href="/#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#carabermain">Cara Bermain</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#contact">Contact</a>
            </li>
            @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Welcome ,{{Auth::user()->name}}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            </li>
                        @endif
                    @endauth
            @endif
        </ul>
        </div>
    </div>
    </nav>
    <!-- Jumbotron -->
    <header>
        <div class="container-fluid text-sm-center bg-dark text-white">
            <section id="home" class="home">
            <h1 class="display-2">TebarF2Game</h1>
            <p class="lead text-capitalize">game tebak gambar sederhana dibuat dengan laravel 9 dan boostrap 5</p>
            <a href="/home" class="btn btn-primary text-capitalize">play now</a>
            </section>
        </div>
    </header>
    <!-- End Jumbotron -->

    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <h2 class="text-center text-capitalize">about</h2>
            <p class="text-center text-capitalize">tentang permainan ini dibuat/tercipta</p>
            <div class="row">
                <div class="col-sm-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, repellendus placeat! Dolore voluptate nihil rem veritatis animi, ratione repellat in labore ex sequi ab obcaecati error eius nobis earum, commodi vero alias consequatur voluptatibus soluta? Autem officia hic eligendi perspiciatis repudiandae nulla ut quos quisquam pariatur neque quod sint impedit maiores maxime, minima, qui delectus non amet accusantium quae? Inventore rem consequatur provident doloremque, hic unde ipsam, facilis</div>
                <div class="col-sm-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto, odit unde ex aspernatur repellat excepturi labore exercitationem ipsa vel dicta blanditiis dolor doloremque fugit numquam adipisci quam deserunt necessitatibus corrupti sit aut magni iure dolore obcaecati rerum. Ut numquam, aut nam excepturi eligendi cumque, consectetur fugiat ullam repudiandae qui saepe pariatur veritatis unde quaerat neque eaque sit in nihil deserunt nulla a sunt atque odio et? Sunt corporis possimus commodi odio eveniet ex id rem.</div>
            </div>
        </div>
    </section>
    <!-- About -->

    <!-- backtotop -->
    <button class="btn btn-primary" id="myBtn" onclick="topFunction()">&uparrow;</button>
    <!-- backtotop -->

    <!-- How To Play -->
    <section id="carabermain" class="carabermain bg-light">
        <div class="container">
            <h2 class="text-center text-capitalize">cara bermain</h2>
            <p class="text-center text-capitalize">bagaimana cara memainkan permainan ini</p>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="width: 100%;">
                        <div class="card-header text-center">
                            Cara Bermain
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">1.Buka Website TebarF2Game</li>
                            <li class="list-group-item">2.Login / Register</li>
                            <li class="list-group-item">3.Silahkan Bermain</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How To Play -->

    <!-- contact -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="text-center text-capitalize">contact</h2>
            <p class="text-center text-capitalize">jika ada yang di tanyakan silahkan hubungi kontak di bawah ini</p>
            @if ($errors->any())
                <script>
                    alert('data gagal diterima')
                </script>
            @endif
            <form action="{{url('saran/tambah')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{old('alamat')}}">
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor HP</label>
                    <input type="nohp" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{old('nohp')}}">
                    @error('nohp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="komentar">Komentar</label>
                    <textarea class="form-control @error('komentar') is-invalid @enderror" id="komentar" name="komentar" rows="3">{{old('komentar')}}</textarea>
                    @error('komentar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    <!-- contact -->

    <!-- footer -->
    <footer class="bg-primary text-white">
        <p class="text-center pt-5 mt-3">Copyright &copy; <span id="tahun"></span> Achmad Fadli Iskandar - Muhammad Fadlan Iskandar</p>
    </footer>
    <!-- footer -->
    @include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<script>
// untuk mendapatkan tahun
const d = new Date();
let year = d.getFullYear();
document.getElementById("tahun").innerHTML = year;
// untuk mendapatkan tahun

// untuk mendapatkan fungsi back totop
var mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}
function topFunction() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}
// untuk mendapatkan fungsi back totop
</script>
</html>