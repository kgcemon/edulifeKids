<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionList extends Model
{
    use HasFactory;
    protected $table = 'admission';
    protected $fillable = ["first_name", "last_name", "email", "phone", "class", "dateOfbath","expectedDate"];
}
