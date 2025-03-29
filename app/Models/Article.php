<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id', 'category_id', 'published_at'];

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
