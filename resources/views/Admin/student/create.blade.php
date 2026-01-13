@extends('admin')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ __('Add New Student') }}</div>

                    <div class="panel-body">
                        <form method="POST"
                              action="{{ route('students.store') }}"
                              enctype="multipart/form-data">
                            @csrf

                            {{-- Student Name --}}
                            <div class="form-group">
                                <label>{{ __('Student Name') }}</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            {{-- Student ID --}}
                            <div class="form-group">
                                <label>{{ __('Student ID') }}</label>
                                <input type="text" name="std_id" class="form-control" required>
                            </div>

                            {{-- Department --}}
                            <div class="form-group">
                                <label>{{ __('Department') }}</label>
                                <input type="text" name="std_dept" class="form-control" required>
                            </div>

                            {{-- Level --}}
                            <div class="form-group">
                                <label>{{ __('Level') }}</label>
                                <input type="text" name="std_level" class="form-control" required>
                            </div>

                            {{-- Semester --}}
                            <div class="form-group">
                                <label>{{ __('Semester') }}</label>
                                <input type="text" name="std_semester" class="form-control" required>
                            </div>

                            {{-- Address --}}
                            <div class="form-group">
                                <label>{{ __('Address') }}</label>
                                <input type="text" name="std_address" class="form-control" required>
                            </div>

                            {{-- Phone --}}
                            <div class="form-group">
                                <label>{{ __('Phone') }}</label>
                                <input type="text" name="std_phone" class="form-control" required>
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <label>{{ __('Email') }}</label>
                                <input type="email" name="std_email" class="form-control" required>
                            </div>

                            {{-- Supervisor --}}
                            <div class="form-group">
                                <label>{{ __('Supervisor') }}</label>
                                <input type="text" name="std_supervisor" class="form-control" required>
                            </div>

                            {{-- Image --}}
                            <div class="form-group">
                                <label>{{ __('Student Image') }}</label>
                                <input type="file" name="std_image" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Student') }}
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
