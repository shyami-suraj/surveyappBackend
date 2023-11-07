@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">

                <div class="">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Activities</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="project_id">project_id</label>
                                    <select name="project_id" class="form-control" id="project_id">
                                        <option value="">--Select Project--</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-sm-6">
                                        <!-- select -->

                                      </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>


                        </form>
                    </div>
                    <!-- /.card -->

                @stop


                @section('js')
                    <!-- Bootstrap 4 -->
                    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                    <!-- bs-custom-file-input -->
                    {{-- <script src="{{ url('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
                    <script>
                        $(document).ready(function() {
                            bsCustomFileInput.init()
                        })
                    </script> --}}
                @endsection
