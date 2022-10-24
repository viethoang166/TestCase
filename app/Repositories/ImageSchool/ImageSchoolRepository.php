<?php

namespace App\Repositories\ImageSchool;

use App\Models\ImageSchool;
use App\Repositories\BaseRepository;

class ImageSchoolRepository extends BaseRepository implements ImageSchoolRepositoryInterface
{
    public function __construct(ImageSchool $model)
    {
        $this->model = $model;
    }
}
