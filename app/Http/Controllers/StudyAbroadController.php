<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\Country\CountryRepositoryInterface as CountryRepository;
use App\Repositories\School\SchoolRepositoryInterface as SchoolRepository;

class StudyAbroadController extends Controller
{
    protected $countryRepository;
    protected $schoolRepository;

    public function __construct( CountryRepository $countryRepository, SchoolRepository $schoolRepository)
    {

        $this->countryRepository = $countryRepository;
        $this->schoolRepository = $schoolRepository;
    }

    public function showCountry(string $countryCode)
    {
        if (! $country = $this->countryRepository->query()->where('code', 'LIKE', '%'.$countryCode.'%')->first()) {
            abort(404);
        }

        return view('studyabroad.'.$countryCode, [
            'country' => $country,
        ]);
    }
}
