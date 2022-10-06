<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dapros extends Model
{
    use HasFactory;
    protected $table = 'daproses';
    protected $fillable = [
        'periode',    'type',    'ofi_awal',    'kat_hvc',    'kat_pembayaran',    'los_cust',    'rev_arpu', 'avg_redaman',    'datel', 'jml_device', 'nama',    'nd',    'no_hp', 'product_type',
        'sto',    'usage_inet',    'tgl_upload_data',    'tgl_dispacth',    'agent_id',    'tgl_visit',    'ofi_real', 'afi_id',    'foto_rumah',    'yg_ditemui',    'status_tmpt_tinggal',
        'kemampuan_cust',    'keterangan_bayar',    'retensi',    'tagging_lokasi', 'kompetitor',    'status', 'alamat'
    ];
    public function users()
    {
        return $this->belongsTo(User::class)->withDefault(['agent_id' => 'AGENT BELUM DIPILIH']);
    }
}
