@extends('layouts.app1')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
            <li>{{ $message }}  </li>
            @if ($message = Session::get('Update'))
                <li>{{ $message }}  </li>
            @endif

        </div>
    @endif

    <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
    @if (count($errors) > 0)
        <div class="alert alert-danger"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
            <li>{{ $message }}  </li>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="content-header">
        <h1>
            Chỉnh Sửa Danh Mục
        </h1>
    </section>
    <section class="content">
        <form class="user" action="{{ route('category.update',['category' => $category->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            @if(count($errors) >0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="box">
                <div class="box-body row">
                    <div class="form-group col-md-12">
                        <label>Tên Danh Mục</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ $category->name }}">
                    </div>
                    <label>Mô Tả Sản Phẩm</label>
                    <textarea name="description" class="form-control" id="describe" placeholder="describe">{{ $category->description }}</textarea>
                </div>

            </div>
            <div class="box-footer row">
                <button type="submit" id="btn" class="btn btn-primary btn-block" value="Update">
                    <i class="fa fa-save"></i>
                    <span>Lưu và Quay Lại</span>
                </button>
            </div>
            </div>
        </form>
    </section>
@endsection
