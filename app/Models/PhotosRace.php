<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotosRace extends Model
{

    protected $fillable = [
    'race_id',
    'photo'];
    use HasFactory;

    protected $table = "photos_race";

}
