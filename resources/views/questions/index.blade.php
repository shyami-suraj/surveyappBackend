{{-- @extends('layouts.app') --}}

@extends('adminlte::page')
@section('content')
    <div class="col-12">
        <a href="{{ route('admin.questions.create') }}"><button type="button" class="btn  btn-primary "
                style="width:150px;margin:5px;">Add Question</button></a>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Questions</h3>

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
                            <th>question</th>
                            <th>slug</th>
                            <th>type</th>
                            <th>option</th>
                            <th>class_name</th>
                            <th>answer_column</th>
                            <th>image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($question as $questions)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $questions->question }} </td>
                                <td>{{ $questions->slug }}</td>
                                <td>{{ $questions->type }}</td>
                                <td>{{ $questions->option }}</td>
                                <td>{{$questions->class_name}}</td>
                                <td>{{ $questions->answer_column}}</td>

                                <td><img src="{{ url('images/' . $questions->image) }}" style="height:60px;width:60px"
                                        alt="photo"></td>
                                <td> {{ $questions->status }}</td>
                                <td>
                                    {{-- <form action="{{ route('admin.questions.destroy_status', [$questions->id]) }}"
                                        method="Post">
                                        @csrf --}}
                                        {{-- <button type="submit" style="font-size:16px" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete?')">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button> --}}

                                        <a style="font-size:24px "class="btn btn-xs btn-default text-primary mx-1 shadow"
                                        title="Edit" href="{{ route('admin.questions.edit', [$questions->id]) }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                {{-- </form> --}}

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
