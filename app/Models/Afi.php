<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afi extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'ofi_id'];

    public function ofis()
    {
        return $this->belongsTo(Ofi::class);
    }
}
