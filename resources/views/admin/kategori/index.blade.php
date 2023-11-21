@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{url('admin/kategori/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            <a href="{{url('admin/kategori/kategoriPDF')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            




                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            


                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($kategori as $k)
                                    
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$k->nama}}</td>
                                            
                                            <td>
                                                <a href="{{url('admin/kategori/edit/'.$k->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <!-- <a href="{{url('admin/kategori/destroy/' .$k->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"><i class="fas fa-trash"></i></a> -->
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{$k->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                
                                                <div class="modal fade" id="exampleModal{{$k->id}}" tabindex="-1" role="dialog"
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
                                                                Apakah anda yakin akan menghapus data {{$k->nama}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="{{url('admin/kategori/delete/'.$k->id)}}"
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



@endsection