<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_text', 'image', 'category_id'];

    public function category(){
        $this->belongsTo(Category::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }

    public function tags(){
        $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }
}
