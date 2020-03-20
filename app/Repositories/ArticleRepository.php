<?php

namespace App\Repositories;


use App\Article;

class ArticleRepository extends Repository
{
    public function __construct(Article $article)
    {
        $this->model = $article;
    }
}