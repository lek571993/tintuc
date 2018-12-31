<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'author', 'intro', 'full', 'image', 'status', 'cate_id', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function cate() {
        return $this->belongsTo('App\Category');
    }
}
