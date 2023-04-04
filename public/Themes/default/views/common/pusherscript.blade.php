  

  <link rel="stylesheet" href="{{CSS}}alertify/themes/alertify.core.css" >

  <link rel="stylesheet" href="{{CSS}}alertify/themes/alertify.default.css" id="toggleCSS" >



 <script src="{{JS}}alertify.js"></script>

<script src="{{JS}}pusher/pusher.min.js"></script>
 
  <script>



    // Enable pusher logging - don't include this in production

     Pusher.logToConsole = true;

    <?php $pusher_key = getSetting('pusher_key','push_notifications'); ?>

    {{-- var pusher = new Pusher('{{env('PUSHER_KEY')}}',  --}}

    var pusher = new Pusher('{{$pusher_key}}', 

    {

      encrypted: true

    });

    var channel = pusher.subscribe('admin');



    channel.bind('newUser', function(data) {


      alertify.success("Hi Admin,</br>New Student Joined" );
       

    });



    

  </script>