<?php

namespace App\Repositories\Admin\Customer;

use App\Models\Admin\Customer as AdminCustomer;
use App\Repositories\BaseRepository;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function __construct(AdminCustomer $model)
    {
        $this->model = $model;
    }
}
