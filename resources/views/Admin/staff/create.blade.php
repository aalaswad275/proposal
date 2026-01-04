@extends('admin')

@section('content')
<div class="container-fluid mt-4">
<br>
    <h2>{{ __('Add New Staff') }}</h2>

    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>{{ __('Staff ID') }}</label>
            <input type="text" name="staff_id" class="form-control" value="{{ old('staff_id') }}" required>
        </div>

        <div class="mb-3">
            <label>{{ __('Department') }}</label>
            <select name="staff_dept" class="form-control" required>
                <option disabled selected>{{ __('Select Dept') }}</option>
                @foreach($departments as $d)
                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>{{ __('Position') }}</label>
            <input type="text" name="staff_position" class="form-control" value="{{ old('staff_position') }}" required>
        </div>

        <div class="mb-3">
            <label>{{ __('Phone') }}</label>
            <input type="text" name="staff_phone" class="form-control" value="{{ old('staff_phone') }}" required>
        </div>

        <div class="mb-3">
            <label>{{ __('Email') }}</label>
            <input type="email" name="staff_email" class="form-control" value="{{ old('staff_email') }}" required>
        </div>

        <div class="mb-3">
            <label>{{ __('Image') }}</label>
            <input type="file" name="staff_image" class="form-control" required>
        </div>

        <button class="btn btn-success">{{ __('Save') }}</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
    </form>
</div>
@endsection
