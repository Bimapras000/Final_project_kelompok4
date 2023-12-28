@extends('admin.layout.appadmin')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Tabel Peminjaman</h1>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i></a> -->
                             <!-- class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i></a> -->
                             <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Modalcreate"><i class="fas fa-plus"></i></a>
                             <a href="{{url('admin/peminjaman/peminjamanPDF')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                            <a href="{{url('admin/peminjaman/export')}}" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
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
                        <th>Konfirmasi</th>
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
                        <th>Konfirmasi</th>
                        <th>Denda</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>
                    @php $no=1 @endphp
                    @foreach ($peminjaman as $peminjaman)

                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$peminjaman->kode}}</td>
                        <td>{{$peminjaman->nama_peminjam}}</td>
                        <td>{{$peminjaman->judul_buku}}</td>
                        <td>{{$peminjaman->tgl_peminjaman}}</td>
                        <td>{{$peminjaman->tgl_pengembalian}}</td>
                        <td>{{$peminjaman->status}}</td>
                        <td>{{$peminjaman->konfirmasi}}</td>
                        <td>{{$peminjaman->denda }}</td>

                        <td>
                            <a href="{{url('admin/peminjaman/edit/'.$peminjaman->id)}}" class="btn btn-sm btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$peminjaman->id}}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal Delete -->
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
                                            Apakah anda yakin akan menghapus data {{$peminjaman->name}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-dismiss="modal">Close</button>
                                            <a href="{{url('admin/peminjaman/delete/'.$peminjaman->id)}}"
                                                class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Create -->
                            <div class="modal fade" id="Modalcreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <form action="{{url('admin/peminjaman/store')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Peminjaman Baru</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Kode :</label>
                                    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="recipient-name" >
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="select1" class="col-form-label">Judul Buku :</label>
                                    <!-- <input type="text" name="judul_buku" class="form-control @error('judul_buku') is-invalid @enderror" id="recipient-name" > -->
                                    <select id="select1" name="buku_id" class="custom-select @error('buku_id') is-invalid @enderror">
                                    @foreach ($buku as $b)
                                        
                                        <option value="{{$b->id}}">{{$b->judulbuku}}</option>
                                        
                                    @endforeach
                                    </select>
                                    @error('buku_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tanggal Peminjaman :</label>
                                    <input type="date" name="tgl_peminjaman" class="form-control @error('tgl_peminjaman') is-invalid @enderror" id="recipient-name" value="{{ date('Y-m-d') }}" readonly>
                                    @error('tgl_peminjaman')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tanggal pengembalian :</label>
                                    <?php
                                        $tglPeminjaman = date('Y-m-d');
                                        $tglPengembalian = date('Y-m-d', strtotime($tglPeminjaman . ' + 5 days'));
                                    ?>
                                    <input type="date" name="tgl_pengembalian" class="form-control @error('tgl_pengembalian') is-invalid @enderror" id="recipient-name"  value="{{ $tglPengembalian }}" readonly>
                                    @error('tgl_pengembalian')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="select" class="col-form-label">Nama Peminjam :</label>
                                    <!-- <input type="email" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" id="recipient-name" > -->
                                    <select id="select" name="users_id" class="custom-select  @error('users_id') is-invalid @enderror">
                                    @foreach ($users as $user)
                                        @if ($user->role == 'anggota')
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endif
                                    @endforeach
    
                                    </select>
                                    @error('users_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Status :</label>
                                    <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="recipient-name" >
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div> -->
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Sumbit</button>
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