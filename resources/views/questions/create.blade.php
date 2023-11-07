@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">

                <div class="">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Question</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="card-body">
                                {{-- project --}}
                                <div class="form-group">
                                    <label for="question">question</label>
                                    <input type="text" name="question" class="form-control" id="question"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="slug">slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Question Type</label>
                                    <select name="type" class="form-control select-role-id" id="question_type">
                                        <option value="">Select</option>
                                        <option value="textfield">TextField</option>
                                        <option value="textarea">TextArea</option>
                                        <option value="selectbox">Selectbox</option>
                                        <option value="checkbox">Checkbox</option>
                                        <option value="radio">Radio Button</option>
                                        <option value="date">Date</option>
                                        <option value="fileupload">File Upload</option>
                                    </select>
                                </div>


                                <div class="qc_option d-none">
                                    <label for="option">option</label>
                                    <textarea name="option" class="form-control" rows="3"
                                        placeholder="option1:value1|option2:value2|option3:value3......" style="height: 64px;" id="option"></textarea>
                                </div>



                                <div class="form-group">
                                    <label for="class_name">class_name</label>
                                    <input type="text" name="class_name" class="form-control" id="class_name"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="answer_column">answer_column</label>
                                    <input type="text" name="answer_column" class="form-control" id="answer_column"
                                        placeholder="" value="{{ array_shift($free_answer_columns) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">photos</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <div class="form-group">
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        </div>

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
                    <script src="{{ url('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
                    <script>
                        $(document).ready(function() {
                            bsCustomFileInput.init()
                            $('#question_type').on('change', function(e) {
                                console.log($(this).val());
                                if (($(this).val() == "selectbox") || ($(this).val() == "checkbox") || ($(this).val() ==
                                        "radio")) {
                                    $('.qc_option').removeClass('d-none');
                                } else {
                                    $('.qc_option').addClass('d-none');

                                }

                            });




                        })
                    </script>
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                    <script></script>
                @endsection
