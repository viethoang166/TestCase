<?php

namespace App\Repositories\Admin\City;

use App\Models\City;
use App\Repositories\BaseRepository;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $model)
    {
        $this->model = $model;
    }
}
