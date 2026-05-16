<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceWeb extends Model
{
    use HasFactory;

    protected $table = 'service_webs';
    
    protected $fillable = [
        'title',
        'description', 
        'lien',
        'imageUrl',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}