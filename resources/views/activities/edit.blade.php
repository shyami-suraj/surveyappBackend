@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">


                <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $activity->id }}" />


                    <div class="col-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Activitie</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="" value="{{ $activity->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="project_id">Project Name</label>
                                    <select name="project_id" class="form-control" id="project_id">
                                        <option value="">--Select Project--</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}"  @if ($project->id ==$activity->project_id) {{'selected =selected'}}
                                                @endif>{{ $project->name }}</option>
                                        @endforeach
                                    </select>
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
