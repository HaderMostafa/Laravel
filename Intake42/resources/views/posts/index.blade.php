@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $posts as $post)        
              <tr>
                <td>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user ? $post->user->name : "Not Found" }}</td>
                <td>{{ \Carbon\Carbon::parse( $post->created_at )->toDateString(); }}</td>

                <td>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-info">View</a>
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>
                   
                    <form style="display: inline" method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Are you sure you want to delete this post?');" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          <div class="d-flex justify-content-center"> {{ $posts->links() }}</div>
@endsection