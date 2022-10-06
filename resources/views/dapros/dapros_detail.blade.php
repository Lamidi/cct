<div class="row">
    @forelse($daproses as $dapros)
    <div class="col-md-12">
        <div class="form-group">
            <label for="">NAMA</label>
            <input type="text" class="form-control" value="{{$dapros->nama}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">ND</label>
            <input type="text" class="form-control" value="{{$dapros->nd}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">NO HP</label>
            <input type="text" class="form-control" value="{{$dapros->no_hp}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">PERIODE</label>
            <input type="text" class="form-control" value="{{$dapros->periode}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">TYPE</label>
            <input type="text" class="form-control" value="{{$dapros->type}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">OFI AWAL</label>
            <input type="text" class="form-control" value="{{$dapros->ofi_awal}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">KAT HVC</label>
            <input type="text" class="form-control" value="{{$dapros->kat_hvc}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">KAT PEMBAYARAN</label>
            <input type="text" class="form-control" value="{{$dapros->kat_pembayaran}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">LOS CUST</label>
            <input type="text" class="form-control" value="{{$dapros->los_cust}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">REV ARPU</label>
            <input type="text" class="form-control" value="{{$dapros->rev_arpu}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">AVG REDAMAN</label>
            <input type="text" class="form-control" value="{{$dapros->avg_redaman}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">DATEL</label>
            <input type="text" class="form-control" value="{{$dapros->datel}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">JUMLAH DEVICE</label>
            <input type="text" class="form-control" value="{{$dapros->jml_device}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">PRODUCT TYPE</label>
            <input type="text" class="form-control" value="{{$dapros->product_type}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">STO</label>
            <input type="text" class="form-control" value="{{$dapros->sto}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">USAGE INET</label>
            <input type="text" class="form-control" value="{{$dapros->usage_inet}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">TGL UPLOAD DATA</label>
            <input type="text" class="form-control" value="{{$dapros->tgl_upload_data}}" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">TGL DISPATCH</label>
            <input type="text" class="form-control" value="{{$dapros->tgl_dispacth}}" readonly>
        </div>
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
        <input type="text" class="form-control" value="{{$dapros->afi_real}}" readonly>
    </div>
    <div class="form-group">
        <label>FOTO RUMAH</label>
        <input type="text" class="form-control" value="{{$dapros->foto_rumah}}" readonly>
    </div>
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
    @empty
    @endforelse
</div>
<style>
    input:read-only {
        background: #fff !important;
    }

    textarea:read-only {
        background: #fff !important;
    }
</style>