@include('emails.template_header')
   <style>
      .margin-col{
        margin:65px 
        0px;
      }
      .text-center{
        font-size:20px;
        font-weight:600;
      }
      .new-reg-col{
        font-size:20px;
        margin:11px 0;
      }
    </style>
 <div class="row">
    <div class="col-lg-12 margin-col">
	  <h5 class="text-center">Password updated successfully</h5>
	</div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
    	<p class="new-reg-col">Dear {{$user_name}}, </p>
      <p class="new-reg-col">Greetings,</p>
	<p class="new-reg-col">Your password is updated.</p>
  <p class="new-reg-col">Please find the login details</p>
  <p class="new-reg-col"><strong>Email:</strong> {{$email}}</p>
  <p class="new-reg-col"><strong>Password:</strong> {{$password}}</p>


    <br>
    <p class="new-reg-col"><a href="{{URL_USERS_LOGIN}}"> Click here to Login</a></p>
  <br><br>


  
<p class="new-reg-col">Sincerely, </p>
<p class="new-reg-col">Customer Support Services</p>

	</div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')