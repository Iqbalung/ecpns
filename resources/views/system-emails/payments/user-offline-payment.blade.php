 @include('system-emails.header')
    <style>
        .user-offlinefsmr{
          font-size:20px;margin:11px 0;
          }
          .user-offlinemr{
              margin:65px 0px;
          }
            .user-offlinefsfw{
              font-size:20px;font-weight:600;
          }   
    </style> 
 <div class="row">
    <div class="col-lg-12" >
    <h5 class="text-center">{{getPhrase('offline_payment_submitted')}}</h5>
  </div>
  </div>
   
   <div class="row">
    <div class="col-lg-12">
      <p class="user-offlinefsmr">Dear {{$username}}, </p>
      <p class="user-offlinefsmr">Greetings,</p>
  <p class="user-offlinefsmr">Your offline payment was successfully submitted to admin for {{$item_name}}</p><br>

<p class="user-offlinefsmr">Sincerely, </p>
<p class="user-offlinefsmr">Customer Support Services</p>

  </div>
   </div>

@include('system-emails.disclaimer')


