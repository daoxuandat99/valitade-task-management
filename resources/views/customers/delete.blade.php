@extends('layout.app')
@section('namePage','delete customer')
@section('content')
    <p class="alert-danger">
        Bạn muốn xóa {{$customer->name}} không?
    </p>
    <a href="{{route('customers.destroy', $customer->id)}}">
        <button class="btn btn-danger">delete</button>
    </a>
    <a href="{{route('customers.index')}}">
        <button class="btn btn-primary">back</button>
    </a>
@endsection