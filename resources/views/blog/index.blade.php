@extends('index')

@section('content')
<a href="{{route('dashboard.blog.create')}}" class="btn btn-primary">Add post</a>
<table class="table table-light my-2">
    <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">Thumb</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Author</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$posts->firstItem() + $loop->index}}</th>
            <td><img width="90" src="{{url('storage/images/post_images/'.$post->image)}}" alt="Post Image"></td>
            <td>{{$post->title}}</td>
            <td>{{$post->desc}}</td>
            <td>{{$post->author->name.' '.$post->author->surname}}</td>
            <td>
                <a href="{{route('dashboard.blog.show',$post->id)}}" class="btn btn-info">Info</a>
                <a href="{{route('dashboard.blog.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                <form id="del-form" action="{{route('dashboard.blog.destroy', $post->id)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <a onclick="document.querySelector('#del-form').submit()" class="btn btn-danger">Delete</a>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
    {{$posts->links()}}
</table>
@endsection
