<?php

namespace App\Repositories\Admin\Scholarship;

use App\Models\Scholarship;
use App\Repositories\BaseRepository;

class ScholarshipRepository extends BaseRepository implements ScholarshipRepositoryInterface
{
    public function __construct(Scholarship $model)
    {
        $this->model = $model;
    }
}
