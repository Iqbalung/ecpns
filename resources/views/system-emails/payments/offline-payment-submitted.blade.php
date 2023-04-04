 @include('system-emails.header')
 <style>
 .yellotemplate-al{
  margin:65px 0px;
}
.yellow-templateimg{
  font-size:20px;font-weight:600;
}

.t-temp-talh{
  font-size:20px;margin:11px 0;
}
</style>
 <div class="row">
    <div class="col-lg-12" class="yellotemplate-al" >
    <h5 class="text-center" class="yellow-templateimg">{{getPhrase('offline_payment_submitted')}}</h5>
  </div>
  </div>
   
   <div class="row">
    <div class="col-lg-12">
      <p class="t-temp-talh" >Dear {{$username}}, </p>
      <p class="t-temp-talh" >Greetings,</p>
  <p class="t-temp-talh" >User {{ $name  }}  is submitted a offline payment for {{$item_name}}</p><br>
  <p class="t-temp-talh" >{{getPhrase('please_verify_the_payment_details_update_the_payment_status')}}</p><br>
  

<p class="t-temp-talh" >Sincerely, </p>
<p class="t-temp-talh" >Customer Support Services</p>

  </div>
   </div>

@include('system-emails.disclaimer')


