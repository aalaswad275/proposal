@extends('admin')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Staff List</h2>
        <a href="{{ route('staff.create') }}" class="btn btn-primary">Add Staff</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Staff ID</th>
                <th>Department</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Email</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
            <tr>
                <td>
                    <img src="{{ asset('images/'.$staff->staff_image) }}" width="60" height="60" class="rounded">
                </td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->staff_id }}</td>
                <td>{{ $staff->staff_dept }}</td>
                <td>{{ $staff->staff_position }}</td>
                <td>{{ $staff->staff_phone }}</td>
                <td>{{ $staff->staff_email }}</td>
                <td>
                    <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

