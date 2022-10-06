@extends('layouts.admin')
@section('header')
@section('css')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">User Data</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#addUser"><i class=" fa fa-plus">Add User</i></a>
                        <br><br>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>RO</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Foto</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->nik}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->ro_id}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->role}}</td>
                                        <td><img src="/uploads/profile/{{$user->image}}" style="width: 70px; height: 70px; float:left; border: radius 50%; margin-right:25px " class="img-circle elevation-2"></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUser{{$user->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUser{{$user->id}}"> <i class=" fa fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal of Edit User Detail -->
                                    <div class="modal right fade" id="editUser{{$user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">EDIT USER</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('users.update', $user->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="text" name="email" id="" value="{{$user->email}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Role</label>
                                                            <select name="role" id="" class="form-control">
                                                                <option value="" selected disabled>Choose a Role</option>
                                                                <option value="admin" @if($user->role=="admin") selected @endif>Admin</option>
                                                                <option value="hero" @if($user->role=="hero") selected @endif>Hero</option>
                                                                <option value="agent" @if($user->role=="agent")selected @endif>Agent</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">RO</label>
                                                            <select name="ro_id" id="" class="form-control">
                                                                <option value="" selected disabled>Choose a RO</option>
                                                                <option value="1" @if ($user->ro_id==1) selected @endif>BANGIL</option>
                                                                <option value="2" @if ($user->ro_id==2) selected @endif>PASURUAN</option>
                                                                <option value="3" @if ($user->ro_id==3) selected @endif>PROBOLINGGO</option>
                                                                <option value="4" @if ($user->ro_id==4) selected @endif>KRAKSAAN</option>
                                                                <option value="5" @if ($user->ro_id==5) selected @endif>LUMAJANG</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning btn-block">Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal of Delete User-->
                                    <div class="modal right fade" id="deleteUser{{$user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">DELETED USER</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <p>Are You Sure To Delete This User: {{$user->name}} ?</p>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-danger btn-block">Deleted Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ADD USER</h5>
                    <button type="button" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" name="nik" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="" selected disabled>Choose a Gender</option>
                                <option value="M">Men</option>
                                <option value="W">Women</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="text" name="password-confirm" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="" selected disabled>Choose a role</option>
                                <option value="1">Admin</option>
                                <option value="2">Hero</option>
                                <option value="3">Agent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">RO</label>
                            <select name="ro_id" id="" class="form-control">
                                <option value="" selected disabled>Choose a RO</option>
                                <option value="1">BANGIL</option>
                                <option value="2">PASURUAN</option>
                                <option value="3">PROBOLINGGO</option>
                                <option value="4">KRAKSAAN</option>
                                <option value="5">LUMAJANG</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-block">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection