@extends('index')

@section('content')
    <div class="card col-lg-6 col-md-12 m-auto">
        <div class="card-header">
            {{$post->title}}
        </div>
        <img class="card-img-top" width="200" src="{{url('storage/images/post_images/'.$post->image)}}" alt="Post image">
        <div class="card-body">
            <h4 class="card-title">{{$post->title}}</h4>
            <p class="card-text">{{$post->desc}}</p>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <em><i class="fas fa-pencil"></i> {{$post->author->name.' '.$post->author->surname}}</em>
            <em><i class="fas fa-calendar"></i> {{Carbon\Carbon::parse($post->created_at)->format('d.m.Y, H:i:s')}}</em>
        </div>
    </div>

@endsection
