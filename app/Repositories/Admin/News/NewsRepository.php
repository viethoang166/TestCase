<?php

namespace App\Repositories\Admin\News;

use App\Models\News;
use App\Repositories\BaseRepository;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function __construct(News $model)
    {
        $this->model = $model;
    }
}
