@extends('layouts.app1')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
            <li>{{ $message }}  </li>
            @if ($message = Session::get('file'))
                <li>{{ $message }}  </li>
            @endif

        </div>
    @endif

    <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
    @if (count($errors) > 0)
        <div class="alert alert-danger"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
{{--            <li>{{ $message }}  </li>--}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
{{--    <p>họ tên: {{$profile->full_name}}</p>--}}
{{--    <p>email: {{$profile->email}}</p>--}}
{{--    <p>Địa chỉ: {{$profile->address}}</p>--}}
{{--    <p>Ngày sinh: {{$profile->birthday}}</p>--}}
{{--    <a href="{{ route('profiles.edit',['profile' => $profile->id])}}">edit</a>--}}
<form class="user" action="{{ route('profiles.update',['profile' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')<!-- khai báo này dùng để thiết lập phương thức PUT
									nếu không khai báo thì khi submit không thiết lập HttpPUT -->
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chỉnh Sửa Thông Tin Người Dùng</h4>
                <form class="forms-sample">
                    <div class="custom-file" style="margin: auto; padding: 30px">
                        <input type="file" class="custom-file-input " id="avatar" name="avatar" >
                        <label for="avatar" class="custom-file-label">{{$profile->avatar}}</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Họ và Tên: </label>
                        <input type="text" name="full_name" class="form-control form-control-user" id="full_name" placeholder="Full Name" value="{{$profile->full_name}}" />
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputEmail1">Email: </label>--}}
{{--                        <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Email" value="{{$profile->email}}" />--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa Chỉ: </label>
                        <input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address" value="{{$profile->address}}"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ngày Sinh: </label>
                        <input type="date" class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday"  value="{{$profile->birthday}}"/>
                    </div>

                    <button type="submit" class="btn btn-primary" value="Update" > Cập Nhật </button>
                    <button class="btn btn-light">Hủy</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông Tin Người Dùng</h4>
                    <img class="avatar" src="{{$profile->avatar}}" alt="..." style="width: 100px; height: 100px">
                <form class="forms-sample">
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Họ và Tên: </label>
                        <div class="col-sm-9" style="padding-top: 13px">
                            <view>{{$profile->full_name}}</view>
                        </div>
                    </div>
{{--                    <div class="form-group row">--}}
{{--                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email: </label>--}}
{{--                        <div class="col-sm-9" style="padding-top: 13px">--}}
{{--                            <view>{{$profile->email}}</view>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Địa chỉ: </label>
                        <div class="col-sm-9" style="padding-top: 13px">
                            <view>{{$profile->address}}</view>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Ngày Sinh: </label>
                        <div class="col-sm-9" style="padding-top: 13px">
                            <view>{{$profile->birthday}}</view>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
        <script>
            $('#avatar').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
@endsection('js')


