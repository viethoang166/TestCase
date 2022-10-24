<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeedbackRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Admin\Customer;
use App\Models\School;
use App\Models\Service;
use App\Repositories\Admin\Service\ServiceRepository;
use App\Repositories\Admin\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $serviceRepository;
    protected $userRepository;

    public function __construct(ServiceRepository $serviceRepository, UserRepository $userRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.service.index', [
            'services' => $this->serviceRepository->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.form')
        ->with('user_id', Auth::id());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $input = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/images'), $filename);
            $input['image'] = "/storage/images/" . $filename;
        }
        $this->serviceRepository->save($input);
        return redirect()->route('service.index')->with(
            'success',
            'Creation completed successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if (! $service = $this->serviceRepository->findById($id)) {
        //     abort(404);
        // }
        // return view('services.post')
        // ->with('service', $service);
    }

    public function post($id)
    {
        if (! $service = $this->serviceRepository->findById($id)) {
            abort(404);
        }
        return view('services.post')
        ->with('service', $service);
    }

    public function list()
    {
        $service = Service::where('active', 1)->get();
        return view('services.index', [
            'services' => $service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! $service = $this->serviceRepository->findById($id)) {
            abort(404);
        }
        return view('admin.service.form')
        ->with('service', $service)
        ->with('user_id', Auth::id());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $data = $request->all();

        $get_image = $request->file('image');

        if($get_image){   
            if(!empty($this->serviceRepository->findById($id)->image) && !empty($data['image'])){
                unlink(public_path($this->serviceRepository->findById($id)->image));
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('storage/images/', $new_image);
            $data['image'] = "/storage/images/" . $new_image; 
        }
        $this->serviceRepository->save($data, ['id' => $id]);
        return redirect()->route('service.index')->with(
            'message',
            'Edit completed successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($this->serviceRepository->findById($id)->image)){
            unlink(public_path($this->serviceRepository->findById($id)->image));
        }

        $this->serviceRepository->deleteById($id);

        return redirect()->route('service.index')->with(
            'message',
            'Deletion completed successfully.'
        );
    }

    public function changeStatus(Request $request)
    {
        $input = $request->all();
        if (! $service = $this->serviceRepository->findById($input['id'])) {
            abort(404);
        }
        $this->serviceRepository->save($input, ['id' => $input['id']]);
        return redirect()->route('service.index')->with(['message' => __('Success')]);
    }
}