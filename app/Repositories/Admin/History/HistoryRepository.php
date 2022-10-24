<?php

namespace App\Repositories\Admin\History;

use App\Models\History;
use App\Repositories\BaseRepository;

class HistoryRepository extends BaseRepository implements HistoryRepositoryInterface
{
    public function __construct(History $model)
    {
        $this->model = $model;
    }
}
