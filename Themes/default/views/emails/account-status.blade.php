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
    <h5 class="text-center" class="contact-ustc">Your Account Status has been Changed</h5>
  </div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
      <p class="contact-us-para">Dear {{$user_name}}, </p>
      <p class="contact-us-para">Greetings,</p>
  <p class="contact-us-para">Thank you for using {{$site_title}}.</p>
    
    <p class="contact-us-para">
      Your Account has been {{$status}} by Admin.
    </p>
  
   
  <br><br>

   <br>

    @if ($status!='Activated')
    <p class="contact-us-para"> <a href="{{$link}}"> Please contact Admin for further details.</a> </p>

    <br><br>
    <br><br>
    @endif
  
<p class="contact-us-para">Sincerely, </p>
<p class="contact-us-para">Customer Support Services</p>

  </div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')