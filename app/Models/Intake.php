<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'city',
        'state',
        'postal_code',
        'gender',
        'language',
        'age'
    ];

    public function answers()
    {
        return $this->hasMany(IntakeAnswer::class, 'intake_id', 'id');
    }
}
