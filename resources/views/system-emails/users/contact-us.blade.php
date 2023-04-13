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
	  <h5 class="text-center" class="contact-ustc">User Conatct Details</h5>
	</div>
  </div>
   
   <div class="row">
    <div class="col-lg-12">
      <p class="contact-us-para">Dear {{$user_name}}, </p>
      <p class="contact-us-para">Greetings,</p>
  <p class="contact-us-para">One of user is contact you form the site</p><br>
  <p class="contact-us-para">User Details</p>
  
  <p class="contact-us-para">Username : {{$name}}</p>
  <p class="contact-us-para">Number   : {{$number}}</p>
  <p class="contact-us-para">Email    : {{$email}}</p>
  <p class="contact-us-para">Subject  : {{$subject}}</p>
  <p class="contact-us-para">Message  : {{$user_message}}</p>

<p class="contact-us-para">Sincerely, </p>
<p class="contact-us-para">Customer Support Services</p>

	</div>
   </div>

@include('system-emails.disclaimer')


