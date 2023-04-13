 @include('system-emails.header')
    <style>
      .offline-pay-cancl{
        font-size:20px;margin:11px 0;
      }
      .offline-pay-mr{
          margin:65px 0px;
      }
      .offline-pay-fs{
          font-size:20px;font-weight:600;
      }
   </style>
 <div class="row">
    <div class="col-lg-12" class="offline-pay-mr">
    <h5 class="text-center" class="offline-pay-fs">{{getPhrase('offline_payment_cancelled')}}</h5>
  </div>
  </div>
   
   <div class="row">
    <div class="col-lg-12">
      <p class="offline-pay-cancl">Dear {{$username}}, </p>
      <p class="offline-pay-cancl">Greetings,</p>
  <p class="offline-pay-cancl">Your offline payment is cancelled for {{$plan}}</p><br>
  <p class="offline-pay-cancl"><b>Comments:</b>{{$comments}}</p>
  
  

<p class="offline-pay-cancl">Sincerely, </p>
<p class="offline-pay-cancl">Customer Support Services</p>

  </div>
   </div>

@include('system-emails.disclaimer')


