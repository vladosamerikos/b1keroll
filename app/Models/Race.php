<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = ['name', 'description', 'unevenness',
    // 'map_img',
    'number_of_competitors', 'length', 'start_date', 'start_time', 'start_point',
    // 'promotional_poster',
    'price'];
    
    use HasFactory;

    protected $table = "races";
}
