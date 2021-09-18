<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneNo',
        'title',
        'vip',
        'room',
        'date',
        'startTime',
        'endTime',
        'name',
        'status',
        'dateSubmit',
    ];

    protected $table = 'booking';

}
