@extends('layouts.app1')

@section('content')
    {{--        <ul>--}}
    {{--            @foreach($category as $category)--}}
    {{--                <li>{{$category->name}}</li>--}}

    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--    @endsection--}}

    <div class="card ">
        <div class="card-header">
            <h4 class="card-title"> Danh Mục </h4>
            {{--            <a href="{{ route('products.store')}}" class="btn btn-success">--}}
            {{--                <i class="fa fa-plus"></i>--}}
            {{--                <span>Thêm Danh Mục</span>--}}
            {{--            </a>--}}
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                    <tr>
                        <th>
                            Mã Danh Mục
                        </th>
                        <th>
                            Tên Danh Mục
                        </th>
                        <th>
                            Chỉnh Sửa Danh Mục
                        </th>
                        <th>
                            Xoá Danh Mục
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                <a href="/category/{{$category->id}}">{{$category->name}}
                            </td>

                            <td>
                                <a href="{{ route('category.edit',['category' => $category->id]) }}" class="btn btn-primary btn-sm">
                                    <but>Chỉnh Sửa</but>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('category.destroy',['category' => $category->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary btn-sm" id="delete">Xoá</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
