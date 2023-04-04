<!DOCTYPE html>

<html lang="en">



<head>

<link href="{{CSS}}bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">

    <title>{{getphrase('certificate_for').' '.$user->name}}</title>

    <style>
      .temptable-head{
      width:800px; margin: 0 auto; min-height:600px; padding:20px; text-align:center;  box-sizing:border-box; border: 10px solid #787878; position:relative;
      }
      .temptable-td{
      padding:60px 60px 30px; text-align:center; color:#333; line-height:26px; font-family:calibari; border: 5px solid #787878; box-sizing:border-box;position:relative;
      }
      .temptable-span{
      position: absolute;right: 15px;top: 15px; text-align:left; font-family:arial; color:#777
      }
      .tempb{
      font-size:16px;
      }
      .temtdtc{
      font-size:14px; color:#aaa;
      }
      .reg-tdfour{
      font-size:14px; color:#aaa;
      }
      .tem-ffsty{
        font-family:arial;
      }
    </style>

</head>



<body>

    <div class="temptable-head" id='printarea'>

        <img src="{{IMAGE_PATH_SETTINGS.getSetting('watermark_image','certificate')}}" class="temptable-tdimg" width="100%" alt="">

        <!--border: 10px solid #787878;-->

        <div class="temptable-td">

           

            <span class="temptable-span">Date: <br>

             

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

            <table cellpadding="0" cellspacing="0" border="0" width="100%"  class="tem-ffsty">

                <tr>

                    <td align="left"><img src="{{IMAGE_PATH_SETTINGS.getSetting('left_sign_image','certificate')}}" width="150" alt="">

                        <br/><b class="tempb">{{getSetting('left_sign_name','certificate')}}</b>

                        <br> <span class="temtdtc">{{getSetting('left_sign_designation','certificate')}}</span></td>

                    <td align="center"> <img src="{{IMAGE_PATH_SETTINGS.getSetting('bottom_middle_logo','certificate')}}" width="100" alt=""></td>

                    <td align="right"><img src="{{IMAGE_PATH_SETTINGS.getSetting('right_sign_image','certificate')}}" width="150" alt="">

                        <br/><b class="tempb">{{getSetting('right_sign_name','certificate')}}</b>

                        <br> <span class="reg-tdfour">{{getSetting('right_sign_designation','certificate')}}</span></td>

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