<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
    'cif',
    'name',
    // 'logo',
    'address',
    'price_per_race'];

    use HasFactory;

    protected $table = "insurances";
}
