<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IntroductionReward;
use App\Repositories\Admin\IntroductionReward\IntroductionRewardRepository;

class IntroductionRewardController extends Controller
{
    protected $introductionRewardRepository;

    public function __construct(IntroductionRewardRepository $introductionRewardRepository)
    {
        $this->introductionRewardRepository = $introductionRewardRepository;
    }

    public function index()
    {
        return view('admin.introduction-reward.index', [
            'introductionRewards' => $this->introductionRewardRepository->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.introduction-reward.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $file = $request->file('icon');
        $extension = current(array_slice(explode('.', $file->getClientOriginalName()), -1));
        $fileName = uniqid() . '.' . $extension;
        $file->storeAs(IntroductionReward::ICON_PATH, $fileName);
        $data['icon'] = $fileName;
        $this->introductionRewardRepository->save($data);

        return redirect()->route('introduction-reward.index')->with(
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
        if (! $introductionReward = $this->introductionRewardRepository->findById($id)) {
            abort(404);
        }

        return view('admin.introduction-reward.form', [
            'isShow' => true,
            'introductionReward' => $introductionReward,
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
        if (! $introductionReward = $this->introductionRewardRepository->findById($id)) {
            abort(404);
        }

        return view('admin.introduction-reward.form', [
            'introductionReward' => $introductionReward,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! $introductionReward = $this->introductionRewardRepository->findById($id)) {
            abort(404);
        }

        $data = $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $data['icon'] = $introductionReward->icon;
        if ($request->hasFile('icon')){
            $filePath = storage_path('app' . DIRECTORY_SEPARATOR . IntroductionReward::ICON_PATH . $introductionReward->icon);
            if (is_file($filePath)) unlink($filePath);

            $file = $request->file('icon');
            $extension = current(array_slice(explode('.', $file->getClientOriginalName()), -1));
            $fileName = uniqid() . '.' . $extension;
            $file->storeAs(IntroductionReward::ICON_PATH, $fileName);
            $data['icon'] = $fileName;
        }
        $this->introductionRewardRepository->save($data, ['id' => $id]);

        return redirect()->route('introduction-reward.index')->with(
            'success',
            'Update completed successfully.'
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
        if (! $introductionReward = $this->introductionRewardRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app' . DIRECTORY_SEPARATOR . IntroductionReward::ICON_PATH . $introductionReward->icon);
        if (is_file($filePath)) unlink($filePath);
        $this->introductionRewardRepository->deletebyID($id);

        return redirect()->route('introduction-reward.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }
}
