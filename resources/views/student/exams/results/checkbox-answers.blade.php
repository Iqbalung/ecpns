    
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <ul class="optional-questions ">
                                    <div class="row"> 
                                        <?php 
                                        $index = 1;
                                        $options = json_decode($question->answers); 
                                        $correct_answers = json_decode($question->correct_answers);
                                        
                                        
                                        $local_index = 1;
                                        $correct_index = 0;
                                       
                                        foreach ($options as $option) {
                                            $correct_answer_class = '';
                                           
                                            
                                            if(count($correct_answers)) {
                                                if(isset($correct_answers[$correct_index]->answer)){
                                                if($correct_answers[$correct_index]->answer == $index){
                                                    $correct_answer_class = 'correct-answer';
                                                    $correct_index++;
                                                    
                                                   }
                                                }
                                            }

                                            $submitted_value = '';
                                            if($user_answers) {
                                                if(count($user_answers) >= $local_index) {
                                                   
                                                    if($user_answers[$local_index-1] == $index) {
                                                        $submitted_value = 'checked';
                                                        $local_index++;
                                                    }
                                                }
                                            }
                                           
                                        ?>
                                          <div class="col-md-6 margin-bottom30">                                 
                                        <li class="{{$correct_answer_class}} answer_checkbox">
                                            <input type="checkbox" name="{{$question->id}}" id="radio1" {{$submitted_value}} disabled>
                                            <label for="radio1"> <span class="fa-stack checkbox-button"> <i class="mdi mdi-check active"></i> </span>  <span class="language_l1">{!! $option->option_value !!}</span>
                                                  @if(isset($option->optionl2_value))
                                                     <span class="language_l2" style="display: none;">{!! $option->optionl2_value !!}</span>
                                                    @endif 
                                                      </label>
                                        </li>
                                        </div>
                                        <?php  $index++;
                                                } ?>

                                    
                                         </div>
                                    </ul>
                                    
                                </form>
                            </div>
                        </div>
                  