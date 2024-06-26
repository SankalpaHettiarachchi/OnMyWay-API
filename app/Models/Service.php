<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',	
        'vehicle_id',	
        'start',
        'destination',	
        'current',	
        'status',
    ];					

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
