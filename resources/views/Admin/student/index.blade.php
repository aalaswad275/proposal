@extends('admin')
@section("content")

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Student List
              <a href="{{route('student.create')}}" class="btn btn-primary btn-sm float-end">{{__('Add New Student')}}</a>
            </h3>
          </div>
          <div class="card-body">
            @if (session('message'))
              <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>image</th>
                  <th>department</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                  <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->std_name }}</td>
                    <td><img src="{{ asset('backend/img/'.$student->image) }}" alt="" srcset=""></td>
                    <td>{{ $student->department }}</td>
                    <td>
                      <a href="{{ url('admin/student/' . $student->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ url('admin/student/' . $student->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $students->links() }}
          </div>
        </div>
      </div>
    </div>

  </div>



@endsection
