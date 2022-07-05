<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualOrder extends Model
{
    use HasFactory;
    protected $table = "manualOrder";
    protected $guarded = ['id','created_at','updated_at'];
}
