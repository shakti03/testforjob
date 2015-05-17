<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Question</h4>
        </div>
        {{ Form::open(['url' => 'admin/test/question/add', 'class'=>'form-horizontal', 'id'=>'addQuestionForm','method'=>'post' ,'enctype'=>'multipart/form-data'])}}
        <div class="modal-body">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="test_slug" value="{{$slug}}">
            <input type="hidden" name="question_type" value="{{$question_type}}">
            <div id="alertMessage"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">Question :</label>
                        <div class="col-md-10">
                            {{ Form::textarea('question', '', ['class'=>'form-control','placeholder'=>'Enter question','rows'=>'2', 'required'])}}
                        </div>
                    </div>
                </div>
            </div>
            @if($question_type == 'objective')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">A :</label>
                        <div class="col-md-10">
                            {{ Form::textarea('option_a', '', ['class'=>'form-control','placeholder'=>'Enter option A','rows'=>'1', 'required']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">B :</label>
                        <div class="col-md-10">
                            {{ Form::textarea('option_b', '', ['class'=>'form-control','placeholder'=>'Enter option B','rows'=>'1', 'required']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">C :</label>
                        <div class="col-md-10">
                            {{ Form::textarea('option_c', '', ['class'=>'form-control','placeholder'=>'Enter option C','rows'=>'1', 'required'] )}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">D :</label>
                        <div class="col-md-10">
                            {{ Form::textarea('option_d', '', ['class'=>'form-control','placeholder'=>'Enter option D','rows'=>'1', 'required']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">Answer :</label>
                        <div class="col-md-2">
                            {{--*/ $options = ['a'=>'A','b'=>'B','c'=>'C','d'=>'D']; /*--}}
                            {{ Form::select('answer', $options ,'a', ['class'=>'form-control','required'] )}}
                        </div>
                    </div>
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2 text-right">Study solution :</label>
                        <div class="col-md-10">
                            {{ Form::file('study_solution',  ['class'=>'form-control','placeholder'=>'Select an image'] )}}
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group formElement" id="testName">
                        <label class="col-md-2  text-right">Answer :</label>
                        <div class="col-md-10">
                            {{ Form::textarea('answer', '', ['class'=>'form-control','placeholder'=>'Enter answer','rows'=>'1', 'required']) }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        {{Form::close()}}
    </div>
  </div>
</div>
{{HTML::script('assets/admin/js/jquery.form.min.js')}}