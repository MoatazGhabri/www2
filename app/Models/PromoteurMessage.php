<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PromoteurMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'promoteur_id',
        'property_id',
        'sender_name',
        'sender_email',
        'sender_phone',
        'message',
        'status',
        'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    // Relationships
    public function promoteur()
    {
        return $this->belongsTo(User::class, 'promoteur_id');
    }

    public function property()
    {
        return $this->belongsTo(PromoteurProperty::class, 'property_id');
    }

    // Scopes
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    // Methods
    public function markAsRead()
    {
        $this->update([
            'status' => 'read',
            'read_at' => now()
        ]);
    }

    public function markAsReplied()
    {
        $this->update([
            'status' => 'replied'
        ]);
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

    // Accessors
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    public function getFormattedReadAtAttribute()
    {
        return $this->read_at ? $this->read_at->format('d/m/Y H:i') : null;
    }
}
