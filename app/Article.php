<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category()
    {
        return $this->hasOne('App\PostCategory', 'id', 'post_category_id');
    }
}
