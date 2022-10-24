<?php

namespace App\Repositories\Admin\Feedback;

use App\Models\Feedback as AdminFeedback;
use App\Repositories\BaseRepository;

class FeedbackRepository extends BaseRepository implements FeedbackRepositoryInterface
{
    public function __construct(AdminFeedback $model)
    {
        $this->model = $model;
    }
}
