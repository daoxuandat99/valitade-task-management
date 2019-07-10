@extends('layout.app')
@section('namePage','create customer')
@section('content')
    <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <lable>Name</lable>
            <input type="text" class="form-control" name="name">
            @if($errors->has('name'))
                <p class="alert-danger">{{$errors->first('name')}}</p>
                @endif
            <lable>Image</lable>
            <input type="file" name="image">
        </div>
        <input class="btn btn-primary" type="submit" value="add">
        <a href="{{route('customers.index')}}">
            <input class="btn btn-primary" type="button" value="back">
        </a>
    </form>
@endsection