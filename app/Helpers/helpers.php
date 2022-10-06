<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

function format_date($value)
{
    return date('H:i:s - d M Y', strtotime($value));
}
