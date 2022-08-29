@extends('template.master')

@section('title','Halaman Saran')

@section('judul','Halaman Saran')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="table-responsive">
<table class="table table-dark table table-bordered table table-striped" id="myTable">
<thead>
    <tr>
    <th scope="col" class="text-danger">No</th>
    <th scope="col" class="text-danger">Nama</th>
    <th scope="col" class="text-danger">Alamat</th>
    <th scope="col" class="text-danger">No Hp</th>
    <th scope="col" class="text-danger">Email</th>
    <th scope="col" class="text-danger">Komentar</th>
    <th scope="col" class="text-danger">Action</th>
    </tr>
</thead>
<tbody>
    @forelse ($sarans as $saran)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$saran->nama}}</td>
            <td>{{$saran->alamat}}</td>
            <td>{{$saran->nohp}}</td>
            <td>{{$saran->email}}</td>
            <td>{{$saran->komentar}}</td>
            <td>
                <form action="{{url('admin/saran/hapus/'.$saran->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger text-capitalize konfirmasihapus" type="submit" data-toggle='tooltip'>hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <td colspan="7" class="text-danger text-center text-capitalize">data kosong</td>
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