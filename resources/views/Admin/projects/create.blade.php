@extends('admin')

@section('content')
<div class="container-fluid mt-4">
    <h3>{{ __('Add Project') }}</h3>

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>{{ __('Project Title') }}</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>{{ __('Description') }}</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>{{ __('Project Type') }}</label>
            <select name="project_type" id="project_type" class="form-control">
                <option value="">{{ __('Select Type') }}</option>
                <option value="student">{{ __('Student') }}</option>
                <option value="staff">{{ __('Staff') }}</option>
            </select>
        </div>

        <div class="mb-3" id="student_box" style="display:none;">
            <label>{{ __('Student') }}</label>
            <select name="student_id" class="form-control">
                @foreach($students as $student)
                    <option value="{{ $student->id }}">
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="staff_box" style="display:none;">
            <label>{{ __('Staff') }}</label>
            <select name="staff_id" class="form-control">
                @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}">
                        {{ $staff->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>{{ __('Department') }}</label>
            <select name="department_id" class="form-control">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>{{ __('Project File') }}</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button class="btn btn-success">{{ __('Save') }}</button>
    </form>
</div>

<script>
document.getElementById('project_type').addEventListener('change', function () {
    document.getElementById('student_box').style.display =
        this.value === 'student' ? 'block' : 'none';

    document.getElementById('staff_box').style.display =
        this.value === 'staff' ? 'block' : 'none';
});
</script>
@endsection
