@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{url('admin/peminjaman/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                          
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Peminjaman</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>ID Peminjaman</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>

                    </tr>
                </tfoot>
                <tbody>
                    @php $no=1 @endphp
                    @foreach ($data_peminjaman as $peminjaman)

                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$peminjaman->kode}}</td>
                        <td>{{$peminjaman->tgl_peminjaman}}</td>
                        <td>{{$peminjaman->tgl_pengembalian}}</td>
                        <td>{{$peminjaman->status_pinjaman}}</td>
                        <td>{{$peminjaman->nama_anggota}}</td>
                        <td>{{$peminjaman->judul_buku}}</td>

                        <td>
                            <a href="{{url('admin/peminjaman/edit/'.$buku->id)}}" class="btn btn-sm btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$peminjaman->id}}">
                                <i class="fas fa-trash"></i>
                            </button>

                            
                                                <div class="modal fade" id="exampleModal{{$peminjaman->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">    
                                                                Apakah anda yakin akan menghapus data {{$peminjaman->nama}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="{{url('admin/peminjaman/delete/'.$k->id)}}"
                                                                    class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>

@endsection