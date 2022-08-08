@extends('index')

@section('content')
<form method="POST" action="{{route('dashboard.blog.update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" class="form-control my-2" placeholder="Title..." value="{{$post->title}}">
    @error('title')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <input type="text" name="desc" class="form-control my-2" placeholder="Description..." value="{{$post->desc}}">
    @error('desc')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror

    <img width="200" src="{{url('storage/images/post_images/'.$post->image)}}" alt="Post Image">
    <input type="file" name="image" class="form-control my-2">
    @error('image')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary m-auto d-block">Update</button>
</form>
@endsection
