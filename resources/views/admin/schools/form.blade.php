@extends('admin.layout.master')

@section('content')

    @if ($errors->has('banner'))
        <div class="alert alert-danger" role="alert">
            <p class="help is-danger">{{ $errors->first('banner') }}</p>
        </div>
    @endif
    @if (empty($schools))
        <form class="container-fluid" method="post" action="{{ route('schools.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Thêm mới Trường</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('schools.update', $schools->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Chỉnh sửa</h3>
    @endif
    <a href="{{ route('schools.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror"
                id="name" placeholder="" value="{{ old('name', $schools->name ?? '') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror"
                id="email" placeholder="" value="{{ old('email', $schools->email ?? '') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input name="phone" type="text" class="form-control mb-2 @error('phone') is-invalid @enderror"
                id="phone" placeholder="" value="{{ old('phone', $schools->phone ?? '') }}">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="address" class="form-label">Address</label>
            <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror"
                id="address" placeholder="" value="{{ old('address', $schools->address ?? '') }}">
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="container-fluid">
        <label for="infor" class="form-label">Infor</label>
        <textarea name="infor" type="text" style="height: 300px;"
            class="form-control mb-2 @error('infor') is-invalid @enderror" id="infor">{{ old('infor', $schools->infor ?? '') }}</textarea>
        @error('infor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <div class="row">
            <div class="col-md-3">
                <label for="min_price" class="form-label">Min_price/year</label>
                <input name="min_price" placeholder="VNĐ" type="text"
                    class="form-control mb-2 @error('min_price') is-invalid @enderror" id="min_price" placeholder=""
                    value="{{ old('min_price', $schools->min_price ?? '') }}">
                @error('min_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-3">
                <label for="max_price" class="form-label">Max_price/year</label>
                <input name="max_price" placeholder="VNĐ" type="text"
                    class="form-control mb-2 @error('max_price') is-invalid @enderror" id="max_price" placeholder=""
                    value="{{ old('max_price', $schools->max_price ?? '') }}">
                @error('max_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-row">
        @php
            $selectedMajors = collect(old('major_ids', !empty($schools) ? $schools->majors->pluck('id') : []));
        @endphp
        <div class="container-fluid">
            <label>Select Major:</label>
            <div class="row mx-2 mb-2 @error('major_ids') is-invalid @enderror">
                @if (!empty($majors))
                    @foreach ($majors as $major)
                        <div class="col-md-3 form-check form-check-inline mx-0 my-0">
                            <input class="form-check-input" name="major_ids[]" id="chkbox_major_{{ $major->id }}"
                                type="checkbox" value="{{ $major->id }}"
                                {{ $selectedMajors->contains($major->id) ? ' checked' : '' }}>
                            <label class="form-check-label" for="chkbox_major_{{ $major->id }}">
                                {{ $major->name }}</label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        @php
            $selectedCountry = old('country_id', $schools->country ?? '');
        @endphp
        {{ csrf_field() }}
        <div class="form-group col-md-6" style="margin-top:20px; margin-bottom:20px;">
            <label>Select Country:</label>
            <select class="form-control" name="country_id">
                @if (empty($schools) && empty($selectedCountry))
                    <option value="" selected disabled hidden>---</option>
                @endif
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($country->id == $selectedCountry) selected @endif>
                        {{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        @php
            $selectedCity = old('city_id', $schools->city ?? '');
        @endphp
        {{-- @php
          dd($schools->country);
        @endphp --}}
        <div class="form-group col-md-6" style="margin-top:20px; margin-bottom:20px;">
            <label>Select City:</label>
            <select class="form-control" name="city_id">
                @if (empty($schools))
                    <option value="" selected disabled hidden>---</option>
                @else
                    @if (!empty($schools->country))
                        @foreach ($schools->country->cities as $city)
                            <option value="{{ $city->id }}" @if ($city->id == $selectedCity) selected @endif>
                                {{ $city->name }}</option>
                        @endforeach
                    @endif
                @endif
            </select>
        </div>
    </div>
    @php
        // $banner = old('banner', $news->images->pluck('banner')->search(1) ?? '')
    @endphp
    <div class="container-fluid" id="images" style="margin-top:20px; margin-bottom:20px;">
        <label for="attachment" class="form-label">Image</label>
        <div class="input-group-btn">
            <button class="btn btn-success btnAddImage" type="button"><i
                    class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
        @if (!empty($schools->images))
            @php
                $i = 0;
            @endphp
            @foreach ($schools->images as $image)
                @php
                    $base64Image = base64_encode(Storage::get($image->file) ?? '');
                @endphp
                <div class="imageblock">
                    <div class="form-check increment">
                        <div class="form-check-label d-inline-flex">
                            <input type="file" name="image[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-danger btnRemoveImage" style="margin-top: 0px" type="button"><i
                                        class="glyphicon glyphicon-remove"></i> Remove</button>

                            </div>
                        </div>

                        <input class="form-check-input" style="margin-left: 15px" name="banner" type="radio"
                            id="inlineCheckbox1" value="{{ $i++ }}"
                            @if ($image->banner == 1) checked @endif>
                        <img width="100px" style="margin-bottom: 10px; margin-left: 100px"
                            src="{{ 'data:image/png;base64,' . $base64Image }}" alt="">
                        @error('banner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
            @endforeach
        @else
            <div class="mb-2 @error('banner') is-invalid @enderror">
                <div class="imageblock">
                    <div class="form-check increment">
                        <div class="form-check-label d-inline-flex">
                            <input type="file" name="image[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success btnAddImage" style="margin-top: 0px" type="button"><i
                                        class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                        </div>
                        <input class="form-check-input" style="margin-left: 15px" name="banner" type="radio"
                            id="inlineCheckbox1" value="0">
                    </div>
                </div>
        @endif
    </div>
    @error('banner')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
    </form>

    <script type="text/javascript">
        var url = "{{ url('/showCitiesInCountry') }}";
        $("select[name='country_id']").change(function() {
            var country_id = $(this).val();
            var token = $("input[name='_token']").val();

            $.ajax({
                url: "{{ url('/showCitiesInCountry') }}",
                method: 'POST',
                data: {
                    country_id: country_id,
                    _token: token
                },
                success: function(data) {
                    console.log(data);
                    $("select[name='city_id'").html('');
                    $.each(data, function(key, value) {
                        $("select[name='city_id']").append(
                            "<option value=" + value.id + ">" + value.name + "</option>"
                        );
                    });
                }
            });
        });

        $(document).ready(function() {
            let i = $('.imageblock').last().find('.form-check-input').val() ?? -1;
            $(".btnAddImage").click(function() {
                let html = `
                    <div class="imageblock">
                        <div class="form-check" style="margin-top:10px">
                            <div class="form-check-label d-inline-flex">
                                <input type="file" name="image[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger btnRemoveImage" style="margin-top: 0px" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                            <input class="form-check-input" style="margin-left: 15px" name="banner" type="radio" id="inlineCheckbox1" value="${++i}">
                        </div>
                    </div>
                `;
                $("#images").append(() => html);
            });

            $("body").on("click", ".btnRemoveImage", function() {
                $(this).parents(".imageblock").remove();
            });

        });
    </script>
@endsection
