<script src="{{JS}}angular.js"></script>
 <script src="{{JS}}ngStorage.js"></script>
<script src="{{JS}}angular-messages.js"></script>

<script>
var app = angular.module('academia', ['ngMessages']);
app.controller('payments_report', function( $scope, $http) {
    
    $scope.initAngData = function() {
     $scope.for_category=1;
    }
   
	$scope.setDetails = function(record_id) {
		if(record_id=='')
            return;
        
        if(record_id === undefined)
            return;
        route = '{{URL_GET_PAYMENT_RECORD}}';  
        data= {_method: 'post', '_token':$scope.getToken(), 'record_id': record_id};
         $scope.payment_record =[];
        $http.post(route, data).success(function(result, status) {
        if(result.status)
        $scope.payment_record = result.record;
        if($scope.payment_record.plan_type=='combo')
        	$scope.payment_record.plan_type = 'Exam Series';
        
        });

	}
	    
	$scope.getToken = function(){
      return  $('[name="_token"]').val();
    }

} 


 );


 
</script>