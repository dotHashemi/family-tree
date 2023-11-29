<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'groom',
        'bride',
        'status',
        'updated',
    ];
}
