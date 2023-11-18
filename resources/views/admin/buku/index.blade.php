@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
        DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{url('admin/buku/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        <a href="{{url('admin/buku/bukuPDF')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
        <a href="{{url('admin/buku/export')}}" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Kode</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>ISBN</th>
                        <th>Tahun Terbit</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Kode</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>ISBN</th>
                        <th>Tahun Terbit</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $no=1 @endphp
                    @foreach ($buku as $buku)

                    <tr>
                        <td>{{$no++}}</td>
                        <td><img src="{{ asset('admin/img/' . $buku->foto) }}" alt="Nama Gambar" style="width: 100px; height: 100px;"></td>
                        <td>{{$buku->kode}}</td>
                        <td>{{$buku->judulbuku}}</td>
                        <td>{{$buku->penulis}}</td>
                        <td>{{$buku->isbn}}</td>
                        <td>{{$buku->th_terbit}}</td>
                        <td>{{$buku->kategori}}</td>
                        <td>{{$buku->penerbit}}</td>
                        <td>
                            <a href="{{url('admin/buku/show/'.$buku->id)}}" class="btn btn-sm btn-info"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{url('admin/buku/edit/'.$buku->id)}}" class="btn btn-sm btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{url('admin/buku/pdfshow/'.$buku->id)}}" class="btn btn-sm btn-warning"><i
                                    class="fas fa-file-pdf"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$buku->id}}">
                                <i class="fas fa-trash"></i>
                            </button>

                            
                            <div class="modal fade" id="exampleModal{{$buku->id}}" tabindex="-1" role="dialog"
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
                                            Apakah anda yakin akan menghapus data {{$buku->judulbuku}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-dismiss="modal">Close</button>
                                            <a href="{{url('admin/buku/delete/'.$buku->id)}}"
                                                class="btn btn-danger" data-confirm-delete="true">Save changes</a>
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