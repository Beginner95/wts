<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    protected $p_rep;
    protected $a_rep;

    protected $template;
    protected $vars = [];

    public function __construct()
    {

    }

    protected function renderOutput()
    {
        return view($this->template)->with($this->vars);
    }
}
