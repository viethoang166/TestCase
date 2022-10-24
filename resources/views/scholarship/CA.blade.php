@extends('layout.master')
@section('main')
@include('scholarship.scholar')
<div class="title-wapper">
    <h1 class="text-study">Danh sách các loại học bổng của Canada</h1>
    <div class="content container" style="padding-bottom: 40px">
        <table class="table table-bordered">
            <tbody class="table-border">
                <tr>
                    <td class="table-title" style="width: 30%;"><strong>Trường </strong></td>
                    <td class="table-title" style="width: 25%;"><strong>Học bổng</strong></td>
                    <td class="table-title" style="width: 25%;"><strong>Giá trị</strong></td>
                    <td class="table-title" style="width: 25%;"><strong>Điều kiện</strong></td>
                </tr>
                @if (!empty($country->schools))
                    @foreach ($country->schools as $school)
                        @foreach ($school->scholarships as $scholarship)
                            <tr>
                                <td><span >{{ $school->name }}</span></td>
                                <td><span >{{ $scholarship->name }}</span></td>
                                <td><span ></span>{{ $scholarship->type }}</span></td>
                                <td><span >{!! $scholarship->condition !!}</span></td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

