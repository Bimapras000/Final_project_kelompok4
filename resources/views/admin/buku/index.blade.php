@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                          
                                            <th>Kode</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>ISBN</th>
                                            <th>Tahun Terbit</th>
                                            <th>Keterangan</th>
                                            <th>Foto</th>
                                            <th>Kategori ID</th>
                                            <th>Penerbit ID</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>                                          
                                            <th>Kode</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>ISBN</th>
                                            <th>Tahun Terbit</th>
                                            <th>Keterangan</th>
                                            <th>Foto</th>
                                            <th>Kategori ID</th>
                                            <th>Penerbit ID</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $no=1 @endphp
                                        @foreach ($buku as $buku)
                                       
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$buku->kode}}</td>
                                            <td>{{$buku->judulbuku}}</td>
                                            <td>{{$buku->penulis}}</td>
                                            <td>{{$buku->isbn}}</td>
                                            <td>{{$buku->th_terbit}}</td>
                                            <td>{{$buku->ket}}</td>
                                            <td>{{$buku->foto}}</td>
                                            <td>{{$buku->kategori_id}}</td>
                                            <td>{{$buku->penerbit_id}}</td>
                                            
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