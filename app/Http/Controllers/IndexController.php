<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Menu;
use App\Repositories\ArticleRepository;
use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends SiteController
{
    public function __construct(PortfolioRepository $p_rep, ArticleRepository $a_rep, ServiceRepository $s_rep, ProjectCategoryRepository $pc_rep)
    {
        parent::__construct(new MenusRepository(new Menu()), new ContactRepository(new Contact()));
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->s_rep = $s_rep;
        $this->pc_rep = $pc_rep;
        $this->template = 'index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function index()
    {
        $portfolios = $this->getPortfolio();
        $articles = $this->getArticles();
        $services = $this->getServices();
        $projectCategories = $this->getProjectCategories();
        $content = view('content', compact('portfolios', 'articles', 'services', 'projectCategories'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    protected function getProjectCategories()
    {
        $projectCategories = $this->pc_rep->get(
            ['name', 'slug'],
            '',
            config('settings.main_project_category_count')
        );

        return $projectCategories;
    }

    protected function getServices()
    {
        $services = $this->s_rep->get(
            ['name', 'short_desc', 'slug'],
            '',
            config('settings.main_services_count')
        );

        return $services;
    }

    protected function getArticles()
    {
        $articles = $this->a_rep->get(
            '*',
            'id,desc',
            config('settings.main_articles_count')
        );

        return $articles;
    }

    protected function getPortfolio()
    {
        $portfolio = $this->p_rep->get(
            '*',
            'show_main,desc',
            config('settings.main_portfolio_count')
        );

        if ($portfolio->isEmpty()) {
            return false;
        }

        $portfolio->transform(function ($item, $key) {
            $item->image = config('settings.portfolio_path') . '/' . $item->image;
            return $item;
        });

        return $portfolio;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
