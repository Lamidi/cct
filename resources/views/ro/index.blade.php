@extends('layouts.admin')
@section('header')
@section('css')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">RO Data</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#addRo"><i class=" fa fa-plus">Add RO</i></a>
                        <br><br>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>RO</th>
                                        <th class="col-md-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ros as $key => $ro)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$ro->ro}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editRo{{$ro->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteRo{{$ro->id}}"> <i class=" fa fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal of Edit RO Detail -->
                                    <div class="modal right fade" id="editRo{{$ro->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit RO</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('ros.update', $ro->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label for="">RO</label>
                                                            <input type="text" name="ro" id="" value="{{$ro->ro}}" class="form-control">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning btn-block">Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal of Delete RO-->
                                    <div class="modal right fade" id="deleteRo{{$ro->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">DELETED RO</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('ros.destroy', $ro->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <p>Are You Sure To Delete This RO: {{$ro->ro}} ?</p>
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
    <div class="modal right fade" id="addRo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ADD RO</h5>
                    <button type="button" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('ros.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">RO</label>
                            <input type="text" name="ro" id="" class="form-control">
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