<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sto extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'detail', 'ro_id'];
}
