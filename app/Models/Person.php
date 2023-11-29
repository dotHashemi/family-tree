<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'city',
        'father',
        'mother',
        'firstname',
        'lastname',
        'nickname',
        'gender',
        'national',
        'birth',
        'death',
        'updated'
    ];


    // Relation Methods

    public function city()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

    public function father()
    {
        return Person::where('id', $this->father);
    }

    public function mother()
    {
        return Person::where('id', $this->mother);
    }

    public function partners()
    {
        $this_gender = $this->gender == 'male' ? 'groom' : 'bride';
        $partner_gender = $this_gender == 'groom' ? 'bride' : 'groom';

        $partners = Couple::where($this_gender, $this->id)->pluck($partner_gender);

        return Person::whereIn('id', $partners);
    }

    public function children()
    {
        $parent_gender = $this->gender == 'male' ? 'father' : 'mother';

        return Person::where($parent_gender, $this->id);
    }

    public function family()
    {
        // sisters and brothers

        $family = Person::where(function ($query) {
            $query->where('father', $this->father ?? 0)
                ->orWhere('mother', $this->mother ?? 0);
        })->where('id', '!=', $this->id)->get();

        return $family;
    }


    // Other Methods

    public function fullname()
    {
        return $this->firstname . " " . $this->lastname;
    }
}
