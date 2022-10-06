@extends('layouts.admin')
@section('header','PILIH AGENT')
@section('css')
@section('content')
<div class="col-md-3 m-auto">
    <div class="card p-1">
        <div class="card-body">
            <!-- Modal SELECT AGENT-->
            <div class="modal-body">
                <form action="{{url('update-hero/'.$dapros->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    {{dd($dapros)}}
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
                        <label for="">DATEL</label>
                        <input type="text" class="form-control" value="{{$dapros->datel}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">STO</label>
                        <input type="text" class="form-control" value="{{$dapros->sto}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">ALAMAT</label>
                        <input type="text" class="form-control" value="{{$dapros->alamat}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">TANGGAL DISPACT</label>
                        <input type="text" name="tgl_dispacth" class="form-control" value="{{$date}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">AGENT</label>
                        <select name="agent_id" class="form-control">
                            <option disabled selected>PILIH AGENT</option>
                            @foreach($users as $user)<option :selected="daproses.agent_id=={{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>@endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection