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
    <h5 class="text-center" class="contact-ustc">Registration was successfull</h5>
  </div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
      <p class="contact-us-para">Dear {{$user_name}}, </p>
      <p class="contact-us-para">Greetings,</p>
  <p class="contact-us-para">Thank you for your registration with {{getSetting('site_title','site_settings')}}.</p>
    <p class="contact-us-para"><a href="{{$link}}"> Click here to active your account</a></p>
  
    <br>
    <p class="contact-us-para">After active your account, You can login with the below details</p>
  <p class="contact-us-para"><strong>Email:</strong> {{$email}}</p>
  <p class="contact-us-para"><strong>Password:</strong> {{$password}}</p>
  <br><br>


  
<p class="contact-us-para">Sincerely, </p>
<p class="contact-us-para">Customer Support Services</p>

  </div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')