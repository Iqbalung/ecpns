@extends('layouts.sitelayout')

@section('content')
<?php 
 
    $current_theme = getDefaultTheme();
   
   $page_content  = getThemeSetting($key,$current_theme); 
    
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-content">
 {!! $page_content !!}
</div>
</div>
</div>
</div>
@stop