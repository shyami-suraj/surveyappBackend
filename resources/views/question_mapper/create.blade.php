@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">

                <div class="">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add question mapper</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('admin.question_mapper.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
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
                                <div class="form-group">
                                    <label for="question_id">question_id</label>
                                    <select name="question_id" class="form-control" id="project_id">
                                        <option value="">--Select Project--</option>
                                        @foreach ($questions as $question)
                                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="order">order</label>
                                    <input type="number" name="order" class="form-control" id="order"
                                        placeholder="">
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
                                    url: "{{ url('question_mapper/fetchActivity') }}",
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
