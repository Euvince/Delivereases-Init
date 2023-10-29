<?php

namespace App\Models;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client',
        'livreur',
        'dateLivraison',
    ];

    public function Delivery(): BelongsTo {
        return $this->belongsTo(Delivery::class);
    }

}
