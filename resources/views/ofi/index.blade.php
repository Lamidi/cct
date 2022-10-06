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
                        <h4 style="float: left">OFI DATA</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#addOfi"><i class=" fa fa-plus">Add OFI</i></a>
                        <br><br>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NAMA</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ofis as $key => $ofi)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$ofi->nama}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editOfi{{$ofi->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteOfi{{$ofi->id}}"> <i class=" fa fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal of Edit ofi Detail -->
                                    <div class="modal right fade" id="editOfi{{$ofi->id}}" data-backdofip="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit OFI</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('ofis.update', $ofi->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label for="">NAMA</label>
                                                            <input type="text" name="nama" id="" value="{{$ofi->nama}}" class="form-control">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning btn-block">Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal of Delete ofi-->
                                    <div class="modal right fade" id="deleteOfi{{$ofi->id}}" data-backdofip="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">DELETED OFI</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('ofis.destroy', $ofi->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <p>Are You Sure To Delete This ofi: {{$ofi->nama}} ?</p>
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
    <div class="modal right fade" id="addOfi" data-backdofip="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ADD OFI</h5>
                    <button type="button" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('ofis.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">NAMA</label>
                            <input type="text" name="nama" id="" class="form-control">
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