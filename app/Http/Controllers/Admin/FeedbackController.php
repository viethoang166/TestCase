<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeedbackRequest;
use App\Models\Admin\Customer;
use App\Models\Feedback;
use App\Models\School;
use App\Repositories\Admin\Customer\CustomerRepository;
use App\Repositories\Admin\Feedback\FeedbackRepository;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $feedbackRepository;
    protected $customerRepository;

    public function __construct(FeedbackRepository $feedbackRepository, CustomerRepository $customerRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return view('admin.feedback.index', [
            'feedbacks' => $this->feedbackRepository->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('admin.feedback.form')
        ->with('customers', $this->customerRepository->getAll())
        ->with('schools', $schools);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $this->feedbackRepository->save($request->validated());
        return redirect()->route('feedback.index')->with(['message' => __('Success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! $feedback = $this->feedbackRepository->findById($id)) {
            abort(404);
        }
        $customer = Customer::all();
        $schools = School::all();
        return view('admin.feedback.form')
        ->with('feedback', $feedback)
        ->with('customers', $customer)
        ->with('schools', $schools);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeedbackRequest $request, $id)
    {
        $this->feedbackRepository->save($request->validated(), ['id' => $id]);
        return redirect()->route('feedback.index')->with(['message' => __('Success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($this->feedbackRepository->findById($id)->avata)){
            unlink(public_path($this->feedbackRepository->findById($id)->avata));
        }

        $this->feedbackRepository->deleteById($id);

        return redirect()->route('feedback.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }

    public function changeStatus(Request $request, $id)
    {
        if (! $feedback = $this->feedbackRepository->findById($id)) {
            abort(404);
        }
        $feedback->status = ($feedback->status + 1 < count(\App\Models\Feedback::STATUSES)) ? ($feedback->status + 1) : 0;
        $feedback->save();

        return redirect()->route('feedback.index');
    }
}