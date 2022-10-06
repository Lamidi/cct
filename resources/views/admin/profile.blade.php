@extends('layouts.admin')
@section('header','PROFILE')
@section('css')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    My Profile Update & Change Password
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif
                    <form action="profileupdate" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto</label> <br>
                                    <img src="/uploads/profile/{{$user->image}}" style="width: 150px; height: 150px; float:left; border: radius 50%; margin-right:25px " class="img-circle elevation-2">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label>Current Password</label>
                                    <div>
                                        <input id="current-password" type="password" class="form-control" name="current-password" required>
                                        @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label>New Password</label>
                                    <div>
                                        <input id="new-password" type="password" class="form-control" name="new-password" required>
                                        @if ($errors->has('new-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <div>
                                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-9">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
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