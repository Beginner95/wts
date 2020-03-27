<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Menu;
use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;
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
        $selectedWorks = $this->getSelectedWorks();
        $content = view('portfolio.portfolios', compact('portfolios', 'selectedWorks'));
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

    protected function getSelectedWorks()
    {
        $portfolio = $this->p_rep->get(
            '*',
            'show_portfolio,asc',
            config('settings.main_portfolio_count'),
            [['show_portfolio', '!=', null]]
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

    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $works = $this->p_rep->get(
                    '*',
                    'show_portfolio,asc',
                    config('settings.main_portfolio_count'),
                    [['show_portfolio', null], ['id', '>', $request->id]]
                );
            } else {
                $works = $this->p_rep->get(
                    '*',
                    'show_portfolio,asc',
                    config('settings.main_portfolio_count'),
                    [['show_portfolio', null]]
                );
            }
            $output = '';
            $last_work_id = '';
            if (!$works->isEmpty()) {

                $works = $works->transform(function ($item, $key) {
                    $item->image = config('settings.portfolio_path') . '/' . $item->image;
                    return $item;
                });

                foreach ($works as $work) {
                    $output .= '
                        <figure class="section_item">
                            <picture class="section_item-img">
                                <source srcset="/images/{{ $selectedWork->image }}" type="image/webp">
                                <img src="/images/' . $work->image . '" alt="">
                            </picture>
                            <div class="d-flex section_item-top">
                                <p class="section_item-type">Онлайн-сервис + Приложение</p>
                                <p class="section_item-stack">Laravel + React.js + Python</p>
                            </div>
                            <div class="section_item-info">
                                <time class="section_item-year">' . $work->year . '</time>
                                <h3 class="section_item-name">' . $work->name . '</h3>
                                <p class="section_item-description">' . $work->description . '</p>
                            </div>
                        </figure>
                    ';
                    $last_work_id = $work->id;
                }
                $output .= '<input type="hidden" name="last-work-id" value="' . $last_work_id . '">';
                echo $output;
            } else {
                return response()->json();
            }
        }
    }
}
