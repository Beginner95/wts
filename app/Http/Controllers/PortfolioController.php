<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Menu;
use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Stack;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PortfolioController extends SiteController
{
    public function __construct(PortfolioRepository $p_rep, ProjectCategoryRepository $pc_rep)
    {
        parent::__construct(new MenusRepository(new Menu()), new ContactRepository(new Contact()));
        $this->p_rep = $p_rep;
        $this->pc_rep = $pc_rep;
        $this->template = 'portfolio.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = !empty($request->sort) ? $request->sort : false;
        $stack = !empty($request->stack) ? $request->stack : false;
        $category = !empty($request->category) ? $request->category : false;

        $stacks = $this->getStacks();
        $projectCategories = $this->getCategory();
        $portfolios = $this->getPortfolios($sort, $stack, $category);
        $selectedWorks = $this->getSelectedWorks();
        $content = view('portfolio.portfolios', compact(
            'portfolios',
            'selectedWorks',
            'stacks',
            'projectCategories'
        ));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    protected function getPortfolios($sort = false, $stack = false, $category = false)
    {
        $whereHas = false;
        if ($sort) {
            $sort = 'year,'. $sort;
        }

        if ($stack) {
            $whereHas = ['stacks', 'slug', $stack];
        }

        if ($category) {
            $whereHas = ['categories', 'slug', $category];
        }

        $portfolio = $this->p_rep->get(
            '*',
            $sort,
            config('settings.main_portfolio_count'),
            [['show_main', null], ['show_portfolio', null]],
            false,
            $whereHas
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
                                <p class="section_item-type">';
                                    if($work->categories) {
                                        foreach($work->categories as $category) {
                                            $output .= '<span class="icon-plus">' . $category->name . '</span>';
                                        }
                                    }
                                $output .= '</p>
                                <p class="section_item-stack">';
                                    if ($work->stacks) {
                                        foreach($work->stacks as $stack) {
                                            $output .= '<span class="icon-plus">' . $stack->name . '</span>';
                                        }
                                    }
                                $output .= '</p>
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

    protected function getStacks()
    {
        $stacks = Stack::get();
        $mobiles = [];
        $frontends = [];
        $backends = [];
        $frameworks = [];
        $cms = [];
        foreach ($stacks as $stack) {
            if (!empty($stack->mobile)) {
                $mobiles[] = $stack;
            }

            if (!empty($stack->frontend)) {
                $frontends[] = $stack;
            }

            if (!empty($stack->backend)) {
                $backends[] = $stack;
            }

            if (!empty($stack->framework)) {
                $frameworks[] = $stack;
            }

            if (!empty($stack->cms)) {
                $cms[] = $stack;
            }
        }

        return [
            'mobiles' => $mobiles,
            'frontends' => $frontends,
            'backends' => $backends,
            'frameworks' => $frameworks,
            'cms' => $cms
        ];
    }

    protected function getCategory()
    {
        $projectCategories = $this->pc_rep->get(
            ['name', 'slug'],
            '',
            false,
            false,
            'projects'

        );

        return $projectCategories;
    }
}
