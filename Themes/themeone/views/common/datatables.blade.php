
<link href="{{CSS}}datatables/jquery.dataTables.min.css" type="text/css">


<link href="{{CSS}}datatables/buttons/btnsfourtwo/buttons.dataTables.min.css" type="text/css">

<script src="{{themes('js/bootstrap-toggle.min.js')}}"></script>
<script src="{{themes('js/jquery.dataTables.min.js')}}"></script>
<script src="{{themes('js/dataTables.bootstrap.min.js')}}"></script>


<script src="{{JS}}datatables/buttons/btnsfourtwo/dataTables.buttons.min.js"></script>

<script src="{{JS}}datatables/buttons/btnsfourtwo/buttons.flash.min.js"></script>

<script src="{{JS}}ajax/libs/jszip/jszip.min.js"></script>


<script src="{{JS}}ajax/libs/pdfmake/pdfmake.min.js"></script>	



<script src="{{JS}}ajax/libs/pdfmake/vfs_fonts.js"></script>	


<script src="{{JS}}datatables/buttons/btnsfourtwo/buttons.html5.min.js"></script>


<script src="{{JS}}datatables/buttons/btnsfourtwo/buttons.print.min.js"></script>	

	<?php 	$routeValue= $route; ?> 

	@if(!isset($route_as_url))
	{
		<?php $routeValue =  route($route); ?>
	}
	@endif
	
	<?php  
	$setData = array();
		if(isset($table_columns))
		{
			foreach($table_columns as $col) {
				$temp['data'] = $col;
				$temp['name'] = $col;
				array_push($setData, $temp);
			}
			$setData = json_encode($setData);
		}
	?>
 

  <script>

  var tableObj;
  
    $(document).ready(function(){
    	"use strict";
    	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
		});
    	
   		 tableObj = $('.datatable').DataTable({

	            processing: true,
	            serverSide: true,
	            cache: true,
	            type: 'GET',
	            ajax: '{{ $routeValue }}',
	            dom: 'Bfrtip',
	            buttons: [
				            'copy', 'csv', 'excel', 'pdf', 'print'

				        ],
				
	            @if(isset($table_columns))
	            columns: {!!$setData!!}
	            @endif

	    });

   		
    });
  </script>