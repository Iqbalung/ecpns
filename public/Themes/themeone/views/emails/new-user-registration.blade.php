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
    <div class="col-lg-12 cf-mar">
    <h5 class="text-center cf-fsfw">Registration was successfull</h5>
  </div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
      <p class="cf-fsm">Dear {{$user_name}}, </p>
      <p class="cf-fsm">Greetings,</p>
  <p class="cf-fsm">Thank you for your registration with {{getSetting('site_title','site_settings')}}.</p>
    <p class="cf-fsm"><a href="{{$link}}"> Click here to active your account</a></p>
  
    <br>
    <p class="cf-fsm">After active your account, You can login with the below details</p>
  <p class="cf-fsm"><strong>Email:</strong> {{$email}}</p>
  <p class="cf-fsm"><strong>Password:</strong> {{$password}}</p>
  <br><br>


  
<p class="cf-fsm">Sincerely, </p>
<p class="cf-fsm">Customer Support Services</p>

  </div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')