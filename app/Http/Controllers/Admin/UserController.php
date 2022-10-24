<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Repositories\Admin\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.user.index', [
            'users' => $this->userRepository->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.user.form');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('avata')) {
            $file = $request->file('avata');
            $originalName = explode('.', $file->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];

            $file->storeAs('admin/avatar/', $filename);
            $data['avata'] = $filename;
        }

        $this->userRepository->save($data);

        return redirect()->route('user.index')->with(
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
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }

        return view('admin.user.form', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app\\admin\\avatar\\');

        $data = $request->all();

        if($request->hasFile('avata')){
            $file = $request->file('avata');
            $originalName = explode('.', $file->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];
            $file->storeAs('admin/avatar/', $filename);

            if(!empty($user->avata)){
                unlink($filePath . $user->avata);
            }
            $data['avata'] = $filename;
        }
        $this->userRepository->save($data, ['id' => $id]);

        return redirect()->route('user.index')->with(
            'success',
            'Edit completed successfully.'
        );
    }

    public function destroy($id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app\\admin\\avatar\\');

        if(!empty($user->avata)){
            unlink($filePath . $user->avata);
        }
        $this->userRepository->deleteById($id);

        return redirect()->route('user.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }

    public function changeActive(Request $request)
    {
        $input = $request->all();
        if (! $user = $this->userRepository->findById($input['id'])) {
            abort(404);
        }
        $this->userRepository->save($input, ['id' => $input['id']]);
        return redirect()->route('user.index')->with(
            'success',
            'Edit active successfully.'
        );
    }
}
