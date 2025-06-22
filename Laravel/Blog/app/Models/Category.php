<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'author_id',
        'description',
        'category_author',
        'image',
    ];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
