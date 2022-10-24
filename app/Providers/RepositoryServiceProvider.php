<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Customer\CustomerRepositoryInterface::class,
            \App\Repositories\Customer\CustomerRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\Country\CountryRepositoryInterface::class,
            \App\Repositories\Admin\Country\CountryRepository::class

        );

        $this->app->singleton(
            \App\Repositories\Admin\City\CityRepositoryInterface::class,
            \App\Repositories\Admin\City\CityRepository::class

        );

        $this->app->singleton(
            \App\Repositories\Admin\Customer\CustomerRepositoryInterface::class,
            \App\Repositories\Admin\Customer\CustomerRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\News\NewsRepositoryInterface::class,
            \App\Repositories\Admin\News\NewsRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\Image_news\Image_newsRepositoryInterface::class,
            \App\Repositories\Admin\Image_news\Image_newsRepository::class
        );

        $this->app->singleton(
            \App\Repositories\School\SchoolRepositoryInterface::class,
            \App\Repositories\School\SchoolRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ImageSchool\ImageSchoolRepositoryInterface::class,
            \App\Repositories\ImageSchool\ImageSchoolRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\Majors\MajorsRepositoryInterface::class,
            \App\Repositories\Admin\Majors\MajorsRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\Course\CourseRepositoryInterface::class,
            \App\Repositories\Admin\Course\CourseRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\Scholarship\ScholarshipRepositoryInterface::class,
            \App\Repositories\Admin\Scholarship\ScholarshipRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Level\LevelRepositoryInterface::class,
            \App\Repositories\Admin\Level\LevelRepository::class
        );
        
        $this->app->singleton(
            \App\Repositories\Admin\ContactInfo\ContactInfoRepositoryInterface::class,
            \App\Repositories\Admin\ContactInfo\ContactInfoRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\Feedback\FeedbackRepositoryInterface::class,
            \App\Repositories\Admin\Feedback\FeedbackRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\IntroductionSlide\IntroductionSlideRepositoryInterface::class,
            \App\Repositories\Admin\IntroductionSlide\IntroductionSlideRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\IntroductionAbout\IntroductionAboutRepositoryInterface::class,
            \App\Repositories\Admin\IntroductionAbout\IntroductionAboutRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\CoreValue\CoreValueRepositoryInterface::class,
            \App\Repositories\Admin\CoreValue\CoreValueRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\History\HistoryRepositoryInterface::class,
            \App\Repositories\Admin\History\HistoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\IntroductionVision\IntroductionVisionRepositoryInterface::class,
            \App\Repositories\Admin\IntroductionVision\IntroductionVisionRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Admin\IntroductionReward\IntroductionRewardRepositoryInterface::class,
            \App\Repositories\Admin\IntroductionReward\IntroductionRewardRepository::class
        );
        
        $this->app->singleton(
            \App\Repositories\Admin\HistoryDetail\HistoryDetailRepositoryInterface::class,
            \App\Repositories\Admin\HistoryDetail\HistoryDetailRepository::class
        );
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
