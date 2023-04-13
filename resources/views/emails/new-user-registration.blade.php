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
    <h5 class="text-center">Registration was successfull</h5>
  </div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
      <p class="new-reg-col">Dear {{$user_name}}, </p>
      <p class="new-reg-col">Greetings,</p>
  <p class="new-reg-col">Thank you for your registration with {{getSetting('site_title','site_settings')}}.</p>
    <p class="new-reg-col"><a href="{{$link}}"> Click here to active your account</a></p>
  
    <br>
    <p class="new-reg-col">After active your account, You can login with the below details</p>
  <p class="new-reg-col"><strong>Email:</strong> {{$email}}</p>
  <p class="new-reg-col"><strong>Password:</strong> {{$password}}</p>
  <br><br>


  
<p class="new-reg-col">Sincerely, </p>
<p class="new-reg-col">Customer Support Services</p>

  </div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')