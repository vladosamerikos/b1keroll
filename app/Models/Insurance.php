<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
    'cif',
    'name',
    'address',
    'price_per_race'];

    use HasFactory;

    protected $table = "insurances";

    public function races()
    {
        return $this->belongsToMany(Race::class, 'race_insurace');
    }

}
