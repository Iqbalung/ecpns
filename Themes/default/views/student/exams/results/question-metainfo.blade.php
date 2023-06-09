                       <?php

                                    $image_path = PREFIX.(new App\ImageSettings())->

                                    getExamImagePath();



                                    ?>

                               <style>
                                 .qqf{
                                  max-height:200px;
                                 }
                               </style>     

                    <div class="questions questions-withno">

                            <span class="question-numbers">Q {{$question_number}}.</span>

                               <span class="language_l1">{!! $question->question !!}   </span>
                               @if($question->question)
                                    <span class="language_l2" style="display: none;">{!! $question->question_l2 !!}   </span> <br>
                                    @else
                                    <span class="language_l2" style="display: none;">{!! $question->question !!}   </span> <br>
                                    @endif

  <div class="col-md-8 text-center">
  @if($question->question_type!='audio' && $question->question_type !='video')
  @if($question->question_file)
  <img class="image " src="{{$image_path.$question->question_file}}" class="qqf" >
  @endif
  @endif
  </div>



                        </div>

                    <?php
                    $meta = (object)$meta;
                   $question = $meta->question;
                    $time_spent = $meta->time_spent;

                    $timing_lable = 'label label-danger';


                    if($question->time_to_spend > $time_spent->time_spent)

                    {

                        $timing_lable = 'label label-info';

                    }



                    ?>

                        <div class="answer-status-container">

                        <div class="row">

                            <div class="col-md-3">

                                <div class="question-status">

                                    <strong>{{getPhrase('time_limit')}}: </strong>

                                    {{gmdate("H:i:s", $question->time_to_spend)}}

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="question-status">

                                    <strong>{{getPhrase('time_taken')}}: </strong>

                                    <span class="{{$timing_lable}}"> {{gmdate("H:i:s", $time_spent->time_spent)}} </span>



                                </div>

                            </div>

                            <div class="col-md-6">
                              <div class="question-status pull-right">

                                <strong>{{getPhrase('subject')}}:</strong>

                                {{$subject->subject_title}}

                            </div>
                            </div>





                        </div>

                        </div>

                        <hr>