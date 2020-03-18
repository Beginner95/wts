<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Config;

abstract class Repository
{
    protected $model = false;

    public function get()
    {
        return $this->model->get();
    }
}