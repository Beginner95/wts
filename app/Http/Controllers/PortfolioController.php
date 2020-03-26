<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Menu;
use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfolioRepository;
use Illuminate\Support\Arr;

class PortfolioController extends SiteController
{
    public function __construct(PortfolioRepository $p_rep)
    {
        parent::__construct(new MenusRepository(new Menu()), new ContactRepository(new Contact()));
        $this->p_rep = $p_rep;
        $this->template = 'portfolio.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = $this->getPortfolios();
        $content = view('portfolio.portfolios', compact('portfolios'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    protected function getPortfolios()
    {
        $portfolio = $this->p_rep->get(
            '*',
            'show_main,desc',
            config('settings.main_portfolio_count'),
            [['show_main', null], ['show_portfolio', null]]
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
}
