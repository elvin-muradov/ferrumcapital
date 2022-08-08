@extends('index')

@section('content')
<form method="POST" action="{{route('reg')}}">
    @csrf
    <input type="text" name="name" class="form-control my-2" placeholder="Name">
    @error('name')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <input type="text" name="surname" class="form-control my-2" placeholder="Surname">
    @error('surname')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <input type="email" name="email" class="form-control my-2" placeholder="Email">
    @error('email')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <input type="password" name="password" class="form-control my-2" placeholder="Password">
    @error('password')
    <div class="bg-danger text-light p-2 rounded">
        {{$message}}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary m-auto d-block">Confirm</button>
</form>
@endsection
