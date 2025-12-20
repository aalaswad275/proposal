@extends('admin')

@section('content')
<div class="container">

    <h2>Staff Details</h2>

    <div class="card" style="width: 24rem;">
        <img src="{{ asset('images/'.$staff->staff_image) }}" class="card-img-top">

        <div class="card-body">
            <h4>{{ $staff->name }}</h4>

            <p><strong>Staff ID:</strong> {{ $staff->staff_id }}</p>
            <p><strong>Department:</strong> {{ $staff->staff_dept }}</p>
            <p><strong>Position:</strong> {{ $staff->staff_position }}</p>
            <p><strong>Phone:</strong> {{ $staff->staff_phone }}</p>
            <p><strong>Email:</strong> {{ $staff->staff_email }}</p>

            <a href="{{ route('staff.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

</div>
@endsection

