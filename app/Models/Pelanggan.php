<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* traits Spatie Media Library */
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pelanggan extends Model implements HasMedia
{
    use HasFactory;
    /* use Spatie Media Library */
    use InteractsWithMedia;

    protected $table = "pelanggan";
    protected $guarded = ['id','created_at','updated_at'];
}
