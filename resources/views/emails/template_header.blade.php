<!DOCTYPE html>

<html>
<head>
<!-- Latest compiled and minified CSS -->

<link href="{{CSS}}bootstrap/3.3.7/bootstrap.min.css" rel="stylesheet">

<!-- Optional theme -->

<link href="{{CSS}}bootstrap/3.3.7/bootstrap-theme.min.css" rel="stylesheet">

<style>
  .template-header-table{
    width:100%;
    margin-top:60px;
  }
  .template-header-tabletd{
    width:70%;
  }
  .template-header-tabtdone{
    width:30%;
  }
  .template-header-tabletdimg{
   margin-top:20px;width:250px;margin-left:30px;
  }
  .text-center{
    font-size:24px;font-weight:600;
  }
</style>

</head>

<body>
<div class="Wrapper">

<div class="container">
  
  <table class="template-header-table">
  <tbody>
    <tr>
      <td class="template-header-tabletd">
           <img src="https://starfish-app-tqudn.ondigitalocean.app/uploads/settings/4xtxWTHg9xmyQPk.png" alt="logo" class="template-header-tabletdimg">
      </td>
      <td class="template-header-tabtdone">
           <h4 class="text-center"> {{getSetting('site_title', 'site_settings')}} </h4>
          
      </td>
    </tr>
  </tbody>
  </table>
