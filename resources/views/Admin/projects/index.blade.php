@extends('admin')

@section('content')
<div class="container-fluid mt-4">
    <h3 class="mb-3">{{ __('Projects List') }}</h3>

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">
        {{ __('Add New Project') }}
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Owner') }}</th>
                <th>{{ __('Department') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ __(ucfirst($project->project_type)) }}</td>
                <td>
                    @if($project->project_type == 'student')
                        {{ $project->student->name ?? '-' }}
                    @else
                        {{ $project->staff->name ?? '-' }}
                    @endif
                </td>
                <td>{{ $project->department->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('projects.show',$project->id) }}" class="btn btn-info btn-sm">
                        {{ __('View') }}
                    </a>
                    <a href="{{ route('projects.edit',$project->id) }}" class="btn btn-warning btn-sm">
                        {{ __('Edit') }}
                    </a>

                    <form action="{{ route('projects.destroy',$project->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('{{ __('Delete project?') }}')">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
