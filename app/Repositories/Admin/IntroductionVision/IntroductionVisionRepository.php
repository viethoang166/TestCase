<?php

namespace App\Repositories\Admin\IntroductionVision;

use App\Models\IntroductionVision;
use App\Repositories\BaseRepository;

class IntroductionVisionRepository extends BaseRepository implements IntroductionVisionRepositoryInterface
{
    public function __construct(IntroductionVision $model)
    {
        $this->model = $model;
    }
}
