@extends('layouts.app')

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Project List</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
        </div>

        <div class="col-12">
            <table>
                <thead>
                    <tr>
                        <th> {{__('id')}}</th>
                        <th> {{__('Project Name')}}</th>
                        <th> {{__('Description')}}</th>
                        <th> {{__('Start Date')}}</th>
                        <th> {{__('End Date')}}</th>
                        <th> {{__('Status')}}</th>
                        <th> {{__('Actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>


    </div>


</div>
@endsection
