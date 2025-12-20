@extends('admin')
@section("content")

  <div class="container">
     <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">{{__("Students List")}}</h4>
                      <p class="card-subtitle">
                        <a href="{{route('student.create')}}" class="btn btn-primary btn-sm float-end">{{__('Add New Student')}}</a>
                      </p>
                    </div>
                    <div class="ms-auto mt-3 mt-md-0">
                      <select class="form-select theme-select border-0" aria-label="Default select example">
                        <option value="1">March 2025</option>
                        <option value="2">March 2025</option>
                        <option value="3">March 2025</option>
                      </select>
                    </div>
                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            {{__('id')}}
                          </th>
                          <th scope="col" class="px-0 text-muted">{{__('Name')}}</th>
                          <th scope="col" class="px-0 text-muted">
                            {{__('Department')}}
                          </th>
                          <th scope="col" class="px-0 text-muted text-end">
                            {{__('Actions')}}
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($students as $student)
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="{{ asset('backend/img/'.$student->image) }}" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">{{ $student->std_name }}</h6>
                                <span class="text-muted"></span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">{{ $student->std_department }}</td>
                          <td class="px-0">
                            <span class="badge bg-info">Low</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $3.9K
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>



    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>Student List
              <a href="{{route('student.create')}}" class="btn btn-primary btn-sm float-end">{{__('Add New Student')}}</a>
            </h3>
          </div>
          <div class="card-body">
            @if (session('message'))
              <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>image</th>
                  <th>department</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                  <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->std_name }}</td>
                    <td><img src="{{ asset('backend/img/'.$student->image) }}" alt="" srcset=""></td>
                    <td>{{ $student->department }}</td>
                    <td>
                      <a href="{{ url('admin/student/' . $student->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ url('admin/student/' . $student->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $students->links() }}
          </div>
        </div>
      </div>
    </div>

  </div>



@endsection
