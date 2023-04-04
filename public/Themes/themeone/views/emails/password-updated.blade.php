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
	  <h5 class="text-center" class="cf-fsfw">Password updated successfully</h5>
	</div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
    	<p class="cf-fsm">Dear {{$user_name}}, </p>
      <p class="cf-fsm">Greetings,</p>
	<p class="cf-fsm">Your password is updated.</p>
  <p class="cf-fsm">Please find the login details</p>
  <p class="cf-fsm"><strong>Email:</strong> {{$email}}</p>
  <p class="cf-fsm"><strong>Password:</strong> {{$password}}</p>


    <br>
    <p class="cf-fsm"><a href="{{URL_USERS_LOGIN}}"> Click here to Login</a></p>
  <br><br>


  
<p class="cf-fsm">Sincerely, </p>
<p class="cf-fsm">Customer Support Services</p>

	</div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')