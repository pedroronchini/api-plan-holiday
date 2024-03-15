<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanHoliday extends Model
{
    use HasFactory;

    protected $table = 'plan_holiday';

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'participants'
    ];

}
