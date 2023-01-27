<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'birth_date',
        'salary',
        'salary_day',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
