@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">

                <div class="">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Project</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="">
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
