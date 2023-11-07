{{-- @extends('layouts.app') --}}

@extends('adminlte::page')
@section('content')
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">User</h3>

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
                    <form action="{{ route('admin.surveyfilter') }}" method="GET" >
                        {{-- project --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="project_id">project_id</label>
                                <select name="project_id" class="form-control" id="project_id">
                                    <option value="">--Select Project--</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" > {{ $project->name }}</option>
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
                        </div>
                        <button type="submit" class="btn  btn-primary "
                            style="width:150px;margin:5px;">submit</button>
                    </form>
                    @if (!empty($survey))
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Bp_id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>

                                @foreach ($question as $que )
                                    <th>{{$que}}</th>
                                @endforeach





                            </tr>
                        </thead>
                        <tbody>



                            @foreach ($survey as $surveys)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $surveys->BP_id }}</td>
                                    <td>{{ $surveys->name }}</td>
                                    <td>{{ $surveys->email }}</td>
                                    <td>{{ $surveys->phone }}</td>
                                    <td>{{ $surveys->address }}</td>
                                    <td>{{ $surveys->gender }}</td>
                                    @foreach ($answer as $ans )
                                        <td>{{$surveys->$ans}}</td>
                                    @endforeach
                                </tr>
                            @endforeach



                        </tbody>
                        @endif
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
@extends('layouts.footer')

@section('js')
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
