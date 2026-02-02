@extends('admin')

@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-md-flex align-items-center mb-3">
                    <div>
                        <h4 class="card-title">{{ __('Students List') }}</h4>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                            {{ __('Add New Student') }}
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Student') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th class="text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    {{-- ID --}}
                                    <td>{{ $student->id }}</td>

                                    {{-- Student info --}}
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="{{ asset('backend/img/' . $student->std_image) }}"
                                                class="rounded-circle me-2"
                                                width="40"
                                                height="40"
                                                alt="student"
                                            >
                                            <div>
                                                <strong>{{ $student->name }}</strong><br>
                                                <small class="text-muted">{{ $student->std_id }}</small>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Department --}}
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $student->std_dept }}
                                        </span>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="text-end">
                                        <a href="{{ route('students.edit', $student->id) }}"
                                           class="btn btn-warning btn-sm">
                                            {{ __('Edit') }}
                                        </a>

                                        <form action="{{ route('students.destroy', $student->id) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('{{ __('Are you sure?') }}')">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        {{ __('No students found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
