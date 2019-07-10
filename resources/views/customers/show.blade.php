@extends('layout.app')
@section('namePage','show customer')
@section('content')
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
        </tr>
        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>
                <img src="{{asset('storage/' .$customer->image)}}" width="150px">
            </td>
        </tr>
    </table>
    <a href="{{route('customers.index')}}">
        <button class="btn btn-info">back</button>
    </a>

@endsection
