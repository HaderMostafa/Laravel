@extends('layouts.app')

@section('title')Show @endsection

@section('content')
        <table class="table mt-4">
            <thead>
              <tr align="center">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <td>{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['post_creator'] }}</td>
                <td>{{ $post['created_at'] }}</td>
              </tr>
            </tbody>
          </table>
@endsection