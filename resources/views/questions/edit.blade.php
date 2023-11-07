@extends('adminlte::page')
@section('content')
    <div class="c-container">

        <div class="p-div">
            <div class="p-left">


                <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $question->id }}" />


                    <div class="col-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit question Form</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="card-body">
                                    {{-- project --}}
                                    <div class="form-group">
                                        <label for="question">question</label>
                                        <input type="text" name="question" class="form-control" id="question"
                                            placeholder="" value="{{ $question->question }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug"
                                            placeholder="" value="{{ $question->slug }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Question Type</label>
                                        <select name="type" class="form-control select-role-id" id="question_type">
                                            <option value="">Select</option>
                                            <option value="textfield"
                                                @if ('textfield' == $question->type) {{ 'selected =selected' }} @endif>
                                                TextField</option>
                                            <option value="textarea"
                                                @if ('textarea' == $question->type) {{ 'selected =selected' }} @endif>TextArea
                                            </option>
                                            <option value="selectbox"
                                                @if ('selectbox' == $question->type) {{ 'selected =selected' }} @endif>
                                                Selectbox</option>
                                            <option value="checkbox"
                                                @if ('checkbox' == $question->type) {{ 'selected =selected' }} @endif>Checkbox
                                            </option>
                                            <option value="radio"
                                                @if ('radio' == $question->type) {{ 'selected =selected' }} @endif>Radio
                                                Button</option>
                                            <option value="date"
                                                @if ('date' == $question->type) {{ 'selected =selected' }} @endif>Date
                                            </option>
                                            <option value="fileupload"
                                                @if ('fileupload' == $question->type) {{ 'selected =selected' }} @endif>File
                                                Upload</option>
                                        </select>
                                    </div>
                                    <div class="q_option d-none">
                                        <label for="option">option</label>
                                        <textarea name="option" class="form-control" rows="3"
                                            placeholder="option1:value1|option2:value2|option3:value3......" style="height: 64px;" id="option">{{ $question->option }}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="class_name">class_name</label>
                                        <input type="text" name="class_name" class="form-control" id="class_name"
                                            placeholder="" value="{{ $question->class_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="answer_column">answer_column</label>
                                        <input type="text" name="answer_column" class="form-control" id="answer_column"
                                            placeholder="" value="{{ $question->answer_column }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">photos</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                            </div>
                                            <img src="{{ url('images/' . $question->image) }}"
                                                style=" padding-left:5px;height:100px;width:100px"alt="photo">
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
            $('#question_type').on('change', function(e) {
                console.log($(this).val());
                if (($(this).val() == "selectbox") || ($(this).val() == "checkbox") || ($(this).val() == "radio")) {
                    $('.q_option').removeClass('d-none');
                } else {
                    $('.q_option').addClass('d-none');

                }

            });


            let q_type = $('#question_type').val();
            if(q_type == 'checkbox' || q_type == 'selectbox' || q_type == 'radio'){
                $('.q_option').removeClass('d-none');
            }
        })
    </script>
@endsection
