<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\SliderRepositoryInterface;
use App\Models\Slider;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    public function __construct(Slider $model)
    {
        return $this->model = $model;
    }
}

