<?php

namespace App\Repositories\Admin\Contact;

use App\Models\Admin\Contact as AdminContact;
use App\Repositories\BaseRepository;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public function __construct(AdminContact $model)
    {
        $this->model = $model;
    }
}
