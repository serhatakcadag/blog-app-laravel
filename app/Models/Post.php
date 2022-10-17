<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'categories', 'photo', 'content'];
    public function scopeFilter($query, array $filters)
    {
          if ($filters['categories'] ?? false) {
            $query->where('categories', 'like', '%'. request('categories') . '%');
          }

          if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%'. request('search') . '%')
            ->orWhere('content', 'like', '%'. request('search') . '%')
            ->orWhere('categories', 'like', '%'. request('search') . '%');
          }
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
