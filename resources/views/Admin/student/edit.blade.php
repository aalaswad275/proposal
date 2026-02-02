@extends('admin')

@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">{{ __('Edit Student') }}</h4>

                {{-- عرض الأخطاء إذا وجدت --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- الاسم --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $student->name) }}" required>
                    </div>

                    {{-- الرقم الجامعي --}}
                    <div class="mb-3">
                        <label for="std_id" class="form-label">{{ __('Student ID') }}</label>
                        <input type="text" name="std_id" id="std_id" class="form-control"
                               value="{{ old('std_id', $student->std_id) }}" required>
                    </div>

                    {{-- القسم (Select Box) --}}
                    <div class="mb-3">
                        <label for="std_dept" class="form-label">{{ __('Department') }}</label>
                        <select name="std_dept" id="std_dept" class="form-select" required>
                            <option value="">{{ __('Select Department') }}</option>
                            @foreach ($departments as $dept)
                                <option value="{{ $dept->id }}"
                                    {{ old('std_dept', $student->std_dept) == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- المستوى --}}
                    <div class="mb-3">
                        <label for="std_level" class="form-label">{{ __('Level') }}</label>
                        <input type="text" name="std_level" id="std_level" class="form-control"
                               value="{{ old('std_level', $student->std_level) }}">
                    </div>

                    {{-- الفصل --}}
                    <div class="mb-3">
                        <label for="std_semester" class="form-label">{{ __('Semester') }}</label>
                        <input type="text" name="std_semester" id="std_semester" class="form-control"
                               value="{{ old('std_semester', $student->std_semester) }}">
                    </div>

                    {{-- العنوان --}}
                    <div class="mb-3">
                        <label for="std_address" class="form-label">{{ __('Address') }}</label>
                        <input type="text" name="std_address" id="std_address" class="form-control"
                               value="{{ old('std_address', $student->std_address) }}">
                    </div>

                    {{-- الهاتف --}}
                    <div class="mb-3">
                        <label for="std_phone" class="form-label">{{ __('Phone') }}</label>
                        <input type="text" name="std_phone" id="std_phone" class="form-control"
                               value="{{ old('std_phone', $student->std_phone) }}">
                    </div>

                    {{-- البريد --}}
                    <div class="mb-3">
                        <label for="std_email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" name="std_email" id="std_email" class="form-control"
                               value="{{ old('std_email', $student->std_email) }}">
                    </div>

                    {{-- المشرف (Select Box) --}}
                    <div class="mb-3">
                        <label for="std_supervisor" class="form-label">{{ __('Supervisor') }}</label>
                        <select name="std_supervisor" id="std_supervisor" class="form-select" required>
                            <option value="">{{ __('Select Supervisor') }}</option>
                            @foreach ($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}"
                                    {{ old('std_supervisor', $student->std_supervisor) == $supervisor->id ? 'selected' : '' }}>
                                    {{ $supervisor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- صورة الطالب --}}
                    <div class="mb-3">
                        <label for="std_image" class="form-label">{{ __('Image') }}</label>
                        <input type="file" name="std_image" id="std_image" class="form-control">
                        @if ($student->std_image)
                            <img src="{{ asset('backend/img/' . $student->std_image) }}" class="mt-2 rounded" width="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('Update Student') }}</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
