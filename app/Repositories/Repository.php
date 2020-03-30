<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model = false;

    public function get($select = '*', $orderBy = false, $take = false, $where = false, $withCount = false, $whereHas = false)
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

        if ($whereHas) {
            $builder->whereHas($whereHas[0], function($q) use ($whereHas) {
                return $q->where($whereHas[1], '=', $whereHas[2]);
            });
        }

        return $builder->get();
    }

    public function one($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}