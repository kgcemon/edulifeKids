<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee extends Model
{
    use HasFactory;
    protected $table = 'fee';
    protected $fillable = [
        'feeType',
        'amount',
        'status',
    ];
}
