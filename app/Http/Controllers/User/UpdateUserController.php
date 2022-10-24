<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Customer\CustomerRepositoryInterface as CustomerRepository;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class UpdateUserController extends Controller
{
    protected $customerRepository;

    public function __construct( CustomerRepository $customerRepository )
    {
        $this->customerRepository = $customerRepository;
    }
    public function edit($id)
    {
        if (! $customer = $this->customerRepository->findById($id)) {
            abort(404);
        }

        return view('users.edit', [
            'user' => $customer,
            'isShow' => false,
        ]);
    }

    public function update(Request $request, $id)
    {
        if (! $user = $this->customerRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('user\\avatar\\');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required'],
            'avata' => 'nullable',
            'phone' => ['required'],
            'address' => ['required'],
            'age' => 'required|numeric|max:99|min:1',
            'sex' => 'required',
        ]);
        $data = $request->all();

        if($request->hasFile('avata')){
            $file = $request->file('avata');
            $originalName = explode('.', $file->getClientOriginalName());
            $name = $originalName[0];
            $filename = $request->file('avata')->store('/user/avatar');
            if(!empty($user->avata)){
                unlink($filePath . $user->avata);
            }
            $data['avata'] = $filename;
        }
        $this->customerRepository->save($data, ['id' => $id]);

        return redirect()->route('users.edit',$id)->with(
            'success',
            'Edit completed successfully.'
        );
    }


    public function index()
    {

    }
    public function create()
    {

    }

    public function show($id)
    {
        //
    }
    public function destroy($id)
    {

    }
}
