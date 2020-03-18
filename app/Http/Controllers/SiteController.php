<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use Illuminate\Support\Arr;
use Lavary\Menu\Menu;

class SiteController extends Controller
{
    protected $p_rep;
    protected $a_rep;
    protected $m_rep;

    protected $template;
    protected $vars = [];

    public function __construct(MenusRepository $m_rep)
    {
    $this->m_rep = $m_rep;
    }

    protected function renderOutput()
    {
        $menu = $this->getMenu();
        $header = view('header')->with('menu', $menu)->render();
        $this->vars = Arr::add($this->vars, 'header', $header);
        return view($this->template)->with($this->vars);
    }

    protected function getMenu()
    {
        $menu = $this->m_rep->get();
        $menuBuilder = (new Menu)->make('MyNav', function ($m) use ($menu) {
            foreach ($menu as $item) {
                if ($item->parent_id === null) {
                    $m->add($item->title, $item->path)->id($item->id);
                } else {
                    if ($m->find($item->parent_id)) {
                        $m->find($item->parent_id)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });

        return $menuBuilder;
    }
}
