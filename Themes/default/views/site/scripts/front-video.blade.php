<script src="{{JS}}angular.js"></script>
 

<script>
	
	var app = angular.module('academia',[]);

	app.controller('frontVideo',function($scope,$http,$sce){
         
		$scope.getContents  = function(id,type=''){
        

		 
		 url   = '{{ URL_GET_FRONT_END_SERIES_CONTENTS }}';
		 data  = {
                   
                   '_token'         :   $scope.getToken(),
                   _method          :   'post',
                   'lms_series_id'  : id,

		         };

		    $http.post(url,data).then(function(response){
                 
                 if(type == 'yes'){
                   $scope.contents  = response.data.contents;
               }
               else{

                  $scope.all_contents  = response.data.contents;
               }
               
		    });     	

		}


		$scope.showVideo = function(content_data){
			
		
		   $scope.video_url  = content_data.file_path;
			console.log($scope.video_url);
		   $scope.trustAsHtml = $sce.trustAsHtml
			
		   $scope.content_data  = content_data;
			
		}

		  $scope.getToken = function(){
             
             return  $('[name="_token"]').val();
        }
	});
</script>