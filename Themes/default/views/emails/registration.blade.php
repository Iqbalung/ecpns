@include('emails.template_header')

<style>
     .reg-bdy{
        background: black; color: white;
      }
      .reg-spnlst{
        color: #ffffff; font-weight: 300;
      }
      .regalst{
        color: #ffffff; text-align:center;text-decoration: none;
      }
      .reg-tdlst{
        background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;
      }
      .reg-tdfiv{
        font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #666666; text-align:left;line-height: 24px;
      }
      .reg-tdfour{
        font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;
      }
 </style>

<div class="block">
   <!-- Full + text -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="fullimage">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
                  <tbody>
                     <tr>
                        <td width="100%" height="20"></td>
                     </tr>
                     <tr>
                        <td>
                           <table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
                              <tbody>
                                 <!-- title -->
                                 <tr>
                                    <td class="reg-tdfour" st-title="rightimage-title">  </td>
                                 </tr>
                                 <!-- end of title -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>
                                 <!-- Spacing -->
                                 <!-- content -->
                                 <tr>
                                    <td class="reg-tdfiv" st-content="rightimage-paragraph"> {{ $content }} </td>
                                 </tr>
                                 <!-- end of content -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>
                                 
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>
                                 <!-- button -->
                                 <tr>
                                    <td>
                                       <table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                          <tbody>
                                             <tr>
                                                <td width="auto" align="center" valign="middle" height="30" class="reg-tdlst"> 
                                                  <span class="reg-spnlst">
                                                   <a class="regalst" href="{{PREFIX}}">Read More</a>
                                                   </span> 
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <!-- /button -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="20"></td>
                                 </tr>
                                 <!-- Spacing -->
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
</div>


@include('emails.template_footer')

{{--
<html>
    <head>
    </head>
    <body class="reg-bdy">
        <h1>
            {{$title}}
        </h1>
        <p>
            {{$content}}
        </p>
    </body>
</html>
--}}
