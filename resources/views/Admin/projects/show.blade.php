@extends('admin')

@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">{{ __('Project Details') }}</h4>

                <div class="mb-3">
                    <strong>{{ __('Title') }}:</strong> {{ $project->title }}
                </div>

                <div class="mb-3">
                    <strong>{{ __('Description') }}:</strong> <p>{{ $project->description }}</p>
                </div>

                <div class="mb-3">
                    <strong>{{ __('Project Type') }}:</strong> {{ ucfirst($project->project_type) }}
                </div>

                <div class="mb-3">
                    <strong>{{ __('Owner') }}:</strong>
                    @if ($project->project_type == 'student' && $project->student)
                        {{ $project->student->name }}
                    @elseif ($project->project_type == 'staff' && $project->staff)
                        {{ $project->staff->name }}
                    @else
                        <span class="text-muted">{{ __('Not assigned') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <strong>{{ __('Department') }}:</strong>
                    {{ $project->department ? $project->department->name : __('Not assigned') }}
                </div>

                <div class="mb-3">
                    <strong>{{ __('File') }}:</strong>
                    @if ($project->file)
                        <a href="{{ asset('backend/files/' . $project->file) }}" target="_blank">{{ __('Download') }}</a>
                    @else
                        <span class="text-muted">{{ __('No file uploaded') }}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">{{ __('Back to List') }}</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
