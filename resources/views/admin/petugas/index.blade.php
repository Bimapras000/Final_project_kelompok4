@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tabel Petugas</h1><br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <a href="{{url('admin/petugas/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal"><i class="fas fa-plus"></i></a>
                            <a href="{{url('admin/petugas/petugasPDF')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Tanggal Bergabung</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Tanggal Bergabung</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($petugas as $petugas)
                                    @if($petugas->role === 'petugas' || $petugas->role === 'admin')
                                    <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$petugas->name}}</td>
                                            <td>{{$petugas->alamat}}</td>
                                            <td>{{$petugas->no_tlp}}</td>
                                            <td>{{$petugas->tgl_bergabung}}</td>
                                            <td>{{$petugas->email}}</td>
                                            <td>{{$petugas->role}}</td>
                                            <td>
                                                
                                            <a href="{{url('admin/petugas/edit/'.$petugas->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            
                                            <!-- Button trigger modal -->
                                            <button type="button"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$petugas->id}}">
                                            <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$petugas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data {{$petugas->name}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{url('admin/petugas/delete/'.$petugas->id)}}" type="button" class="btn btn-danger">Delete</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            </td>
                                            
                                        </tr>
                                        @endif
                                        
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <form action="{{url('admin/petugas/store')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama :</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="recipient-name" >
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Alamat :</label>
                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="recipient-name" >
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nomor Telepon :</label>
                                    <input type="text" name="no_tlp" class="form-control @error('no_tlp') is-invalid @enderror" id="recipient-name" >
                                    @error('no_tlp')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tanggal Bergabung :</label>
                                    <input type="date" name="tgl_bergabung" class="form-control @error('tgl_bergabung') is-invalid @enderror" id="recipient-name"  >
                                    @error('tgl_bergabung')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Email :</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="recipient-name" >
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Password :</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="recipient-name" >
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Sumbit</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    



@endsection