@extends('admin.layout.appadmin')
@section('content')

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('admin/buku/import')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          {{csrf_field()}}
          <input type="file" name="file" >

        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div> -->
<!-- batas modal -->

<h1 class="h3 mb-2 text-gray-800">Tabel Buku</h1><br>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <a href="{{url('admin/buku/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i></a>
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
                                                class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Create-->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                <form method="POST" action="{{url('admin/buku/store')}}" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Buku</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group row">
                                            <label for="text" class="col-4 col-form-label">Kode</label> 
                                            <div class="col-8">
                                            <input id="text" name="kode" type="text" class="form-control @error('kode') is-invalid @enderror" >
                                            @error('kode')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text1" class="col-4 col-form-label">Judul Buku</label> 
                                            <div class="col-8">
                                            <input id="text1" name="judulbuku" type="text" class="form-control @error('judulbuku') is-invalid @enderror">
                                            @error('judulbuku')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text2" class="col-4 col-form-label">Penulis</label> 
                                            <div class="col-8">
                                            <input id="text2" name="penulis" type="text" class="form-control @error('penulis') is-invalid @enderror">
                                            @error('penulis')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text3" class="col-4 col-form-label">ISBN</label> 
                                            <div class="col-8">
                                            <input id="text3" name="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror">
                                            @error('isbn')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text4" class="col-4 col-form-label">Tahun Terbit</label> 
                                            <div class="col-8">
                                            <input id="text4" name="th_terbit" type="text" class="form-control @error('th_terbit') is-invalid @enderror">
                                            @error('th_terbit')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                            <label for="textarea" class="col-4 col-form-label">Keterangan</label> 
                                            <div class="col-8">
                                                <textarea id="textarea" name="ket" cols="40" rows="5" class="form-control @error('ket') is-invalid @enderror"></textarea>
                                                @error('ket')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                            </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="text4" class="col-4 col-form-label">Foto</label> 
                                            <div class="col-8">
                                            <input id="text4" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror">
                                            @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="select" class="col-4 col-form-label">Kategori</label> 
                                            <div class="col-8">
                                            <select id="select" name="kategori_id" class="custom-select @error('kategori_id') is-invalid @enderror">
                                                @foreach ($kategori as $k)
                                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                            <div class="invalid-feedback">
                                            {{$message}}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="select" class="col-4 col-form-label">Penerbit</label> 
                                            <div class="col-8">
                                            <select id="select" name="penerbit_id" class="custom-select @error('penerbit_id') is-invalid @enderror">
                                                @foreach ($penerbit as $p)
                                                <option value="{{$p->id}}">{{$p->nama}}</option>
                                                @endforeach
                                            </select>
                                            @error('penerbit_id')
                                            <div class="invalid-feedback">
                                            {{$message}}
                                            </div>
                                            @enderror
                                            </div>
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
<!-- /.container-fluid -->

</div>

@endsection