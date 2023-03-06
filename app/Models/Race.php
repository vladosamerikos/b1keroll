<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = ['name', 'description', 'unevenness',
    'map_frame',
    'number_of_competitors', 'length', 'start_date', 'start_time', 'start_point',
    'promotional_poster',
    'price'];
    
    use HasFactory;

    protected $table = "races";

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'sponsored','id','id');
    }

    public function insurances()
    {
        return $this->belongsToMany(Insurance::class, 'race_insurance');
    }
    public function runners()
    {
        return $this->belongsToMany(User::class, 'runner_number')->withPivot('qr_code','runner_number','elapsed_time','is_paid');;
    }

}
