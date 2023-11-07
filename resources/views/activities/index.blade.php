{{-- @extends('layouts.app') --}}

@extends('adminlte::page')
@section('content')
    <div class="col-12">
        <a href="{{ route('admin.activities.create') }}"><button type="button" class="btn  btn-primary "
                style="width:150px;margin:5px;">Add Activities</button></a>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Activities</h3>

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
            <div class="card-body table-responsive p-0" style="height: 700px;">
                <table class="table table-hover table-head-fixed  text-nowrap">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>name</th>
                            <th>Project Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activity as $activities)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $activities->name }}</td>
                                <td>{{ $activities->projects->name }}</td>



                                <td>
                                    <form action="{{ route('admin.activities.destroy_status', [$activities->id]) }}"
                                        method="Post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete?')">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>

                                        <a style="font-size:24px "class="btn btn-xs btn-default text-primary mx-1 shadow"
                                        title="Edit" href="{{ route('admin.activities.edit', [$activities->id]) }}">
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
