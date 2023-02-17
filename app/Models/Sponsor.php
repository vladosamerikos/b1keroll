<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
    'cif',
    'name',
    'logo',
    'address',
    'main_plain'];

    use HasFactory;

    protected $table = "sponsors";
}
