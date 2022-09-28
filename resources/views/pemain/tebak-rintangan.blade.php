@extends('layouts.app')

@section('judul','Halaman Level-'.$levelgames->id)

@section('content')

    <div class="container">
        <h2 class="text-center text-capitalize">Level - {{$levelgames->level}}</h2>
        <div class="row">
            {{-- pointnya lebih --}}

            {{-- form lebih --}}

            {{-- menu --}}
            @forelse ($levelgames->detailgames as $item)

                <div class="col-md-4 my-3">
                    <div class="card" style="width: 100%;">
                        {{-- <img src="{{asset('images/'.$game->images)}}" class="card-img-top" alt="gambar"> --}}
                        <div class="card-body" style="background: {{$item->rintangangames->warna}}">
                            <h3 class="card-title text-capitalize">Soal {{$levelgames->level}} :  Bagian : {{$loop->iteration}}</h3>
                            <h4 class="card-subtitle mb-2 text-muted">Waktu Pengerjaan : {{$item->rintangangames->waktu}} Detik</h4>
                            @if ($item->rintangangames->required == null)
                                <p class="card-text text-danger text-capitalize">tidak ada persyaratan</p>
                            @else
                            <p class="card-text">Harus Kelar Soal Level 1 Bagian : {{$item->rintangangames->required}}</p>
                            @endif
                            @if ($aktifbermain >= $item->rintangangames->required)
                            <a href="{{url('pemain/answer/jawab/'.$item->rintangangames->id)}}" class="btn btn-primary">Level : {{$loop->iteration}}</a>
                            @else
                            <button class="btn btn-danger" disabled>
                                <a href="{{url('pemain/answer/jawab/'.$item->rintangangames->id)}}" class="text-white" style="text-decoration: none;">Maaf Poin Belum Mencukupi</a>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>

                @empty
                <div class="alert alert-danger text-capitalize">tidak ada rintangan game dibagian ini</div>
                @endforelse
            {{-- menu --}}
        <a href="{{url('/pemain/start')}}" class="btn btn-warning my-3 text-capitalize">back</a>
    </div>
@endsection
{{-- <script>
    // alert('test harusnya bisa')
    var seconds = {{$rintangangames->waktu}}; // waktu ini hitungan nya dari seconds
    function secondPassed(){
        var minutes = Math.round((seconds-30)/60),
        remainingSeconds = seconds % 60;

        if (remainingSeconds < 10) {
            remainingSeconds = "0" + remainingSeconds;
        }
        document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
        document.getElementById('waktu').value =  minutes + ":" + remainingSeconds;
        // var angka5 = 60 - remainingSeconds;
        // var angka4 = 5 - minutes;
        // if (angka5 < 10) {
        //     document.getElementById('waktu').value = angka4 +":"+ +"0"+ angka5;
        // }else{
        //     document.getElementById('waktu').value = angka4 +":"+ angka5;
        // }
        // alert(angka5)
        if (seconds == 0) {
            clearInterval(countdownTimer);
            document.getElementById("btnsubmit").disabled = true;
            document.getElementById("keteranganwaktu").style.display = 'block';
        } else {
            seconds--;
        }
    }
    var countdownTimer = setInterval('secondPassed()', 1000);
    function hurufbesarsemua(){
        // alert('testing')
        const huruf = document.getElementById("jawaban");
        huruf.value = huruf.value.toUpperCase();
    }
</script> --}}