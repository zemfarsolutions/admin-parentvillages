<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'admin_id',
        'title',
        'slug',
        'short_description',
        'full_description',
        'deadline',
        'event_date'
    ];
    
    public function questions()
    {
        return $this->hasMany(ScholarshipQuestion::class,'scholarship_id','id');
    }

    public function applications()
    {
        return $this->hasMany(UserApplication::class, 'scholarship_id', 'id');
    }
}
