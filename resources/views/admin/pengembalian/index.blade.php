@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tabel Pengembalian</h1>
                    <br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{url('admin/pengembalian/pengembalianPDF')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                            <a href="{{url('admin/pengembalian/export')}}" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Peminjaman</th>
                                            <th>Nama Peminjam</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Buku Kembali</th>
                                            <th>Denda</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Peminjaman</th>
                                            <th>Nama Peminjam</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Buku Kembali</th>
                                            <th>Denda</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $no=1 @endphp
                                        @foreach ($pengembalian as $pengem)

                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$pengem->kode}}</td>
                                            <td>{{$pengem->nama_peminjam}}</td>
                                            <td>{{$pengem->judul_buku}}</td>
                                            <td>{{$pengem->tgl_peminjaman}}</td>
                                            <td>{{$pengem->tgl_pengembalian}}</td>
                                            <td>{{$pengem->status}}</td>
                                            <td>{{$pengem->buku_kembali}}</td>
                                            <td>{{$pengem->denda }}</td>
                                            <td>
                                                <!-- <a href="{{url('admin/peminjaman/edit/'.$pengem->id)}}" class="btn btn-sm btn-warning"><i
                                                        class="fas fa-edit"></i></a> -->
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{$pengem->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="exampleModal{{$pengem->id}}" tabindex="-1" role="dialog"
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
                                                                Apakah anda yakin akan menghapus data {{$pengem->nama}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="{{url('admin/pengembalian/delete/'.$pengem->id)}}"
                                                                    class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection