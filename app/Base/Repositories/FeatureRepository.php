<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\FeatureRepositoryInterface;
use App\Models\Feature;

class FeatureRepository extends BaseRepository implements FeatureRepositoryInterface
{
    public function __construct(Feature $model)
    {
        $this->model = $model;
    }
}

