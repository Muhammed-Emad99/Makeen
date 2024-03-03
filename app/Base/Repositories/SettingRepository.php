<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\SettingRepositoryInterface;
use App\Models\Setting;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    public function __construct(Setting $model)
    {
        return $this->model = $model;
    }

    public function updateSetting($data)
    {
        foreach ($data as $key => $value) {
            $this->model->where('key', $key)->update(['value' => $value]);
        }
        return response()->json();
    }


}
