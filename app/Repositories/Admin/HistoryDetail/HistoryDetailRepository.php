<?php

namespace App\Repositories\Admin\HistoryDetail;

use App\Models\HistoryDetail;
use App\Repositories\BaseRepository;

class HistoryDetailRepository extends BaseRepository implements HistoryDetailRepositoryInterface
{
    public function __construct(HistoryDetail $model)
    {
        $this->model = $model;
    }
}
