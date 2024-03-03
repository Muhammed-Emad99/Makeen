<?php

namespace App\Base\Interfaces;

interface BaseRepositoryInterface
{
    public function getAll();
    public function getWhere(array $data);

    public function paginate($orderBy, $limit = 10);

    public function create(array $data);

    public function update(array $data, $id);

    public function updateWhere(array $data, array $data2);

    public function delete($id);

    public function deleteWhere(array $data);

    public function find($id);

    public function findBy($field, $value);

    public function findByFieldWhere($field, $value,array $data);

    public function limit($orderBy, $limit = 10);


}
