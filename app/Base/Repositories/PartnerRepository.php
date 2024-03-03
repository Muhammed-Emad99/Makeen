<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\PartnerRepositoryInterface;
use App\Models\Partner;

class PartnerRepository extends BaseRepository implements PartnerRepositoryInterface
{
    public function __construct(Partner $model)
    {
        $this->model = $model;
    }

}

