<?php

namespace App\Base\Repositories;


use App\Base\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public function __construct(Contact $model)
    {
        return $this->model = $model;
    }


}
