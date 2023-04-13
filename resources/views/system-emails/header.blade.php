<!DOCTYPE html>

<html>
<head>
<!-- Latest compiled and minified CSS -->

<link href="{{CSS}}bootstrap/3.3.7/bootstrap.min.css" type="text/css">
<link href="{{CSS}}bootstrap/3.3.7/bootstrap-theme.min.css" type="text/css">


<!-- Optional theme -->

  
<style>

.yellotemplate-al{
  width:100%;margin-top:60px;
}
.yellow-templateimg{
  margin-top:20px;width:250px;margin-left:30px;
}

.t-temp-talh{
  font-size:24px;font-weight:600;
}
.yellow-template-tar{
  font-size:20px;font-weight:100;
}
.wid-70{
  width:70%;
}
.wid-30{
  width:30%;
}
  
</style>  

</head>

<body>
<div class="Wrapper">

<div class="container">
  
  <table class="yellotemplate-al">
  <tbody>
    <tr>
      <td class="wid-70" >
           <img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="logo" class="yellow-templateimg">
      </td>
      <td class="wid-30" >
           <h4 class="text-left" class="t-temp-talh">{{ getSetting('site_title','site_settings') }}</h4>
           <p class="text-left" class="yellow-template-tar">    
            {{ getSetting('site_address','site_settings') }}
           </p>
      </td>
    </tr>
  </tbody>
  </table>
