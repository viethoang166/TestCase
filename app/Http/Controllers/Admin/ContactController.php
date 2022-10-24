<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Models\Admin\Contact;
use App\Repositories\Admin\Contact\ContactRepository;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        if (!$contact = $this->contactRepository->findById(1)) {
            abort(404);
        }
        return view('contacts.index')->with('contact', $contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$contact = $this->contactRepository->findById($id)) {
            abort(404);
        }
        return view('admin.contact.form')->with('contact', $contact)->with('show', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$contact = $this->contactRepository->findById($id)) {
            abort(404);
        }
        return view('admin.contact.form')->with('contact', $contact)->with('edit', true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $input = $request->all();
        if ($request->file('image')) {
            if (!empty($this->contactRepository->findById($id)->image) && file_exists(public_path($this->contactRepository->findById($id)->image))) {
                unlink(public_path($this->contactRepository->findById($id)->image));
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/images'), $filename);
            $input['image'] = "/uploads/images/" . $filename;
        }
        $this->contactRepository->save($input, ['id' => $id]);
        return redirect()->route('contact.show', 1)->with(['message' => __('Success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
