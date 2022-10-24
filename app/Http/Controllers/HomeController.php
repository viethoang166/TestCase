<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Admin\News\NewsRepositoryInterface as NewsRepository;
use App\Repositories\Admin\Country\CountryRepositoryInterface as CountryRepository;
use App\Repositories\Admin\Level\LevelRepositoryInterface as LevelRepository;
use App\Repositories\Admin\Customer\CustomerRepositoryInterface as CustomerRepository;
use App\Repositories\Admin\ContactInfo\ContactInfoRepositoryInterface as ContactInfoRepository;
use App\Repositories\Admin\Feedback\FeedbackRepositoryInterface as FeedbackRepository;
use App\Repositories\Admin\User\UserRepository;
use App\Repositories\School\SchoolRepositoryInterface as SchoolRepository;
use App\Repositories\Admin\IntroductionSlide\IntroductionSlideRepository;
use App\Repositories\Admin\IntroductionAbout\IntroductionAboutRepository;
use App\Repositories\Admin\IntroductionVision\IntroductionVisionRepository;
use App\Repositories\Admin\IntroductionReward\IntroductionRewardRepository;
use App\Repositories\Admin\CoreValue\CoreValueRepository;
use App\Repositories\Admin\History\HistoryRepository;
use App\Repositories\Admin\HistoryDetail\HistoryDetailRepository;


class HomeController extends Controller
{
    protected $newsRepository;
    protected $customerRepository;
    protected $schoolRepository;
    protected $countryRepository;
    protected $levelRepository;
    protected $contactInfoRepository;
    protected $feedbackRepository;
    protected $introductionSlideRepository;
    protected $introductionAboutRepository;
    protected $introductionVisionRepository;
    protected $introductionRewardRepository;
    protected $coreValueRepository;
    protected $userRepository;
    protected $historyRepository;
    protected $historyDetailRepository;



    public function __construct(
        NewsRepository $newsRepository,
        CustomerRepository $customerRepository,
        SchoolRepository $schoolRepository,
        CountryRepository $countryRepository,
        LevelRepository $levelRepository,
        ContactInfoRepository $contactInfoRepository,
        FeedbackRepository $feedbackRepository,
        IntroductionSlideRepository $introductionSlideRepository,
        IntroductionAboutRepository $introductionAboutRepository,
        IntroductionVisionRepository $introductionVisionRepository,
        IntroductionRewardRepository $introductionRewardRepository,
        CoreValueRepository $coreValueRepository,
        UserRepository $userRepository,
        historyRepository $historyRepository,
        historyDetailRepository $historyDetailRepository,




    ) {
        $this->newsRepository = $newsRepository;
        $this->customerRepository = $customerRepository;
        $this->schoolRepository = $schoolRepository;
        $this->countryRepository = $countryRepository;
        $this->levelRepository = $levelRepository;
        $this->contactInfoRepository = $contactInfoRepository;
        $this->feedbackRepository = $feedbackRepository;
        $this->introductionSlideRepository = $introductionSlideRepository;
        $this->introductionAboutRepository = $introductionAboutRepository;
        $this->introductionVisionRepository = $introductionVisionRepository;
        $this->introductionRewardRepository = $introductionRewardRepository;
        $this->coreValueRepository = $coreValueRepository;
        $this->userRepository = $userRepository;
        $this->historyDetailRepository = $historyDetailRepository;
        $this->historyRepository = $historyRepository;




    }

    public function index()
    {
        return view('landing', [
            'countries' => $this->countryRepository->getAll(),
            'levels' => $this->levelRepository->getAll(),
            'schools' => $this->schoolRepository->getAll(),
        ]);
    }

    public function introduction()
    {
        return view('introduction', [
            'introductionSlides' => $this->introductionSlideRepository->getAll(),
            'introductionAbout' => $this->introductionAboutRepository->getAll()->first(),
            'introductionVision' => $this->introductionVisionRepository->getAll()->first(),
            'introductionRewards' => $this->introductionRewardRepository->getAll(),
            'coreValues' => $this->coreValueRepository->getAll(),
            'leaders' => $this->userRepository->query()->where('type', '!=', \App\Models\User::TYPES['advisor'])->get(),
            'advisors' => $this->userRepository->query()->where('type', '=', \App\Models\User::TYPES['advisor'])->get(),
            'history' => $this->historyRepository->getAll(),
            'historyDetails' => $this->historyDetailRepository->orderBy('year', 'ASC')->get(),



        ]);
    }

    public function storeContactInfo(Request $request)
    {
        $validatedData = $request->validate([
            'contact-info-name' => 'required',
            'contact-info-phone' => 'required|numeric|digits_between:9,11',
            'contact-info-email' => 'required|email',
            'contact-info-country_id' => 'required',
            'contact-info-level_id' => 'required',
        ]);
        $data = [
            'name' => $validatedData['contact-info-name'],
            'phone' => $validatedData['contact-info-phone'],
            'email' => $validatedData['contact-info-email'],
            'country_id' => $validatedData['contact-info-country_id'],
            'level_id' => $validatedData['contact-info-level_id'],
            'status' => \App\Models\ContactInfo::STATUS['Pending'],
        ];
        $this->contactInfoRepository->save($data);

        return redirect()->route('home')->with('message', 'Successful added');
    }

    public function storeFeedback(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'feedback-type' => 'required',
            'feedback-content' => 'required',
            'feedback-school_id' => 'required',
        ]);
        $data = [
            'type' => $validatedData['feedback-type'],
            'content' => $validatedData['feedback-content'],
            'status' => \App\Models\Feedback::STATUSES['private'],
            'customer_id' => Auth::user()->id,
            'school_id' => $validatedData['feedback-school_id'],
        ];

        $this->feedbackRepository->save($data);

        return redirect()->route('home')->with('message', 'Feedback submitted');
    }
}
