<?php
 
    $answers = json_decode($question->answers);

    $i=1;
   
 ?>

 <style>
    .sty-mlcb{
        margin-left: 15px;color:black;
        }
        .sty-mt{
            display: inline; margin-right: 12px;
        }
</style>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 select-answer select-option">

    <div class="sty-mlcb">
        <p><span class="language_l1" >{!!$question->second_question !!}</span></p>
         @if($question->right_question_file)
            <img src="{{$image_path.$question->right_question_file}}" >
            @endif
      </div>

    <ul class="row list-style-none">
    
     @foreach($answers as $answer)
     @if(isset($answer->option_value))
       <li class="col-md-12">
       <?php $rand_no = mt_rand(1,1000000); ?>
            <input  id="{{$answer->option_value}}_{{$rand_no}}" value="{{$i++}}" name="{{$question->id}}[]" type="checkbox" class="sty-mt">
           
                <label for="{{$answer->option_value}}_{{$rand_no}}">
                   
                     <span class="language_l1">{!! $answer->option_value !!}</span>
                     @if(isset($answer->optionl2_value))
                <span class="language_l2" style="display: none;">{!! $answer->optionl2_value !!}</span>
                 @else
                <span class="language_l2" style="display: none;">{!! $answer->option_value !!}</span>
                @endif
                </label>
            </input>
             @if($answer->has_file)
            <img src="{{$image_path.$answer->file_name}}" >
            @endif
        </li>  
        @endif
     @endforeach    

      

    </ul>
      
</div>
