<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model = false;

    public function get($select = '*', $orderBy = false, $take = false, $where = false, $withCount = false)
    {
        $builder = $this->model->select($select);

        if ($orderBy) {
            list($column, $val) = explode(',', $orderBy);
            $builder->orderBy($column, $val);
        }

        if ($take) {
            $builder->take($take);
        }

        if ($where) {
            $builder->where($where);
        }

        if ($withCount) {
            $builder->withCount($withCount);
        }

        return $builder->get();
    }

    public function one($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}