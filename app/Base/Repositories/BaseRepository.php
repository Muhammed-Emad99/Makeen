<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->all();
    }

    public function getWhere($data)
    {
        return $this->model->where($data)->pluck('value');
    }

    public function paginate($orderBy, $limit = 10)
    {
        return $this->model->orderBy($orderBy)->paginate($limit);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function updateWhere(array $data, array $data2)
    {
        return $this->model->where($data)->update($data2);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function deleteWhere(array $data)
    {
        return $this->model->where($data)->delete();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findBy($field, $value)
    {
        return $this->model->where($field, $value)->first();
    }

    public function findByFieldWhere($field, $value,array $data)
    {
        return $this->model->where($data)->where($field, $value)->first();
    }

    public function limit($orderBy, $limit = 10)
    {
        return $this->model->orderBy($orderBy)->limit($limit)->get();
    }
}
