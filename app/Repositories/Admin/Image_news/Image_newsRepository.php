<?php

namespace App\Repositories\Admin\Image_news;

use App\Models\Image_news;
use App\Repositories\BaseRepository;

class Image_newsRepository extends BaseRepository implements Image_newsRepositoryInterface
{
    public function __construct(Image_news $model)
    {
        $this->model = $model;
    }
}
