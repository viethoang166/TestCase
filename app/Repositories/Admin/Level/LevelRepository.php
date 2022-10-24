<?php

namespace App\Repositories\Admin\Level;

use App\Models\Level;
use App\Repositories\BaseRepository;

class LevelRepository extends BaseRepository implements LevelRepositoryInterface
{
    public function __construct(Level $model)
    {
        $this->model = $model;
    }
}
