<?php

namespace App\Repositories\Admin\Majors;

use App\Models\Majors;
use App\Repositories\BaseRepository;

class MajorsRepository extends BaseRepository implements MajorsRepositoryInterface
{
    public function __construct(Majors $model)
    {
        $this->model = $model;
    }
}
