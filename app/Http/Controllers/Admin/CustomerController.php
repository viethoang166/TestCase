<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\Admin\Customer\CustomerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return view('admin.customer.index', [
            'customers' => $this->customerRepository->orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $input = $request->all();
        if ($request->file('avata')) {
            $file = $request->file('avata');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/avatar'), $filename);
            $input['avata'] = "/uploads/avatar/" . $filename;
        }
        $input['password'] = bcrypt($input['password']);
        $this->customerRepository->save($input);
        return redirect()->route('customer.index')->with(
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
        if (! $customer = $this->customerRepository->findById($id)) {
            abort(404);
        }

        return view('admin.customer.form', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $data = $request->all();

        $get_image = $request->file('avata');

        if($get_image){   
            if(!empty($this->customerRepository->findById($id)->avata) && !empty($data['avata'])){
                unlink(public_path($this->customerRepository->findById($id)->avata));
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/avatar/', $new_image);
            $data['avata'] = "/uploads/avatar/" . $new_image; 
        }
        $data['password'] = bcrypt($data['password']);
        $this->customerRepository->save($data, ['id' => $id]);
        return redirect()->route('customer.index')->with(
            'success',
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
        if(!empty($this->customerRepository->findById($id)->avata)){
            unlink(public_path($this->customerRepository->findById($id)->avata));
        }

        $this->customerRepository->deleteById($id);

        return redirect()->route('customer.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }

    public function changeActive(Request $request)
    {
        $input = $request->all();
        if (! $customer = $this->customerRepository->findById($input['id'])) {
            abort(404);
        }
        $this->customerRepository->save($input, ['id' => $input['id']]);
        return redirect()->route('customer.index')->with(
            'success',
            'Edit active successfully.'
        );
    }
}