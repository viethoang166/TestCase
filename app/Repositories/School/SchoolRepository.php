<?php

namespace App\Repositories\School;

use App\Models\School;
use App\Repositories\BaseRepository;

class SchoolRepository extends BaseRepository implements SchoolRepositoryInterface
{
    public function __construct(School $model)
    {
        $this->model = $model;
    }
}
