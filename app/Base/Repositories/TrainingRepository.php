<?php

namespace App\Base\Repositories;


use App\Base\Interfaces\TrainingRepositoryInterface;
use App\Models\Training;

class TrainingRepository extends BaseRepository implements TrainingRepositoryInterface
{
    public function __construct(Training $model)
    {
        return $this->model = $model;
    }
}

