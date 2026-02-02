@extends('admin')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Staff</h3>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $staff->name) }}">
        </div>

        {{-- Staff ID --}}
        <div class="mb-3">
            <label class="form-label">Staff ID</label>
            <input type="text" name="staff_id" class="form-control"
                   value="{{ old('staff_id', $staff->staff_id) }}">
        </div>

        {{-- Department --}}
        <div class="mb-3">
            <label class="form-label">Department</label>
            <select name="staff_dept" class="form-control">
                <option value="">-- Select Department --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $staff->staff_dept == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Position --}}
        <div class="mb-3">
            <label class="form-label">Position</label>
            <input type="text" name="staff_position" class="form-control"
                   value="{{ old('staff_position', $staff->staff_position) }}">
        </div>

        {{-- Phone --}}
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="staff_phone" class="form-control"
                   value="{{ old('staff_phone', $staff->staff_phone) }}">
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="staff_email" class="form-control"
                   value="{{ old('staff_email', $staff->staff_email) }}">
        </div>

        {{-- Current Image --}}
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if ($staff->staff_image)
                <img src="{{ asset('images/'.$staff->staff_image) }}"
                     width="120" class="img-thumbnail mb-2">
            @endif
        </div>

        {{-- Upload New Image --}}
        <div class="mb-3">
            <label class="form-label">New Image</label>
            <input type="file" name="staff_image" class="form-control">
        </div>

        {{-- Buttons --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
