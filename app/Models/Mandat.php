<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandat extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'phone_number',
        'category',
        'location',
        'start_date',
        'end_date',
        'type',
        'observations',
        'user_id',
    ];
}
