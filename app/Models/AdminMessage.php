<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMessage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'message', 'status', 'read_at', 'property_id'];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function property()
    {
        // Adjust the related model if needed (e.g., Property or PromoteurProperty)
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function isUnread()
    {
        return $this->status === 'unread';
    }

    public function isRead()
    {
        return $this->status === 'read';
    }

    public function isReplied()
    {
        return $this->status === 'replied';
    }
}
