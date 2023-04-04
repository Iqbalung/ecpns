@include('emails.template_header')
  
  <style>
    .cf-fsm{
  font-size:20px;margin:11px 0;
}

.cf-mar{
  margin:65px 0px;
}

.cf-fsfw{
  font-size:20px;font-weight:600;
}
  </style>

 <div class="row">
    <div class="col-lg-12" class="cf-mar">
    <h5 class="text-center cf-fsfw">Your Account Status has been Changed</h5>
  </div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
      <p class="cf-fsm">Dear {{$user_name}}, </p>
      <p class="cf-fsm">Greetings,</p>
  <p class="cf-fsm">Thank you for using {{$site_title}}.</p>
    
    <p class="cf-fsm">
      Your Account has been {{$status}} by Admin.
    </p>
  
   
  <br><br>

   <br>

    @if ($status!='Activated')
    <p class="cf-fsm"> <a href="{{$link}}"> Please contact Admin for further details.</a> </p>

    <br><br>
    <br><br>
    @endif
  
<p class="cf-fsm">Sincerely, </p>
<p class="cf-fsm">Customer Support Services</p>

  </div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')