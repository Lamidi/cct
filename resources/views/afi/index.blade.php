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
                        <h4 style="float: left">AFI Data</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#addAfi"><i class=" fa fa-plus">Add AFI</i></a>
                        <br><br>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="col-md-8">NAMA</th>
                                        <th>OFI_ID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($afis as $key => $afi)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$afi->nama}}</td>
                                        <td>{{$afi->ofi_id}}</td>
                                        <td>
                                            <div class="btn-gafiup">
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAfi{{$afi->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAfi{{$afi->id}}"> <i class=" fa fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal of Edit afi Detail -->
                                    <div class="modal right fade" id="editAfi{{$afi->id}}" data-backdafip="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdafipLabel">Edit AFI</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('afis.update', $afi->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label for="">NAMA</label>
                                                            <input type="text" name="nama" id="" value="{{$afi->nama}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">OFI</label>
                                                            <select name="ofi_id" id="" class="form-control">
                                                                <option value="" selected disabled>Choose a OFI</option>
                                                                <option value="1" @if ($afi->ofi_id==1) selected @endif>SERING TERJADI GANGGUAN</option>
                                                                <option value="2" @if ($afi->ofi_id==2) selected @endif>RESPON LAYANAN LAMA</option>
                                                                <option value="3" @if ($afi->ofi_id==3) selected @endif>PENYELESAIAN GANGGUAN LAMA</option>
                                                                <option value="4" @if ($afi->ofi_id==4) selected @endif>HARGA MAHAL</option>
                                                                <option value="5" @if ($afi->ofi_id==5) selected @endif>PINDAH KE KOMPETITOR</option>
                                                                <option value="6" @if ($afi->ofi_id==6) selected @endif>KENDALA KEUANGAN</option>
                                                                <option value="7" @if ($afi->ofi_id==7) selected @endif>TAGIHAN TIDAK SESUAI</option>
                                                                <option value="8" @if ($afi->ofi_id==8) selected @endif>PINDAH RUMAH / ALAMAT</option>
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
                                    <!-- Modal of Delete afi-->
                                    <div class="modal right fade" id="deleteAfi{{$afi->id}}" data-backdafip="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdafipLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">DELETED AFI</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('afis.destroy', $afi->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <p>Are You Sure To Delete This afi: {{$afi->afi}} ?</p>
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
    <div class="modal right fade" id="addAfi" data-backdafip="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdafipLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ADD AFI</h5>
                    <button type="button" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('afis.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">NAMA</label>
                            <input type="text" name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">OFI</label>
                            <select name="ofi_id" id="" class="form-control">
                                <option value="" selected disabled>Choose a OFI</option>
                                <option value="1">SERING TERJADI GANGGUAN</option>
                                <option value="2">RESPON LAYANAN LAMA</option>
                                <option value="3">PENYELESAIAN GANGGUAN LAMA</option>
                                <option value="4">HARGA MAHAL</option>
                                <option value="5">PINDAH KE KOMPETITOR</option>
                                <option value="6">KENDALA KEUANGAN</option>
                                <option value="7">TAGIHAN TIDAK SESUAI</option>
                                <option value="8">PINDAH RUMAH / ALAMAT</option>
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