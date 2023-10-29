<?php

namespace App\Models;

use App\Models\Order;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\Admin\ArticleFormRequest;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'price',
        'image',
        'status',
        'rating',
        'order_id',
        'isPopular',
        'description'
    ];

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public static function callWhenCreatingProduct(self $article, ArticleFormRequest $request): array
    {
        $data = $request->validated();
        if(array_key_exists('image', $data)) {
            $imageCollection = $data['image'];
            $data['image'] = $imageCollection->storeAs('ArticlesImages', $request->file('image')->getClientOriginalName() ,'public');
            $imagePath = 'public/' . $article->image;
            if(Storage::exists($imagePath)) Storage::delete('public/' . $article->image);
            return $data;
        }
    }

}
