<!DOCTYPE html>

<html>
<head>
<!-- Latest compiled and minified CSS -->

<link href="{{CSS}}bootstrap/3.3.7/bootstrap.min.css" rel="stylesheet">

<!-- Optional theme -->

<link href="{{CSS}}bootstrap/3.3.7/bootstrap-theme.min.css" rel="stylesheet">

<style>
  .cal-timer{
  width:100%;margin-top:60px;
}
.calcfit{
  margin-top:20px;width:250px;margin-left:30px;
}

.calcarrow{
  font-size:24px;font-weight:600;
}

</style>

</head>

<body>
<div class="Wrapper">

<div class="container">
  
  <table class="cal-timer">
  <tbody>
    <tr>
      <td class="cpsty">
           <img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="logo" class="calcfit">
      </td>
      <td class="cpstyone">
           <h4 class="text-center" class="calcarrow"> {{getSetting('site_title', 'site_settings')}} </h4>
          
      </td>
    </tr>
  </tbody>
  </table>
