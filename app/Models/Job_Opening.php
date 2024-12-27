<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job_Opening extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'company_name',
        'logo',
        'skills',
        'description',
        'experience',
        'location',
        'salary',
        'extra_info',
    ];

    protected $casts = [
        'skills' => 'array',
        'extra_info' => 'array',
    ];
}
