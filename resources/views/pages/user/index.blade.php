@extends('layouts.app1')

@section('content')
    {{--    <ul>--}}
    {{--        @foreach($users as $user)--}}
    {{--            <li>{{$user->name}}</li>--}}
    {{--        @endforeach--}}
    {{--    </ul>--}}
    <div class="card-body">
        <h4 class="card-title">Basic Table</h4>
        <p class="card-description"> Add class <code>.table</code>
        </p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="/profiles/{{$user->id}}">{{$user->name}}</a> </td>
                        <td>{{$user->email}}</td>
                        <td>
                            <label class="badge badge-danger">Pending</label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
