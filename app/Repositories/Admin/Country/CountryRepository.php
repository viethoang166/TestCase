<?php

namespace App\Repositories\Admin\Country;

use App\Models\Country;
use App\Repositories\BaseRepository;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}
