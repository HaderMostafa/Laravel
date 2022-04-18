@extends('layouts.app')

@section('title')Show @endsection

@section('content')
<div class="my-1">

 <div class="card my-3">
    <h5 class="card-header">Post Info</h5>
      <div class="card-body">
        <h5 class="card-title">Title: {{ $post['title'] }}</h5>
        <h5 class="card-title">Description: </h5>
        <p class="card-text">{{ $post['description'] }}</p>
      </div>
  </div>

  <div class="card my-3">
    <h5 class="card-header">Post Creator Info</h5>
     <div class="card-body">
        <h5 class="card-title">Name: {{ $user['name'] }}</h5>
        <h5 class="card-title">Email: {{ $user['email'] }}</h5>
        <h5 class="card-title">Created At: {{ \Carbon\Carbon::parse($post['created_at'])->format('l jS \\of F Y h:i:s A'); }}</h5>
     </div>
  </div>

  <form>

    <input type="text" class="form-control" placeholder="Your Comment">

    <div class="d-flex justify-content-center mt-3">

       <a href="#" class="btn btn-success mx-3">Create</a>

       <a href="#" class="btn btn-info mx-3">View</a>

       <a href="#" class="btn btn-primary mx-3">Edit</a>
                   
       <form action= "#" method="POST" >
          @method('DELETE')
          @csrf
          <button onclick="return confirm('Are you sure you want to delete this comment?');" class="btn btn-danger mx-3">Delete</button>
        </form>

    </div>

  </form>

</div>
@endsection