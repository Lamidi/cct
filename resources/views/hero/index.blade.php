@extends('layouts.admin')
@section('header','DAPROS DATA')
@section('css')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">
                        <br><br>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ND</th>
                                        <th>NAMA</th>
                                        <th>NO HP</th>
                                        <th>ALAMAT</th>
                                        <th>STO</th>
                                        <th>OFI AWAL</th>
                                        <th>AGENT</th>
                                        <th>STATUS</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daproses as $key => $dapros)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$dapros->nd}}</td>
                                        <td>{{$dapros->nama}}</td>
                                        <td>{{$dapros->no_hp}}</td>
                                        <td>{{$dapros->alamat}}</td>
                                        <td>{{$dapros->sto}}</td>
                                        <td>{{$dapros->ofi_awal}}</td>
                                        <td>{{$dapros->agent_id ?? 'AGENT BELUM DIPILIH'}}</td>
                                        <td>@if ($dapros->created_at >0) <span class="text text-danger">
                                                DATA UPLOADED</span>
                                            @elseif ($dapros->agent_id >0)
                                            <span class="text text-info"> DATA DISPATCHED</span>
                                            @else($dapros->tgl_visit>0)
                                            <span class="text text-info"> SUDAH VISIT</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- <a href="{{url('heros/'.$dapros->id.'/edit')}}" class="btn btn-dark btn-sm"><i class=" fa fa-plus">AGENT</i></a> -->
                                                <a href="{{url('edit-hero/'.$dapros->id)}}" class="btn btn-dark btn-sm"><i class=" fa fa-plus">AGENT</i></a>
                                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DaprosDetails{{$dapros->id}}"> <i class=" fa fa-eye"></i>VIEW</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- DAPROS DETAILS MODAL -->
                                    <div class="modal right fade" id="DaprosDetails{{$dapros->id}}" data-backddaprosp="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">DAPROS DETAILS</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">NAMA</label>
                                                        <input type="text" class="form-control" value="{{$dapros->nama}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">ND</label>
                                                        <input type="text" class="form-control" value="{{$dapros->nd}}" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">NO HP</label>
                                                        <input type="text" class="form-control" value="{{$dapros->no_hp}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">ALAMAT</label>
                                                        <input type="text" class="form-control" value="{{$dapros->alamat}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">PERIODE</label>
                                                        <input type="text" class="form-control" value="{{$dapros->periode}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">TYPE</label>
                                                        <input type="text" class="form-control" value="{{$dapros->type}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">OFI AWAL</label>
                                                        <input type="text" class="form-control" value="{{$dapros->ofi_awal}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">KAT HVC</label>
                                                        <input type="text" class="form-control" value="{{$dapros->kat_hvc}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">KAT PEMBAYARAN</label>
                                                        <input type="text" class="form-control" value="{{$dapros->kat_pembayaran}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">LOS CUST</label>
                                                        <input type="text" class="form-control" value="{{$dapros->los_cust}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">REV ARPU</label>
                                                        <input type="text" class="form-control" value="{{$dapros->rev_arpu}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">AVG REDAMAN</label>
                                                        <input type="text" class="form-control" value="{{$dapros->avg_redaman}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DATEL</label>
                                                        <input type="text" class="form-control" value="{{$dapros->datel}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">JUMLAH DEVICE</label>
                                                        <input type="text" class="form-control" value="{{$dapros->jml_device}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">PRODUCT TYPE</label>
                                                        <input type="text" class="form-control" value="{{$dapros->product_type}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">STO</label>
                                                        <input type="text" class="form-control" value="{{$dapros->sto}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">USAGE INET</label>
                                                        <input type="text" class="form-control" value="{{$dapros->usage_inet}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">TGL UPLOAD DATA</label>
                                                        <input type="text" class="form-control" value="{{$dapros->tgl_upload_data}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">TGL DISPATCH</label>
                                                        <input type="text" class="form-control" value="{{$dapros->tgl_dispacth}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>AGENT ID</label>
                                                        <input type="text" class="form-control" value="{{$dapros->agent_id}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>TGL VISIT</label>
                                                        <input type="text" class="form-control" value="{{$dapros->tgl_visit}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>OFI REAL</label>
                                                        <input type="text" class="form-control" value="{{$dapros->ofi_real}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>AFI ID</label>
                                                        <input type="text" class="form-control" value="{{$dapros->afi_id}}" readonly>
                                                    </div>
                                                    <div class="image">
                                                        <label>FOTO RUMAH</label>
                                                        <br>
                                                        <img src="/public/uploads/{{$dapros->foto_rumah}}" style="width: 150px; height: 150px; float:left; border: radius 50%; margin-right:25px " class="img-circle elevation-2">
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="form-group">
                                                        <label>YANG DITEMUI</label>
                                                        <input type="text" class="form-control" value="{{$dapros->yg_ditemui}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>STATUS TEMPAT TINGGAL</label>
                                                        <input type="text" class="form-control" value="{{$dapros->status_tmpt_tinggal}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KEMAMPUAN CUST</label>
                                                        <input type="text" class="form-control" value="{{$dapros->kemampuan_cust}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KETERANGAN BAYAR</label>
                                                        <input type="text" class="form-control" value="{{$dapros->keterangan_bayar}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>RETENSI</label>
                                                        <input type="text" class="form-control" value="{{$dapros->retensi}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>TAGGING LOKASI</label>
                                                        <input type="text" class="form-control" value="{{$dapros->tagging_lokasi}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>KOMPETITOR</label>
                                                        <input type="text" class="form-control" value="{{$dapros->kompetitor}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>STATUS</label>
                                                        <input type="text" class="form-control" value="{{$dapros->status}}" readonly>
                                                    </div>
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
</div>
@endsection