<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Delivery;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot() {
        parent::boot();

        static::deleted(function ($user) {
            $user->orders->each(function ($order) {
                $order->delete();
            });

            $user->delivereases->each(function ($deliverease) {
                $deliverease->delete();
            });

            $user->comments->each(function ($comment) {
                $comment->delete();
            });

        });
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function delivereases(): HasMany {
        return $this->hasMany(Delivery::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

}
