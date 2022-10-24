<?php

namespace App\Repositories\Admin\Course;

use App\Models\Course;
use App\Repositories\BaseRepository;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    public function __construct(Course $model)
    {
        $this->model = $model;
    }
}
