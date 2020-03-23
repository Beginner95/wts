<?php

namespace App\Repositories;

use App\ProjectCategory as ProjectCat;

class ProjectCategoryRepository extends Repository
{
    public function __construct(ProjectCat $projectCategory)
    {
        $this->model = $projectCategory;
    }
}