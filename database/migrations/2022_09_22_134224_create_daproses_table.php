<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daproses', function (Blueprint $table) {
            $table->id();
            $table->date('periode');
            $table->string('type');
            $table->string('ofi_awal');
            $table->string('kat_hvc');
            $table->string('kat_pembayaran');
            $table->string('los_cust');
            $table->string('rev_arpu');
            $table->string('avg_redaman');
            $table->string('datel');
            $table->string('jml_device');
            $table->string('nama');
            $table->string('nd');
            $table->string('no_hp');
            $table->string('product_type');
            $table->string('sto');
            $table->string('usage_inet');
            $table->date('tgl_upload_data');
            $table->date('tgl_dispacth');
            $table->string('agent_id');
            $table->date('tgl_visit');
            $table->string('ofi_real');
            $table->string('afi_id');
            $table->string('foto_rumah');
            $table->string('yg_ditemui');
            $table->string('status_tmpt_tinggal');
            $table->string('kemampuan_cust');
            $table->string('keterangan_bayar');
            $table->string('retensi');
            $table->string('tagging_lokasi');
            $table->string('kompetitor');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daproses');
    }
};
