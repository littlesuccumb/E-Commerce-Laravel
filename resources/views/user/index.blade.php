@extends('layouts.app')

@section('title', 'DATA USER')

@section('content')
<div class="card mb-3 shadow">
    <div class="card-body d-flex justify-content-between " style="margin-left:17%">
    <div class="h2">DETAILS USER</div>
</div>
</div>
<div class="card shadow">
    <div class="card-body">
<div class="row justify-content-center">
    <div class="col-sm-3">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="mt-2"><i class="fas fa-camera-retro"></i>&nbsp; Foto Admin </h5>
            </div>
            <div class="card-body">
            <img src="{{ asset($user->photo) }}" alt="{{$user->photo}}" class="img-fluid w-100" />
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="mt-2"><i class="fas fa-user-alt"></i>&nbsp; Profil Admin </h5>
            </div>
            <div class="card-body">
                <div class="box-content">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="control-group mb-3">
                                <label class="control-label" for="typeahead">Nama </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="border-radius:0px;" name="name" data-items="4" value="{{ $user->name }}" readonly />
                                </div>
                            </div>
                            <div class="control-group mb-3">
                                <label class="control-label" for="typeahead">Email </label>
                                <div class="input-group">
                                    <input type="email" class="form-control" style="border-radius:0px;" name="email" value="{{ $user->email }}" readonly />
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
