<?php

namespace App\Repositories;

use App\ProjectCategory as ProjectCat;

class ProjectCategory extends Repository
{
    public function __construct(ProjectCat $projectCategory)
    {
        $this->model = $projectCategory;
    }
}