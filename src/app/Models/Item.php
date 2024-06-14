<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'condition',
        'image',];

    protected $appends = ['is_favorite'];

    // 商品一覧を取得するメソッド
    public static function getAllItems()
    {
        return self::all();
    }

    public function getDetailLinkAttribute()
    {
        return route('items.show', $this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getIsFavoriteAttribute()
    {
        return $this->favorites()->where('user_id', Auth::id())->exists();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_item');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
