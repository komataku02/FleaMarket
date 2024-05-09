<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category', 'condition', 'user_id'];

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
}
