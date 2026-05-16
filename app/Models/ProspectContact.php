<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'prospect_source',
        'phone_number',
        'email',
        'first_call_date',
        'demand_reference',
        'client_interaction',
        'other_properties_reference',
        'other_interaction',
        'other_call_dates',
        'followup_action',
        'remind_at',
    ];
} 