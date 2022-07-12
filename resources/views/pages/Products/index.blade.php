@extends('layouts.app1')

@section('content')
    {{--    <ul>--}}
    {{--        @foreach($products as $products)--}}
    {{--            <li>{{$products->name}}</li>--}}

    {{--        @endforeach--}}
    {{--    </ul>--}}
    {{--@endsection--}}

    <div class="card ">
        <div class="card-header">
            <h4 class="card-title"> Sản Phẩm </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                    <tr>
                        <th>
                            Mã Sản Phẩm
                        </th>
                        <th>
                            Tên Sản Phẩm
                        </th>
                        <th>
                            Số Lượng Sản Phẩm
                        </th>
                        <th>
                            Giá Sản Phẩm
                        </th>
{{--                        <th>--}}
{{--                            Mô Tả Sản Phẩm--}}
{{--                        </th>--}}
                        <th>
                            Chức năng xóa
                        </th>
                        <th>
                            Chức năng chỉnh sửa
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $products)
                        <tr>
                            <td>
                                {{$products->id}}
                            </td>
                            <td>
                                <a href="/products/{{$products->id}}">{{$products->name}}
                            </td>
                            <td>
                                {{$products->quantity}}
                            </td>
                            <td>
                                {{$products->price}}
                            </td>
{{--                            <td>--}}
{{--                                {{$products->describe}}--}}
{{--                            </td>--}}
                            <td>
                                <form action="{{ route('products.destroy',['product' => $products->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary btn-sm" id="delete">Xoá Sản Phẩm</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('products.edit',['product' => $products->id]) }}" class="btn btn-primary btn-sm">
                                    <but>Chỉnh Sửa</but>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
