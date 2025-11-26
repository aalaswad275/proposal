@extends('layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="fw-bold">
                <h1>{{_('Department List')}}</h1>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('department.create')}}"> {{_('Add New Department')}}</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


