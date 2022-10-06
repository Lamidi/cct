<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofi extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];

    public function afis()
    {
        return $this->hasMany(Afi::class);
    }
}
