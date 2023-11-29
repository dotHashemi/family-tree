<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];


    // Relation Methods

    public function people()
    {
        $this->hasMany(Person::class, 'city', 'id');
    }
}
