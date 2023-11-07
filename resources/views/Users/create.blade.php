@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">

                <div class="">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="phone">phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="name">password</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="name">country</label>
                                    <input type="text" name="country" class="form-control" id="country" placeholder="">
                                </div>


                                <div class="form-group">
                                    <label for="district_id">district_id</label>
                                    <select name="district_id" class="form-control" id="district_id">
                                        <option value="">--Select Project--</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- project --}}
                                <div class="form-group">
                                    <label for="project_id">project_id</label>
                                    <select name="project_id" class="form-control" id="project_id">
                                        <option value="">--Select Project--</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
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




                                <input type="hidden" name="user_type" value="BP" />


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
                                        $('#activity_id').html('<option value=""> --Select Activity-- </option>');
                                        $.each(response.activity, function(index, val) {
                                            $('#activity_id').append('<option value="' + val.id + '">'
                                                +val.name + ' </option>');

                                        })

                                    }
                                })
                            })
                        })
                    </script>
                @endsection
