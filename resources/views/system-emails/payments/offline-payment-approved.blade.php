 @include('system-emails.header')
 <style>
        .offline-payment-sty{
            margin:65px 0px;
        }
        .offline-payment-colname{
            font-size:20px;font-weight:600;
        }
        .offline-paymentsamefm{
            font-size:20px;margin:11px 0;
        }
        
</style>
 <div class="row">
    <div class="col-lg-12" class="offline-payment-sty">
    <h5 class="text-center" class="offline-payment-colname
offline-payment-colname">{{getPhrase('offline_payment_approved')}}</h5>
  </div>
  </div>
   
   <div class="row">
    <div class="col-lg-12">
      <p class="offline-paymentsamefm">Dear {{$username}}, </p>
      <p class="offline-paymentsamefm">Greetings,</p>
  <p class="offline-paymentsamefm">Your offline payment is approved for {{$plan}}</p><br>
  
  

<p class="offline-paymentsamefm">Sincerely, </p>
<p class="offline-paymentsamefm">Customer Support Services</p>

  </div>
   </div>

@include('system-emails.disclaimer')


