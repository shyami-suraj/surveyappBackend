{{-- @extends('layouts.app') --}}

@extends('adminlte::page')
@section('content')
    <div class="col-12">
        <a href="{{ route('admin.question_mapper.create') }}"><button type="button" class="btn  btn-primary "
                style="width:150px;margin:5px;">Add question_mapper</button></a>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">question_mapper</h3>

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
                            <th>project_id</th>
                            <th>activity_id</th>
                            <th>question_id</th>
                            <th>order</th>
                             <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($question_mappers as $question_mapper)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question_mapper->activities->projects->name }} </td>
                                <td>{{ $question_mapper->activities->name }}</td>

                                <td>{{ $question_mapper->questions->question }}</td>
                                <td>{{ $question_mapper->order }}</td>
                                {{-- <td>{{ $users->district_id }}</td> --}}
                                                              <td >
                                    <form action="{{ route('admin.question_mapper.destroy_status', [$question_mapper->id]) }}"
                                        method="Post">
                                        @csrf
                                        <button type="submit" style="font-size:16px" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete?')">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>

                                        <a style="font-size:24px "class="btn btn-xs btn-default text-primary mx-1 shadow"
                                        title="Edit" href="{{ route('admin.question_mapper.edit', [$question_mapper->id]) }}">
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
