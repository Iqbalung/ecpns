 @include('system-emails.header')
 <style>
   .contact-us-para{
    font-size:20px;margin:11px 0;
   }
   .contact-uscol12{
    margin:65px 0px;
   }
   .contact-ustc{
    font-size:20px;font-weight:600;
   }
 </style>
 <div class="row">
    <div class="col-lg-12" class="contact-uscol12">
    <h5 class="text-center" class="contact-ustc">{{getPhrase('exam_result')}}</h5>
  </div>
  </div>
   
   <div class="row">
    <div class="col-lg-12">
      <p class="contact-us-para">Dear {{$username}}, </p>
      <p class="contact-us-para">Greetings,</p>
  <p class="contact-us-para">You are {{ucfirst($staus)}}ed in {{$exam_name}} exam, conducted on {{ $test_date }} and you got {{$percentage}}% percentage</p><br>
  
  

<p class="contact-us-para">Sincerely, </p>
<p class="contact-us-para">Customer Support Services</p>

  </div>
   </div>

@include('system-emails.disclaimer')


