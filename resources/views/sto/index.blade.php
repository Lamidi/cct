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
                        <h4 style="float: left">STO Data</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#addSto"><i class=" fa fa-plus">Add Sto</i></a>
                        <br><br>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>KODE</th>
                                        <th>DETAIL</th>
                                        <th>RO_ID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stos as $key => $sto)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$sto->kode}}</td>
                                        <td>{{$sto->detail}}</td>
                                        <td>{{$sto->ro_id}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSto{{$sto->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteSto{{$sto->id}}"> <i class=" fa fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal of Edit Sto Detail -->
                                    <div class="modal right fade" id="editSto{{$sto->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Sto</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('stos.update', $sto->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label for="">KODE</label>
                                                            <input type="text" name="kode" id="" value="{{$sto->kode}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">DETAIL</label>
                                                            <input type="text" name="detail" id="" value="{{$sto->detail}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">RO</label>
                                                            <select name="ro_id" id="" class="form-control">
                                                                <option value="" selected disabled>Choose a RO</option>
                                                                <option value="1" @if ($sto->ro_id==1) selected @endif>BANGIL</option>
                                                                <option value="2" @if ($sto->ro_id==2) selected @endif>PASURUAN</option>
                                                                <option value="3" @if ($sto->ro_id==3) selected @endif>PROBOLINGGO</option>
                                                                <option value="4" @if ($sto->ro_id==4) selected @endif>KRAKSAAN</option>
                                                                <option value="5" @if ($sto->ro_id==5) selected @endif>LUMAJANG</option>
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
                                    <!-- Modal of Delete Sto-->
                                    <div class="modal right fade" id="deleteSto{{$sto->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">DELETED Sto</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('stos.destroy', $sto->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <p>Are You Sure To Delete This Sto: {{$sto->detail}} ?</p>
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
    <div class="modal right fade" id="addSto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ADD Sto</h5>
                    <button type="button" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('stos.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">KODE</label>
                            <input type="text" name="kode" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">DETAIL</label>
                            <input type="text" name="detail" id="" class="form-control">
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