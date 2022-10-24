@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-fluid">
        <div>
            <h1 style="padding-left: 5px">Danh sách giải thưởng</h1>
            <a href="{{ route('introduction-reward.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add News</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center; width:5%" scope="col">STT</th>
                    <th style="text-align:center; width:10%" scope="col">Icon</th>
                    <th style="text-align:center; width:25%" scope="col">Title</th>
                    <th style="text-align:center; width:40%" scope="col">Description</th>
                    <th style="text-align:center; width:20%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($introductionRewards))
                    @foreach ($introductionRewards as $key => $introductionReward)
                        @php
                            $link = url('');
                            if ($image = Storage::get(\App\Models\IntroductionReward::ICON_PATH . $introductionReward->icon)) {
                                $link = 'data:image/png;base64, ' . base64_encode($image);
                            }
                        @endphp
                        <tr>
                            <td style="text-align:center">{{ $key+1 }}</td>
                            <td style="text-align:center"><img width="50px" src="{{ $link }}" alt=""></td>
                            <td style="text-align:center">{{ $introductionReward->title }}</td>
                            <td style="text-align:center">{{ $introductionReward->description }}</td>
                            <td style="text-align:center">
                                <a href="{{ route('introduction-reward.edit', $introductionReward->id) }}"
                                    class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post"
                                    action="{{ route('introduction-reward.destroy', $introductionReward->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if (!empty($introductionRewards))
            <div class="float-left">
                <strong>{{ 'Show ' . $introductionRewards->count() . ' in ' . App\Models\User::count() . ' entries' }}</strong>
            </div>
            {{ $introductionRewards->links() }}
        @endif
    </div>
@endsection
