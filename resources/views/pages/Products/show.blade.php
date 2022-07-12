@extends('layouts.app1')

@section('content')
    <p>Tên Sản Phẩm: {{$product->name}}</p>
    <p>Số Lượng Sản Phẩm: {{$product->quantity}}</p>
    <p>Giá Sản Phẩm: {{$product->price}}</p>
    <p>Mô tả Sản Phẩm: {{$product->describe}}</p>
@endsection
