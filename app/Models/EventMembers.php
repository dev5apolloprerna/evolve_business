<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMembers extends Model
{
    use HasFactory;
    public $table = 'event_members';
    protected $fillable = [
        'id',
        'event_id',
        'member_id',
        'created_at'
    ];
}
