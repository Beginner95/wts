<?php

namespace App\Repositories;

use App\PostCategory;

class PostCategoryRepository extends Repository
{
    public function __construct(PostCategory $category)
    {
        $this->model = $category;
    }
}