@extends('layout.app')
@section('namePage','update customer')
@section('content')
    <form action="{{route('customers.update', $customer->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <lable>name</lable>
            <input type="text" class="form-control" name="name" value="{{$customer->name}}">
            @if($errors->has('name'))
                <p class="alert-danger">{{$errors->first('name')}}</p>
            @endif
            <lable>Image</lable>
            <input type="file" name="image">
        </div>
        <input class="btn btn-primary" type="submit" value="update">
        <a href="{{route('customers.index')}}">
            <input class="btn btn-primary" type="button" value="back">
        </a>
        <input type="hidden" value="{{$customer->id}}" name="id">
    </form>
@endsection
