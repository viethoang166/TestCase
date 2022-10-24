@extends('admin.layout.master')

@section('content')

@if (empty($user))
<form class="container-fluid" method="post" action="{{ route('compare.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>Thêm mới thông tin</h3>  
@else
<form class="container-fluid" method="post" action="{{ route('compare.update', $user->id) }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>Sửa thông tin trường</h3>
@endif
      <a href="{{ route('compare.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  <div class="container-fluid">
    <label for="infor" class="form-label">Thông tin chung</label>
    <input name="infor" type="text" class="form-control mb-2 @error('infor') is-invalid @enderror" id="infor" placeholder="" value="{{ old('infor', $user->infor ?? '') }}">
    @error('infor')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="city" class="form-label">Thành phố</label>
    <input name="city" type="text" class="form-control mb-2 @error('city') is-invalid @enderror" id="city" placeholder="" value="{{ old('city', $user->city ?? '') }}">
    @error('city')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="course" class="form-label">Chương trình học</label>
    <input name="course" type="textarea" class="form-control mb-2 @error('course') is-invalid @enderror" id="course" placeholder="" value="{{ old('course', $user->course ?? '') }}">
    @error('course')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="infrastructure" class="form-label">Cơ sở vật chất</label>
    <input name="infrastructure" type="textarea" class="form-control mb-2 @error('infrastructure') is-invalid @enderror" id="infrastructure" placeholder="" value="{{ old('infrastructure', $user->infrastructure ?? '') }}">
    @error('infrastructure')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="fee" class="form-label">Học phí</label>
    <input name="fee" type="textarea" class="form-control mb-2 @error('fee') is-invalid @enderror" id="fee" placeholder="" value="{{ old('fee', $user->fee ?? '') }}"></input>
    @error('fee')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="scholarship" class="form-label">Học bổng</label>
    <input name="scholarship" type="textarea" class="form-control mb-2 @error('scholarship') is-invalid @enderror" id="scholarship" placeholder="" value="{{ old('scholarship', $user->scholarship ?? '') }}"></input>
    @error('scholarship')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="condition" class="form-label">Điều kiện đầu vào</label>
    <input name="condition" type="textarea" class="form-control mb-2 @error('condition') is-invalid @enderror" id="condition" placeholder="" value="{{ old('condition', $user->condition ?? '') }}"></input>
    @error('condition')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="feedback" class="form-label">Content</label>
    <input name="feedback" type="text" style="height: 300px;" class="form-control mb-2 @error('feedback') is-invalid @enderror" id="feedback" placeholder="" value="{{ old('feedback', $user->feedback ?? '') }}"></input>
    @error('feedback')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
    <label for="attachment" class="form-label">Image</label>
    <input class="form-control" type="file" id="attachment" name="avatar">
    
      <img width="100px" src="" alt="">
    
  </div>
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </div>
  </div>
</form>
@endsection