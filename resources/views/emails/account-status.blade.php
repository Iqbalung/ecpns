@include('emails.template_header')

<style>
  .collg12style{
    margin:65px 0px;
  }
  .text-center{
    font-size:20px;
    font-weight:600;
  }
  .emailpara{
    font-size:20px;
    margin:11px 0;
  }
</style>

 <div class="row">
    <div class="col-lg-12 collg12style">
    <h5 class="text-center">Your Account Status has been Changed</h5>
  </div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
      <p class="emailpara" >Dear {{$user_name}}, </p>
      <p class="emailpara">Greetings,</p>
  <p class="emailpara">Thank you for using {{$site_title}}.</p>
    
    <p class="emailpara">
      Your Account has been {{$status}} by Admin.
    </p>
  
   
  <br><br>

   <br>

    @if ($status!='Activated')
    <p class="emailpara"> <a href="{{$link}}"> Please contact Admin for further details.</a> </p>

    <br><br>
    <br><br>
    @endif
  
<p class="emailpara">Sincerely, </p>
<p class="emailpara">Customer Support Services</p>

  </div>
   </div>



@include('emails.disclaimer')


@include('emails.template_footer')