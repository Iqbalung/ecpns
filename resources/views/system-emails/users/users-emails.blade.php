 @include('system-emails.header')
 
 		<style>
   .contact-us-para{
    font-size:20px;margin:11px 0;
   }
  
 </style>
   
   <div class="row">
    <div class="col-lg-12">
   
  <p class="contact-us-para"><?php echo $content; ?></p><br>
  

<p class="contact-us-para">Sincerely, </p>
<p class="contact-us-para">Customer Support Services</p>

  </div>
   </div>

@include('system-emails.disclaimer')



