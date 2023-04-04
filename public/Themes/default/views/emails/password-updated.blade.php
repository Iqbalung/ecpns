@include('emails.template_header')
   
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
	  <h5 class="text-center" class="contact-ustc">Password updated successfully</h5>
	</div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
    	<p class="contact-us-para">Dear {{$user_name}}, </p>
      <p class="contact-us-para">Greetings,</p>
	<p class="contact-us-para">Your password is updated.</p>
  <p class="contact-us-para">Please find the login details</p>
  <p class="contact-us-para"><strong>Email:</strong> {{$email}}</p>
  <p class="contact-us-para"><strong>Password:</strong> {{$password}}</p>


    <br>
    <p class="contact-us-para"><a href="{{URL_USERS_LOGIN}}"> Click here to Login</a></p>
  <br><br>


  
<p class="contact-us-para">Sincerely, </p>
<p class="contact-us-para">Customer Support Services</p>

	</div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')