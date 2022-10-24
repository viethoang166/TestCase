<?php

namespace App\Repositories\Admin\CoreValue;

use App\Models\CoreValue;
use App\Repositories\BaseRepository;

class CoreValueRepository extends BaseRepository implements CoreValueRepositoryInterface
{
    public function __construct(CoreValue $model)
    {
        $this->model = $model;
    }
}
