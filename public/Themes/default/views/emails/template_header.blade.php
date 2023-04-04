<!DOCTYPE html>

<html>
<head>
<!-- Latest compiled and minified CSS -->

<link href="{{CSS}}bootstrap/3.3.7/bootstrap.min.css" rel="stylesheet">

<!-- Optional theme -->

<link href="{{CSS}}bootstrap/3.3.7/bootstrap-theme.min.css" rel="stylesheet">

<style>
.temptable-head{
  width:100%;margin-top:60px;
}
.temptable-td{
  width:70%;
}
.temptable-tdimg{
  margin-top:20px;width:250px;margin-left:30px;
}
.temptable-tdone{
  width:30%;
}
.temtdtc{
  font-size:24px;font-weight:600;
}
</style>

</head>

<body>
<div class="Wrapper">

<div class="container">
  
  <table class="temptable-head">
  <tbody>
    <tr>
      <td class="temptable-td">
           <img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="logo" class="temptable-tdimg">
      </td>
      <td class="temptable-tdone">
           <h4 class="text-center temtdtc"> {{getSetting('site_title', 'site_settings')}} </h4>
          
      </td>
    </tr>
  </tbody>
  </table>
