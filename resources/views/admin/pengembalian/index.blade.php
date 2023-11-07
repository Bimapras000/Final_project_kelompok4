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
                                            <th>id</th>
                                            <th>tgl_pengembalian</th>
                                            <th>denda</th>
                                            <th>peminjaman_id</th>
                                            <th>petugas_id</th>



                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>tgl_pengembalian</th>
                                            <th>denda</th>
                                            <th>peminjaman_id</th>
                                            <th>petugas_id</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($pengembalian as $p)
                                    
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$p->tgl_pengembalian}}</td>
                                            <td>{{$p->denda}}</td>
                                            <td>{{$p->peminjaman_id}}</td>
                                            <td>{{$p->petugas_id}}</td>
                                            
                                        </tr>
                                        
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection