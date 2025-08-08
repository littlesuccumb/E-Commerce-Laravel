@extends('layouts.app')

@section('title', 'DATA USER')

@section('content')
<div class="card mb-3 shadow"> <!-- Add shadow class here -->
    <div class="card-body d-flex justify-content-between">
        <div class="h2">EDIT DETAILS USER</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="card card-primary shadow"> <!-- Add shadow class here -->
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-camera-retro"></i>&nbsp; Foto User </h5>
            </div>
            <div class="card-body">
                <img src="{{ asset( $user->photo) }}" alt="{{$user->photo}}" class="img-fluid w-100" />
            </div>
            <div class="card-footer">
                <form method="POST" action="{{ route('user.updatePhoto', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" name="photo">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <br><br>    
                    <button type="submit" class="btn btn-primary btn-md" value="Tambah">
                        <i class="fa fa-edit mr-1"></i>  Ganti Foto
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card card-primary shadow"> <!-- Add shadow class here -->
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-user-cog"></i>&nbsp; Kelola Pengguna </h5>
            </div>
            <div class="card-body">
                <div class="box-content">
                    <form class="form-horizontal" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="control-group mb-3">
                                <label class="control-label" for="typeahead">Nama </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="border-radius:0px;" name="name" data-items="4" value="{{ $user->name }}" required="required" />
                                </div>
                            </div>
                            <div class="control-group mb-3">
                                <label class="control-label" for="typeahead">Email </label>
                                <div class="input-group">
                                    <input type="email" class="form-control" style="border-radius:0px;" name="email" value="{{ $user->email }}" required="required" />
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="btn btn-primary" name="btn" value="Tambah">
                                <i class="fa fa-edit"></i> Ubah Profil
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-primary shadow"> <!-- Add shadow class here -->
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-key"></i>&nbsp; Ganti Password</h5>
            </div>
            <div class="card-body">
                <div class="box-content">
                    <form class="form-horizontal" method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="control-group mb-3">
                                <label class="control-label" for="typeahead">Email </label>
                                <div class="input-group">
                                    <input type="email" class="form-control" style="border-radius:0px;" name="email" data-items="4" value="{{ $user->email }}" />
                                </div>
                            </div>
                            <div class="control-group mb-3">
                                <label class="control-label" for="typeahead">Password Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Enter Your New Password" id="password" name="password" data-items="4" value="" required="required" />
                                </div>
                            </div>
                            <input type="hidden" class="form-control" style="border-radius:0px;" name="id" value="{{ $user->id }}" required="required" />
                            <button type="submit" class="btn btn-primary" value="Tambah" name="password">
                                <i class="fa fa-edit"></i> Ubah Password
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
