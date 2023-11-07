@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">


                <form action="{{ route('admin.question_mapper.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $question_mappers->id }}" />


                    <div class="col-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit question_mapper Form</h3>


                            </div>
                            <!-- /.card-header -->
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
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">update</button>
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
                    <!-- bs-custom-file-input -->
                    <script src="{{ url('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
                    <script>
                        $(document).ready(function() {
                            bsCustomFileInput.init()
                        })
                    </script>
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#project_id').change(function(event) {
                            var idprojects = this.value;
                            //  alert(idprojects);
                            $('#activity_id').html('');

                            $.ajax({
                                url: "{{ url('questions/fetchActivity') }}",
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
