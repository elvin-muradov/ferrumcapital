@extends('index')

@section('content')
<form method="POST" action="{{route('dashboard.blog.store')}}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" class="form-control my-2" placeholder="Title...">
    @error('title')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <input type="text" name="desc" class="form-control my-2" placeholder="Description...">
    @error('desc')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <input type="file" name="image" class="form-control my-2">
    @error('image')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary m-auto d-block">Confirm</button>
</form>
@endsection
