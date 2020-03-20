<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Menu;
use App\Repositories\ArticleRepository;
use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class IndexController extends SiteController
{
    public function __construct(PortfolioRepository $p_rep, ArticleRepository $a_rep)
    {
        parent::__construct(new MenusRepository(new Menu()), new ContactRepository(new Contact()));
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
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
        $content = view('content', compact('portfolios', 'articles'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    protected function getArticles()
    {
        $articles = $this->a_rep->get(
            '*',
            'id,desc',
            Config::get('settings.main_articles_count')
        );

        return $articles;
    }

    protected function getPortfolio()
    {
        $portfolio = $this->p_rep->get(
            '*',
            'show_main,desc',
            Config::get('settings.main_portfolio_count')
        );

        if ($portfolio->isEmpty()) {
            return false;
        }

        $portfolio->transform(function ($item, $key) {
            $item->image = Config::get('settings.portfolio_path') . '/' . $item->image;
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
