<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Repositories\MenusRepository;
use Illuminate\Support\Arr;
use Lavary\Menu\Menu;

class SiteController extends Controller
{
    protected $p_rep;
    protected $a_rep;
    protected $m_rep;
    protected $c_rep;
    protected $s_rep;
    protected $pc_rep;

    protected $template;
    protected $vars = [];

    public function __construct(MenusRepository $m_rep, ContactRepository $c_rep)
    {
        $this->m_rep = $m_rep;
        $this->c_rep = $c_rep;
    }

    protected function renderOutput()
    {
        $menu = $this->getMenu();
        $contacts = $this->getContacts();
        $header = view('header', compact('menu', 'contacts'));
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

    protected function getContacts()
    {
        return $this->c_rep->get();
    }
}
