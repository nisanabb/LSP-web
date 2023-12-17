@extends('layouts.layout')

@section('content')
<section id="list">
    <div class="container">
      <h1>List User</h1>
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning" style='border-radius: 100px; width:140px; height: 36px;'>Edit</a>
                <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class='btn btn-danger' style='border-radius: 100px; width:140px; height: 36px;' onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            @endforeach
        </tbody>
    </table>
@endsection
