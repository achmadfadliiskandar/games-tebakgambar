@extends('template.master')

@section('title','Rintangan Game')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('judul','Rintangan Game')

@section('content')
    <div class="table-responsive">
        <table class="table table-dark table table-bordered table table-striped" id="myTable">
            <thead>
                <tr>
                <th scope="col" class="text-danger">No</th>
                <th scope="col" class="text-danger">Waktu</th>
                {{-- <th scope="col" class="text-danger">Syarat</th> --}}
                <th scope="col" class="text-danger">Jawaban</th>
                <th scope="col" class="text-danger">Required</th>
                <th scope="col" class="text-danger">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rintangangames as $rintangangame)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$rintangangame->waktu}} : Menit</td>
                        {{-- <td>{{$rintangangame->required}}</td> --}}
                        <td>{{$rintangangame->jawaban}}</td>
                        <td>
                            @if ($rintangangame->required == null)
                                <span class="text-capitalize text-danger">tidak ada persyaratan</span>
                                @else
                                <span class="text-capitalize">Harus Kelar Level : {{$rintangangame->required}}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('admin/rintangangame/detail/'.$rintangangame->id)}}" class="btn btn-info text-capitalize">detail</a>
                            <a href="{{url('admin/rintangangame/edit/'.$rintangangame->id)}}" class="btn btn-success text-capitalize">edit</a>
                            <form action="{{url('admin/rintangangame/hapus/'.$rintangangame->id)}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger konfirmasihapus text-capitalize" type="submit">hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="6" class="text-danger text-center text-capitalize">rintangan belum ada</td>
                @endforelse
            </tbody>
            </table>
    </div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    });
    $('.konfirmasihapus').click(function(event){
        // alert('tes dlu') //bisa
        var form = $(this).closest("form");
        var nama = $(this).data("nama");
        event.preventDefault();
        swal({
            title: `Apa kamu yakin menghapus pesan ini?`,
            text: "kalau kamu hapus data ini tidak ada lagi",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete)=>{
            if (willDelete) {
                form.submit();
            }
            else{
                swal({
                    title: `selamat data tidak jadi dihapus`,
                    // text: "kalau kamu hapus data ini tidak ada lagi",
                    icon: "error",
                    timer: 1500
                })
            }
        });
    });
    </script>
@endpush