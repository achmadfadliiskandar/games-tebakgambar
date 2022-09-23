@extends('template.master')

@section('title','Kelompok Game')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('judul','Kelompok Game')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-dark table table-bordered table table-striped" id="myTable">
                <thead>
                    <tr>
                    <th scope="col" class="text-danger">No</th>
                    <th scope="col" class="text-danger">Level</th>
                    <th scope="col" class="text-danger">Soal</th>
                    <th scope="col" class="text-danger">Pembuat</th>
                    <th scope="col" class="text-danger">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelompokgames as $kelompokgame)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kelompokgame->levelgames->level}}</td>
                        <td>{{$kelompokgame->levelgames->judul}}</td>
                        <td>{{$kelompokgame->user->name}}</td>
                        <td>
                            <a href="{{url('admin/groupgame/edit/'.$kelompokgame->id)}}" class="btn btn-success text-capitalize">edit</a>
                            <form action="{{url('admin/groupgame/hapus/'.$kelompokgame->id)}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger konfirmasihapus text-capitalize" type="submit">hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="text-danger text-center text-capitalize">Data Kelompok Kosong</td>
                @endforelse
                </tbody>
                </table>
        </div>
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
            }else{
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