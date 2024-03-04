@extends('register.layout_register')
@section('title')
    
@endsection
@section('content')

<h1 class="ms-auto me-auto mt-auto" style="width:500px;">Login</h1>

<div class="mt-5">
    @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
    @endif
        
    @if(session()->has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
</div>

<form style="width:500px;" class="ms-auto me-auto mt-auto" action="{{route('login.post')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection