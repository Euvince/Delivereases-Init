<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status',
        'user_id',
        'libelle',
        'orderDate',
        'totalPrice',
        'delivery_id',
        'deliveredDate',
    ];

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function delivery(): BelongsTo {
        return $this->belongsTo(Delivery::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
