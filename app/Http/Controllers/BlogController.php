<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Menu;
use App\Repositories\ArticleRepository;
use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use App\Repositories\ProjectCategory;
use Illuminate\Support\Arr;

class BlogController extends SiteController
{
    public function __construct(ArticleRepository $a_rep, ProjectCategory $pc_rep)
    {
        parent::__construct(new MenusRepository(new Menu()), new ContactRepository(new Contact()));
        $this->a_rep = $a_rep;
        $this->pc_rep = $pc_rep;
        $this->template = 'blog.index';
    }

    public function index()
    {
        $articles = $this->getArticles();
        $articles = !empty($articles) ? $articles->all() : null;
        $content = view('blog.articles', compact('articles'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    protected function getArticles($slug = false)
    {
        $articles = $this->a_rep->get(
            [
                'meta_title', 'meta_description',
                'meta_keywords', 'title', 'slug',
                'main_cover', 'detail_cover',
                'short_desc', 'img_alt',
                'img_title', 'post_category_id'
            ],
            false,
            config('settings.blog_articles_count')
        );

        return $articles;
    }
}
