<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasBesar extends Model
{
    use HasFactory;
    protected $table = "kas_besar";
    protected $guarded = ['id','created_at','updated_at'];
}
