{{-- @extends('layouts.app') --}}

@extends('adminlte::page')
@section('content')
    <div class="col-6">
        <a href="{{ route('admin.projects.create') }}"><button type="button" class="btn  btn-primary "
                style="width:150px;margin:5px;">Add Project</button></a>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Project</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px; ">
                        <br />
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" >
                <table class="table table-hover table-head-fixed  text-nowrap">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project as $projects)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $projects->name }}</td>

                                <td >

                                    <form action="{{ route('admin.projects.destroy_status', [$projects->id]) }}"
                                        method="Post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete?')">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                        <a style="font-size:24px "class="btn btn-xs btn-default text-primary mx-1 shadow"
                                            title="Edit" href="{{ route('admin.projects.edit', [$projects->id]) }}">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                    </form>


                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
@extends('layouts.footer')
