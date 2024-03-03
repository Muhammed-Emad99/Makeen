<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\ServiceRepositoryInterface;
use App\Models\Service;
use \Models\Slider;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    public function __construct(Service $model)
    {
        return $this->model = $model;
    }
}

