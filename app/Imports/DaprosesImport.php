<?php

namespace App\Imports;

use App\Models\Dapros;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;


class DaprosesImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Dapros([
            'id' => $row[0],
            'periode' => $row[1],
            'type' => $row[2],
            'ofi_awal' => $row[3],
            'kat_hvc' => $row[4],
            'kat_pembayaran' => $row[5],
            'los_cust' => $row[6],
            'rev_arpu' => $row[7],
            'alamat' => $row[8],
            'avg_redaman' => $row[9],
            'datel' => $row[10],
            'jml_device' => $row[11],
            'nama' => $row[12],
            'nd' => $row[13],
            'no_hp' => $row[14],
            'product_type' => $row[15],
            'sto' => $row[16],
            'usage_inet' => $row[17],
            // 'tgl_upload_data' => $row[18],
            // 'tgl_dispacth' => $row[19],
            // 'agent_id' => $row[20],
            // 'tgl_visit' => $row[21],
            // 'ofi_real' => $row[22],
            // 'afi_id' => $row[23],
            // 'foto_rumah' => $row[24],
            // 'yg_ditemui' => $row[25],
            // 'status_tmpt_tinggal' => $row[26],
            // 'kemampuan_cust' => $row[27],
            // 'keterangan_bayar' => $row[28],
            // 'retensi' => $row[29],
            // 'tagging_lokasi' => $row[30],
            // 'kompetitor' => $row[31],
            // 'status' => $row[32],
        ]);
    }
}
