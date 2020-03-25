<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Menu;
use App\PostCategory;
use App\Repositories\ArticleRepository;
use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\DomCrawler\Crawler;

class BlogController extends SiteController
{
    public function __construct(ArticleRepository $a_rep, PostCategoryRepository $post_category_rep)
    {
        parent::__construct(new MenusRepository(new Menu()), new ContactRepository(new Contact()));
        $this->a_rep = $a_rep;
        $this->post_category_rep = $post_category_rep;
        $this->template = 'blog.index';
    }

    public function index($slug = false)
    {
        $articles = $this->getArticles($slug);
        $articles = !empty($articles) ? $articles->all() : null;
        $postCategories = $this->getPostCategories();
        $content = view('blog.articles', compact('articles', 'postCategories'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    protected function getPostCategories()
    {
        $postCategories = $this->post_category_rep->get(
            ['id', 'category', 'slug'],
            'id,asc',
            config('settings.blog_post_category_count')
        );

        return $postCategories;
    }

    protected function getArticles($slug = false)
    {
        $where = false;
        if($slug) {
            $category = PostCategory::select('id')->where('slug', $slug)->first();
            if (empty($category)) {
                $this->show($slug);
                return false;
            }
            $where = [['post_category_id', '=', $category->id]];
        }

        $articles = $this->a_rep->get(
            [
                'id',
                'meta_title', 'meta_description',
                'meta_keywords', 'title', 'slug',
                'main_cover', 'detail_cover',
                'short_desc', 'img_alt',
                'img_title', 'post_category_id'
            ],
            'created_at,DESC',
            config('settings.blog_articles_count'),
            $where
        );

        if ($articles) {
            $articles->load('category');
        }

        return $articles;
    }

    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                if (empty($request->slug)) {
                    $where = [['id', '<', $request->id]];
                } else {
                    $id = PostCategory::select('id')->where('slug', $request->slug)->first()->id;
                    $where = [['id', '<', $request->id], ['post_category_id', '=', $id]];
                }
                $articles = $this->a_rep->get(
                    [
                        'id', 'meta_title', 'meta_description',
                        'meta_keywords', 'title', 'slug',
                        'main_cover', 'detail_cover', 'short_desc', 'img_alt',
                        'img_title', 'post_category_id'
                    ],
                    'created_at,DESC',
                    config('settings.blog_load_more_count'),
                    $where
                );
            } else {
                $articles = $this->a_rep->get(
                    [
                        'id', 'meta_title', 'meta_description',
                        'meta_keywords', 'title', 'slug',
                        'main_cover', 'detail_cover', 'short_desc', 'img_alt',
                        'img_title', 'post_category_id'
                    ],
                    'created_at,DESC',
                    config('settings.blog_load_more_count')
                );
            }

            if ($articles) {
                $articles->load('category');
            }

            $output = '';
            $last_id = '';
            if (!$articles->isEmpty()) {
                foreach ($articles as $article) {
                    $style = '';
                    if (empty($article->main_cover)) {
                        $style = 'section_item-vacancy';
                    }
                    $output .= '<figure class="section_item ' .  $style .' ">';
                        if (!empty($article->main_cover)) {
                            $output .= '<picture class="section_item-img">
                                <source srcset="/images/' . $article->main_cover . '" type="image/webp">
                                <img src="/images/' . $article->main_cover . '" alt="">
                            </picture>';
                        }
                        $output .= '<p class="section_item-type">' . $article->category->category . '</p>
                        <h3 class="section_item-name">' . $article->title . '</h3>
                        <p class="section_item-description">' . $article->short_desc . '</p>
                    </figure>
                    ';
                    $last_id = $article->id;
                }
                $output .= '<input type="hidden" name="last-id" value="' . $last_id . '">';
                echo $output;
            } else {
                return response()->json();
            }
        }
    }

    public function loadMorePostCategories(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $postCategories = $this->post_category_rep->get(
                    ['id', 'category', 'slug'],
                    'id,asc',
                    config('settings.blog_post_category_count'),
                    [['id', '>', $request->id]]
                );
            } else {
                $postCategories = $this->post_category_rep->get(
                    ['id', 'category', 'slug'],
                    'id,asc',
                    config('settings.blog_post_category_count')
                );
            }
            $output = '';
            $last_post_category_id = '';
            if (!$postCategories->isEmpty()) {
                foreach ($postCategories as $postCategory) {
                    $output .= '<a href="' . route('blogCategory', ['slug' => $postCategory->slug]) . '"';
                    $output .= 'class="btn btn-bordered">' . $postCategory->category . '</a>';
                    $last_post_category_id = $postCategory->id;
                }
                $output .= '<input type="hidden" name="last-post-category-id" value="' . $last_post_category_id . '">';
                echo $output;
            } else {
                return response()->json();
            }
        }
    }

    public function show($slug = false)
    {
        $article = $this->a_rep->one($slug);
        $readingTime = $this->getReadingTime($article);
        $headings = $this->getHeadings($article);
        $content = view('blog.article', compact('article', 'readingTime', 'headings'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    protected function getReadingTime($article)
    {
        $countSymbol = mb_strlen($article->body);
        return round($countSymbol / 1500);
    }

    protected function getHeadings($article)
    {
        $crawler = new Crawler($article->body);
        $crawler = $crawler->filter('h2');
        $headings = [];
        foreach ($crawler as $domElement) {
            $headings[] = $domElement->nodeValue;
        }
        return $headings;
    }
}
