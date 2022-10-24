<?php

namespace App\Repositories\Admin\ContactInfo;

use App\Models\ContactInfo;
use App\Repositories\BaseRepository;

class ContactInfoRepository extends BaseRepository implements ContactInfoRepositoryInterface
{
    public function __construct(ContactInfo $model)
    {
        $this->model = $model;
    }
}
