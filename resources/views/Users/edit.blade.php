@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">


                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}" />


                    <div class="col-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Users</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder=""
                                        value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder=""
                                        value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="country">country</label>
                                    <input type="text" name="country" class="form-control" id="country" placeholder=""
                                        value="{{ $user->country }}">
                                </div>
                                <div class="form-group">
                                    <label for="district_id">district</label>
                                    <select name="district_id" class="form-control" id="district_id">
                                        <option value="">--Select Project--</option>
                                        @foreach ($districts as $district)
                                            <option
                                                value="{{ $district->id }}"@if ($district->id == $user->district_id) {{ 'selected =selected' }} @endif>
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- project --}}
                                <div class="form-group">
                                    <label for="project_id">project name</label>
                                    <select name="project_id" class="form-control" id="project_id">
                                        <option value="">--Select Project--</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}"
                                                @if ($project->id == $user->project_id) {{ 'selected =selected' }} @endif>
                                                {{ $project->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Activity --}}
                                <div class="form-group">
                                    <label for="activity_id">activity_id</label>
                                    <select name="activity_id" class="form-control" id="activity_id">
                                        <option value=""> --Select Activity-- </option>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#project_id').change(function(event) {
                var idprojects = this.value;
                //  alert(idprojects);
                $('#activity_id').html('');

                $.ajax({
                    url: "{{ url('users/fetchActivity') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        project_id: idprojects,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        $('#activity_id').html(
                            '<option value=""> --Select Activity-- </option>');
                        $.each(response.activity, function(index, val) {
                            $('#activity_id').append('<option value="' + val.id + '">' +
                                val.name + ' </option>');

                        })

                    }
                })
            })
        })
    </script>
@endsection
