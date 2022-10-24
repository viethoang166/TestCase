
 @extends('layout.master')
 @section('main')
<div class="container">
@if (!empty($user))

<form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
<div class="row">
    <div class="col-md-6 col-sm-6">
       <div class="form-group" style="margin: bottom 47px; ">
            <label for="" style="margin: bottom: 10px"> Chọn ảnh đại diện</label>
            <br>
            <img src="{{ (!empty($user->avata)) ? 'data:image/jpg;base64,' .  base64_encode(Storage::get($user->avata)) : 'https://via.placeholder.com/150'  }}" alt="" style="max-width: 200px; height: auto"/>
       </div> 
       <div class="form-group">
            <label for="">Tải ảnh</label>
            <div class="form-group">
                <strong> Image:</strong>
                
                <input name="avata" type="file" class="form-control mb-2 @error('avata') is-invalid @enderror" id="avata" placeholder="" value="{{url('/app/'.$user->avata)}}" {{ $isShow ? ' readonly' : ''}} >
                
                
                @error('avata')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
       </div>
       <div class="form-group">
            <label for="">Địa chỉ</label>
            <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address" placeholder="" value="{{ old('address', $user->address ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
       </div>
       <div class="form-group field-muser-gender required has-success">
            <label for="">Giới tính</label>
            <div class="form-group">
                <select name="sex" id="sex">
                    <option value="nam">Nam</option>
                    <option value="nữ">Nữ</option>
                </select>
            </div>
       </div>

    </div>

    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="">Họ và Tên</label>
            <div class="form-group">
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $user->name ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <div class="form-group">
            <input name="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="" value="{{ old('email', $user->email ?? '') }}"{{ $isShow ? ' readonly' : ''}} readonly>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="">Số Điện Thoại</label>
            <div class="form-group">
            <input name="phone" type="text" class="form-control mb-2 @error('phone') is-invalid @enderror" id="phone" placeholder="" value="{{ old('phone', $user->phone ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="">Tuổi</label>
            <div class="form-group">
            <input name="age" type="text" class="form-control mb-2 @error('age') is-invalid @enderror" id="age" placeholder="" value="{{ old('age', $user->age ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            </div>
        </div>
        <div class="form-group">
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" value="Lưu">
        </div>
        </div>
    </div>

</div>
</form>

@endif
</div>
</div>
@endsection
