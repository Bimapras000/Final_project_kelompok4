@extends('tampiluser.layout.app')
@section('user')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="shopify-grid padding-large">
    <div class="container">
    <div class="card shadow mb-4">
    <div class="card-body">
<div class="container emp-profile">
<form action="{{ route('profiluser.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <!-- <img src="{{ asset('storage/fotos/'.$user->foto) }}" alt="Photo Profil"> -->
                        @empty($user->foto)
                            <img src="{{url('admin/img/user.png')}}" alt="Photo Profil">
                        @else
                            <img src="{{asset('storage/fotos/'.$user->foto)}}" alt="Photo Profil">
                        @endempty
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$user->name}}
                                    </h5>
                                    <h6>
                                        {{$user->role}}
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="profile-edit-btn" name="btnAddMore" >{{__('Update Profile')}}</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nomor Telepon</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->no_tlp}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->alamat}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->email}}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->role}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Edit Foto</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="foto" style=" width: 90%;">
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        </div>
        </div>
        </div>
        </div>
        @endsection