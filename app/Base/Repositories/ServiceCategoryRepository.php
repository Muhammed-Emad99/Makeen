<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\ServiceCategoryRepositoryInterface;
use App\Models\Category;

class ServiceCategoryRepository extends BaseRepository implements ServiceCategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        return $this->model = $model;
    }
}

