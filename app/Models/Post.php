<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'body','slug','status','type','author_id'];

    public $translatable = ['title', 'body'];

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }
}
