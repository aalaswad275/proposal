@extends('admin')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('Add New Student')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('students.update'),$student->id }}">
                       @csrf

                        <div class="form-group">
                            <label for="student_name" >{{_('student name')}}</label>
                            <input type="text" name="name" id="$student_name" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="student_image" >{{_('student image')}}</label>
                            <input type="file" name="file" id="student_image" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="student_department" >{{_('student department')}}</label>
                            <input type="text" name="email" id="student_department" class="form-control" required >
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ _('Add Student') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
