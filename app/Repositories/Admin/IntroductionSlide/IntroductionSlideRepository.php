<?php

namespace App\Repositories\Admin\IntroductionSlide;

use App\Models\IntroductionSlide;
use App\Repositories\BaseRepository;

class IntroductionSlideRepository extends BaseRepository implements IntroductionSlideRepositoryInterface
{
    public function __construct(IntroductionSlide $model)
    {
        $this->model = $model;
    }
}
