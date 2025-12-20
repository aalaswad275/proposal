@extends('admin')

@section('content')
<div class="container mt-4">
<br>
    <h2>Add New Staff</h2>

    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Staff ID</label>
            <input type="text" name="staff_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="staff_dept" class="form-control" required>
                <option disabled selected>Select Dept</option>
                @foreach($departments as $d)
                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="staff_position" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="staff_phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="staff_email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="staff_image" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection

