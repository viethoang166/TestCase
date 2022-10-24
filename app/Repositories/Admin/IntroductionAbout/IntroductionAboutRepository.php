<?php

namespace App\Repositories\Admin\IntroductionAbout;

use App\Models\IntroductionAbout;
use App\Repositories\BaseRepository;

class IntroductionAboutRepository extends BaseRepository implements IntroductionAboutRepositoryInterface
{
    public function __construct(IntroductionAbout $model)
    {
        $this->model = $model;
    }
}
