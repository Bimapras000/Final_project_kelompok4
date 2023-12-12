@extends('tampiluser.layout.app')
@section('user')

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Peminjam</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Konfirmasi</th>




                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Peminjam</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Konfirmasi</th>

                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($peminjaman as $peminjaman)
                                    
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$peminjaman->kode}}</td>
                                            <td>{{$peminjaman->users}}</td>
                                            <td>{{$peminjaman->judul_buku}}</td>
                                            <td>{{$peminjaman->tgl_peminjaman}}</td>
                                            <td>{{$peminjaman->tgl_pengembalian}}</td>
                                            <td>{{$peminjaman->status}}</td>
                                            <td>{{$peminjaman->konfirmasi}}</td>
                                            
                                        </tr>
                                        
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection