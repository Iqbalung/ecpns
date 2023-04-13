<!DOCTYPE html>

<html lang="en">



<head>

<link href="{{CSS}}bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">

    <title>{{getphrase('certificate_for').' '.$user->name}}</title>
  <style>
    .certificate-area{
    width:800px; margin: 0 auto; min-height:600px; padding:20px; text-align:center;  box-sizing:border-box; border: 10px solid #787878; position:relative;

    }
    .certificate-area-one{
      padding:60px 60px 30px; text-align:center; color:#333; line-height:26px; font-family:calibari; border: 5px solid #787878; box-sizing:border-box;position:relative;
    }
    .certificate-area-spanone{
      position: absolute;right: 15px;top: 15px; text-align:left; font-family:arial; color:#777;
    }
    .certifiacte-area-b{
      font-size:16px;
    }
    .certificate-area-designation{
      font-size:14px; 
      color:#aaa;
    }.certificate-area-img{
        position: absolute;right: 0;top: 0;
    }
    .certificate-family{
      font-family:arial;
    }
  </style> 
</head>



<body>

    <div class="certificate-area"  id='printarea'>

        <img src="{{IMAGE_PATH_SETTINGS.getSetting('watermark_image','certificate')}}" class="certificate-area-img" width="100%" alt="">

        <!--border: 10px solid #787878;-->

        <div class="certificate-area-one">


            <span class="certificate-area-spanone">Date: <br>

              <b>{{date("Y M d")}}</b>

              </span>

           <span ><img src="{{IMAGE_PATH_SETTINGS.getSetting('logo','certificate')}}" height="80" alt=""></span>

            <hr>

            <br>

            <br> 

			{!!$content!!}

            <br/>

            <br/>

            <br/>

            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="certificate-family">

                <tr>

                    <td align="left"><img src="{{IMAGE_PATH_SETTINGS.getSetting('left_sign_image','certificate')}}" width="150" alt="">

                        <br/><b class="certifiacte-area-b" >{{getSetting('left_sign_name','certificate')}}</b>

                        <br> <span class="certificate-area-designation">{{getSetting('left_sign_designation','certificate')}}</span></td>

                    <td align="center"> <img src="{{IMAGE_PATH_SETTINGS.getSetting('bottom_middle_logo','certificate')}}" width="100" alt=""></td>

                    <td align="right"><img src="{{IMAGE_PATH_SETTINGS.getSetting('right_sign_image','certificate')}}" width="150" alt="">

                        <br/><b class="certifiacte-area-b">{{getSetting('right_sign_name','certificate')}}</b>

                        <br> <span class="certificate-area-designation">{{getSetting('right_sign_designation','certificate')}}</span></td>

                </tr>

            </table>

        </div>

    </div>
<hr>
<div class="text-center">
  <button class="btn btn-primary" onclick="printIt();">{{getPhrase('print')}}</button>
  </div>

    

</body>



<script src="{{JS}}jquery.min.js"></script>

<script>

function printIt() {

     var divToPrint=document.getElementById('printarea');



  var newWin=window.open('','Print-Window');



  newWin.document.open();



  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');



  newWin.document.close();



  setTimeout(function(){newWin.close();},10);

}

</script>



</html>