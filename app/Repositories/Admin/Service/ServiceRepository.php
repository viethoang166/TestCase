<?php

namespace App\Repositories\Admin\Service;

use App\Models\Service as AdminFeedback;
use App\Repositories\BaseRepository;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    public function __construct(AdminFeedback $model)
    {
        $this->model = $model;
    }
}
