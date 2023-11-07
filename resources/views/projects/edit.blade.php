@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">


                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $project->id }}" />


                    <div class="col-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Project Name</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="" value="{{ $project->name }}">
                                </div>



                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>


                </form>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>







        </form>

    </div>




    </form>
@endsection
@section('js')
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection
