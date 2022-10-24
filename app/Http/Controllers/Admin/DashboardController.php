<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\ContactInfo\ContactInfoRepository;
use App\Repositories\Admin\News\NewsRepository;
use App\Repositories\Admin\Customer\CustomerRepository;
use App\Repositories\School\SchoolRepository;

class DashboardController extends Controller
{
    protected $contactInfoRepository;
    protected $newsRepository;
    protected $customerRepository;
    protected $schoolRepository;

    public function __construct(ContactInfoRepository $contactInfoRepository, NewsRepository $newsRepository, CustomerRepository $customerRepository, SchoolRepository $schoolRepository)
    {
        $this->contactInfoRepository = $contactInfoRepository;
        $this->newsRepository = $newsRepository;
        $this->customerRepository = $customerRepository;
        $this->schoolRepository = $schoolRepository;
    }

    public function index()
    {
        return view('admin.dashboard', [
            'contactInfos' => $this->contactInfoRepository->getAll(),
            'news' => $this->newsRepository->getAll(),
            'customers' => $this->customerRepository->getAll(),
            'schools' => $this->schoolRepository->getAll()
        ]);
    }
}
