<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    protected static function boot() {
        parent::boot();

        static::deleted(function ($category) {
            $category->subCategories->each(function ($subCategory) {
                $subCategory->delete();
            });
        });
    }

    public function subCategories(): HasMany {
        return $this->hasMany(SubCategory::class);
    }

}
