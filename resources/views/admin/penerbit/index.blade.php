@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tabel Penerbit</h1><br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <a href="{{url('admin/penerbit/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerbit</th>
                                            <th>Action</th>




                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerbit</th>
                                            <th>Action</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($penerbit as $p)
                                    
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$p->nama}}</td>
                                            
                                            <td>
                                                <a href="{{url('admin/penerbit/edit/'.$p->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <!-- <a href="{{url('admin/penerbit/destroy/' .$p->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"><i class="fas fa-trash"></i></a> -->
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{$p->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                
                                                <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog"
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
                                                                Apakah anda yakin akan menghapus data {{$p->nama}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="{{url('admin/penerbit/delete/'.$p->id)}}"
                                                                    class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Create-->
                                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                    <form method="POST" action="{{url('admin/penerbit/store')}}" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Penerbit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="text" class="col-4 col-form-label">Nama Penerbit</label> 
                                                            <div class="col-8">
                                                            <input id="text" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" >
                                                            @error('nama')
                                                                    <div class="invalid-feedback">
                                                                        {{$message}}
                                                                    </div>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        </form>
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