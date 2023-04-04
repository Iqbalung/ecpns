<!DOCTYPE html>

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link href="{{CSS}}bootstrap/3.3.7/bootstrap.min.css" type="text/css">

<!-- Optional theme -->
<link href="{{CSS}}bootstrap/3.3.7/bootstrap-theme.min.css" type="text/css">

<style>
	.sub-table{
		width:100%;margin-top:60px;
	}
	.sub-tableimg{
		margin-top:20px;width:250px;margin-left:30px;
	}
	.sub-tablewi{
	  width:30%;
	}
	.sub-tabletl{
	 font-size:24px;font-weight:600;	
	}
	.sub-tabletll{
	font-size:20px;font-weight:100;	
	}
	.sub-tabletlrwmr{	
	  margin:65px 0px;	
	}
	.subtbpara{
		font-size:20px;margin:65px 0;
	}
	.subtbrwpara{
		font-size:20px;margin-top:35px;
	}
	.sub-tabletdd{
		width:70%;
	}
</style>		

</head>

<body>
<div class="Wrapper">

<div class="container">
  
  <table class="sub-table">
  <tbody>
    <tr>
	  <td class="sub-tabletdd">
		    <img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="{{getSetting('site_title','site_settings')}}" alt="logo" class="sub-tableimg">
	  </td>
	  <td class="sub-tablewid">
		   <h4 class="text-left" class="sub-tabletl">{{getSetting('site_title','site_settings')}}</h4>
		   <p class="text-left" class="sub-tabletll">	
		{{getSetting('site_address','site_settings')}}
		   </p>
	  </td>
	</tr>
  </tbody>
  </table>

  
  
  
  <div class="row">
    <div class="col-lg-12" class="sub-tabletlrwmr">
	  <h4 class="text-center" class="sub-tabletl">User Subscription</h4>
	</div>
  </div>
  
   
   
   <div class="row">
    <div class="col-lg-12">
	<p class="subtbpara" >Thank you for subscribing to {{getSetting('site_title','site_settings')}}</p>
	</div>
   </div>
   
 
   
   
   <div class="row">
    <div class="col-lg-12">
	 <p class="subtbrwpara"></p>
	</div>
   </div>
</div>

</div>
</body>

<!-- Latest compiled and minified JavaScript -->
<script src="{{JS}}bootstrap/3.3.7/bootstrap.min.js"></script>

</html>