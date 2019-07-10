@extends('layout.app')
@section('namePage','list customer')
@section('content')
    <form class="form-control" action="{{route('customers.search')}}" method="post">
        @csrf
        <input class="input-group-text" type="text" name="keyword">
        <button class="btn btn-primary" type="submit">search name</button>
    </form>
    {{$customers->links()}}

    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        @if(count($customers) == 0)
            <tr>
                <th class="alert-danger">Chưa có dữ liệu</th>
            </tr>
        @else
            @foreach($customers as $key => $customer)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$customer->name}}</td>
                    <td>
                        <img src="{{asset('storage/' .$customer->image)}}" width="150px">
                    </td>
                    <td>
                        <a href="{{route('customers.edit',$customer->id)}}">
                            <button class="btn btn-primary">update</button>
                        </a>
                        <a href="{{route('customers.delete',$customer->id)}}">
                            <button class="btn btn-danger">delete</button>
                        </a>
                        <a href="{{route('customers.show', $customer->id)}}">
                            <button class="btn btn-info">show</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    <a href="{{route('customers.create')}}">
        <button class="btn btn-info">add</button>
    </a>

@endsection
