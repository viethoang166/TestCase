<?php

namespace App\Repositories\Admin\IntroductionReward;

use App\Models\IntroductionReward;
use App\Repositories\BaseRepository;

class IntroductionRewardRepository extends BaseRepository implements IntroductionRewardRepositoryInterface
{
    public function __construct(IntroductionReward $model)
    {
        $this->model = $model;
    }
}
