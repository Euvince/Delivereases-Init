<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\DeliveryDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle',
        'user_id'
    ];

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function deliveryDetails(): HasOne {
        return $this->hasOne(DeliveryDetails::class, 'details_livraison_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
