<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model = false;

    public function get($select = '*', $orderBy = false, $take = false, $where = false)
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

        return $builder->get();
    }
}