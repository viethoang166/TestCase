<?php

namespace App\Repositories;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function query()
    {
        return $this->model->query();
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function getAll(array $input = [])
    {
        return $this->model->all();
    }

    public function paginate(array $input = [], $perPage = 10)
    {
        $query = $this->model->query();

        return $query->paginate($perPage);
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->model->updateOrCreate($conditions, $inputs);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function deleteById($id)
    {
        return $this->model->destroy($id);
    }

    public function orderBy($column, $param)
    {
        $query = $this->model->query();

        return $query->orderBy($column, $param);
    }

}
