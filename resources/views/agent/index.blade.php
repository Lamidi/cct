@extends('layouts.admin')
@section('header','DAPROS DATA')
@section('css')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($daproses as $key => $dapros)
        <div class="col-lg-2 col-5">
            <div class="small-box bg-info">
                <div class="inner">
                    <p>NAMA: {{$dapros->nama}}</p>
                    <p>NO HP: {{$dapros->no_hp}}</p>
                    <p>ND: {{$dapros->nd}}</p>
                    <p>STO: {{$dapros->sto}}</p>
                    <p>STATUS: @if ($dapros->created_at ==0) <span>
                            DATA UPLOADED</span>
                        @elseif ($dapros->agent_id >1)
                        <span> DATA DISPATCHED</span>
                        @else($dapros->tgl_visit>1)
                        <span> SUDAH VISIT</span>
                        @endif
                    </p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editDapros{{$dapros->id}}"> <i class="fa fa-edit"></i>UPDATE</a>
                <!-- <a href="{{url('orders')}}" class="small-box-footer">UPDATE DATA<i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- Modal of Edit dapros-->
        <div class="modal right fade" id="editDapros{{$dapros->id}}" data-backddaprosp="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackddaprospLabel">UPDATE DAPROS</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('agents/ ' . $dapros->id) }}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="">OFI AWAL</label>
                                <input type="text" name="ofi_awal" id="" value="{{$dapros->ofi_awal}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">TANGGAL VISIT</label>
                                <div class="justify-content-between">
                                    <input type="date" name="tgl_visit" class="form-control" value="{{$dapros->tgl_visit}}">
                                    <span class="icon-calendar calendar-icon" style="font-size:10%; "></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">OFI REAL</label>
                                <select name="ofi_real" id="" class="form-control">
                                    <option disabled selected>Masukkan Pilihan</option>
                                    <!-- @foreach($afis as $afi) -->
                                    <!-- <option value="{{$afi->id}}">{{$afi->ofi_id}}</option>@endforeach -->
                                    <option value="1" @if ($dapros->ofi_real==1) selected @endif>SERING TERJADI GANGGUAN</option>
                                    <option value="2" @if ($dapros->ofi_real==2) selected @endif>RESPON LAYANAN LAMA</option>
                                    <option value="3" @if ($dapros->ofi_real==3) selected @endif>PENYELESAIAN GANGGUAN LAMA</option>
                                    <option value="4" @if ($dapros->ofi_real==4) selected @endif>HARGA MAHAL</option>
                                    <option value="5" @if ($dapros->ofi_real==5) selected @endif>PINDAH KE KOMPETITOR</option>
                                    <option value="6" @if ($dapros->ofi_real==6) selected @endif>KENDALA KEUANGAN</option>
                                    <option value="7" @if ($dapros->ofi_real==7) selected @endif>TAGIHAN TIDAK SESUAI</option>
                                    <option value="8" @if ($dapros->ofi_real==8) selected @endif>PINDAH RUMAH / ALAMAT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">AFI REAL</label>
                                <select name="afi_id" id="" class="form-control">
                                    <option selected disabled>Masukkan Pilihan</option>
                                    <!-- @foreach($afis as $afi)
                                                                <option value="{{$afi->ofi_id}}">{{$afi->nama}}</option>
                                                                @endforeach -->
                                    <option disabled>---OFI SERING TERJADI GANGGUAN---</option>
                                    <option value="1" @if ($dapros->afi_id==1) selected @endif>Patroli akses untuk meminimalisir GAMAS karena pekerjaan pihak ke 3 atau vandalisme</option>
                                    <option value="2" @if ($dapros->afi_id==2) selected @endif>QC diperketat di regional dan witel dan menambah ONT OnTech</option>
                                    <option value="3" @if ($dapros->afi_id==3) selected @endif>Monitoring tiket SQM dan BOT Preventif GAMAS</option>
                                    <option value="4" @if ($dapros->afi_id==4) selected @endif>Sales & Teknisi menginformasikan pada pelanggan tentang batas device yang bisa terkoneksi sesuai dengan kapasitas layanan</option>
                                    <option value="5" @if ($dapros->afi_id==5) selected @endif>Membuat kartu panduan pelanggan & digantung di antena ONT"</option>
                                    <option disabled>---OFI SERING TERJADI GANGGUAN---</option>
                                    <option value="6" @if ($dapros->afi_id==6) selected @endif>Meluruskan lagi sesuai SOP, tidak boleh close secara on desk</option>
                                    <option disabled>---OFI PENYELESAIAN GANGGUAN LAMA---</option>
                                    <option value="7" @if ($dapros->afi_id==7) selected @endif>Pengecekan all product/layanan/service berjalan dengan baik</option>
                                    <option disabled>---OFI HARGA MAHAL---</option>
                                    <option value="8" @if ($dapros->afi_id==8) selected @endif>Menentukan prioritas kunjungan untuk dikunjungi dan membuat perencanaan kunjungan harian oleh CTB (salah satunya dengan filtering usage,dll)</option>
                                    <option value="9" @if ($dapros->afi_id==9) selected @endif>Melakukan caring pelanggan sesuai pritotas kunjungan untuk proses penagihan sekaligus melakukan edukasi benefit paket lainnya</option>
                                    <option value="10" @if ($dapros->afi_id==10) selected @endif>Melakukan proses HSSCP atau migrasi ke paket Retensi atau memodifikasi paket layanan setelah pelanggan membayar tunggakan</option>
                                    <option value="11" @if ($dapros->afi_id==11) selected @endif>Melakukan retensi dengan penghapusan denda tagihan dan diskon tagihan maksimum 10%</option>
                                    <option value="12" @if ($dapros->afi_id==12) selected @endif>Memberikan informasi kepada pelanggan apabila tidak membayar tagihan akan dilakukan somasi melalui lawyer</option>
                                    <option disabled>---OFI PINDAH KE KOMPETITOR---</option>
                                    <option value="13" @if ($dapros->afi_id==13) selected @endif>Hasil kunjungan CTB ke pelanggan yang lunas bayar dan tersuspect pindah ke kompetitor dilaporkan ke Support CC</option>
                                    <option value="14" @if ($dapros->afi_id==14) selected @endif>Support CC melakukan retensi kepada pelanggan yang terindikasi pindah ke kompetitor</option>
                                    <option value="15" @if ($dapros->afi_id==15) selected @endif>Memberikan informasi kepada pelanggan apabila tidak membayar tagihan akan dilakukan somasi melalui lawyer</option>
                                    <option disabled>---OFI KENDALA KEUANGAN---</option>
                                    <option value="16" @if ($dapros->afi_id==16) selected @endif>CTB visit kelokasi pelanggan, melakukan negosiasi pembayaran secara bertahap : Pembebasan denda keterlambatan pembayaran atau Diskon tagihan sesuai koridor Diskon yang diberikan maksimal 10%</option>
                                    <option value="17" @if ($dapros->afi_id==17) selected @endif>Memberikan informasi kepada pelanggan apabila tidak membayar tagihan akan dilakukan somasi melalui lawyer</option>
                                    <option value="18" @if ($dapros->afi_id==18) selected @endif>Penawaran paket yang paling sesuai dengan kemampuan pelanggan (melakukan modifikasi paket/ retensi)</option>
                                    <option disabled>---OFI TAGIHAN TIDAK SESUAI---</option>
                                    <option value="19" @if ($dapros->afi_id==19) selected @endif>Melakukan caring pelanggan untuk proses penagihan sekaligus menjelaskan detail tagihan</option>
                                    <option value="20" @if ($dapros->afi_id==20) selected @endif>Apabila terbukti tagihan pelanggan tidak sesuai maka dapat dilakukan claim sebelum pelanggan membayar tagihan</option>
                                    <option value="21" @if ($dapros->afi_id==21) selected @endif>Support CC melakukan penyesuaian paket pelanggan sesuai dengan hasil carring</option>
                                    <option value="22" @if ($dapros->afi_id==22) selected @endif>Memberikan informasi kepada pelanggan apabila tidak membayar tagihan akan dilakukan somasi melalui lawyer</option>
                                    <option disabled>---OFI PINDAH RUMAH / ALAMAT---</option>
                                    <option value="23" @if ($dapros->afi_id==23) selected @endif>Mengukur usage pelanggan secara berkala (setiap hari) untuk mendeteksi pelanggan-pelanggan no usage</option>
                                    <option value="24" @if ($dapros->afi_id==24) selected @endif>Visiting pelanggan no usage</option>

                                </select>
                            </div>
                            <div class="image">
                                <label>FOTO RUMAH</label> <br>
                                <img src="/public/uploads/{{$dapros->foto_rumah}}" style="width: 150px; height: 150px; float:left; border: radius 50%; margin-right:25px " class="img-circle elevation-2">
                                <input type="file" name="foto_rumah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">STATUS TEMPAT TINGGAL</label>
                                <select name="status_tmpt_tinggal" id="" class="form-control">
                                    <option value="" selected disabled>Masukkan Pilihan</option>
                                    <option value="1" @if ($dapros-> status_tmpt_tinggal==1) selected @endif>RUMAH PRIBADI</option>
                                    <option value="2" @if ($dapros-> status_tmpt_tinggal==2) selected @endif>KONTRAKAN</option>
                                    <option value="3" @if ($dapros-> status_tmpt_tinggal==3) selected @endif>KOS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">YANG DITEMUI</label>
                                <select name="yg_ditemui" id="" class="form-control">
                                    <option value="" selected disabled>Masukkan Pilihan</option>
                                    <option value="1" @if ($dapros->yg_ditemui==1) selected @endif>BERTEMU PIC</option>
                                    <option value="2" @if ($dapros->yg_ditemui==2) selected @endif>BERTEMU KELUARGA</option>
                                    <option value="3" @if ($dapros->yg_ditemui==3) selected @endif>BERTEMU ORANG LAIN</option>
                                    <option value="4" @if ($dapros->yg_ditemui==4) selected @endif>TIDAK BERTEMU SIAPAPUN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">KEMAMPUAN CUST</label>
                                <select name="kemampuan_cust" id="" class="form-control">
                                    <option value="" selected disabled>Masukkan Pilihan</option>
                                    <option value="1" @if ($dapros->kemampuan_cust==1) selected @endif>MAMPU</option>
                                    <option value="2" @if ($dapros->kemampuan_cust==2) selected @endif>TIDAK MAMPU</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">KETERANGAN BAYAR</label>
                                <select name="keterangan_bayar" id="" class="form-control">
                                    <option value="" selected disabled>Masukkan Pilihan</option>
                                    <option value="1" @if ($dapros->keterangan_bayar==1) selected @endif>BAYAR LANGSUNG</option>
                                    <option value="2" @if ($dapros->keterangan_bayar==2) selected @endif>BAYAR SENDIRI</option>
                                    <option value="3" @if ($dapros->keterangan_bayar==3) selected @endif>TIDAK MAU BAYAR</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">RETENSI</label>
                                <select name="retensi" id="" class="form-control">
                                    <option value="" selected disabled>Masukkan Pilihan</option>
                                    <option value="1" @if ($dapros->retensi==1) selected @endif>YA</option>
                                    <option value="2" @if ($dapros->retensi==2) selected @endif>TIDAK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">TAGGING LOKASI</label>
                                @if($currentUserInfo)
                                <!-- <h4>IP: {{ $currentUserInfo->ip }}</h4>
                                                            <h4>Country Name: {{ $currentUserInfo->countryName }}</h4>
                                                            <h4>Country Code: {{ $currentUserInfo->countryCode }}</h4>
                                                            <h4>Region Code: {{ $currentUserInfo->regionCode }}</h4>
                                                            <h4>Region Name: {{ $currentUserInfo->regionName }}</h4>
                                                            <h4>City Name: {{ $currentUserInfo->cityName }}</h4>
                                                            <h4>Zip Code: {{ $currentUserInfo->zipCode }}</h4>
                                                            <h4>Latitude: {{ $currentUserInfo->latitude }}</h4>
                                                            <h4>Longitude: {{ $currentUserInfo->longitude }}</h4> -->
                                <input type="text" name="tagging_lokasi" id="" value="{{$currentUserInfo->latitude}},{{ $currentUserInfo->longitude }}" class="form-control" readonly>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">KOMPETITOR</label>
                                <input type="text" name="kompetitor" id="" value="{{$dapros->kompetitor}}" class="form-control" placeholder="*Jika berlangganan Kompetitor">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning btn-block">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection