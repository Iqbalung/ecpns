<style>
		.pointer-cur{
			cursor: pointer;
		}
  </style>
<div class="panel-heading">

		<h2>{{getPhrase('saved_questions')}}</h2>

	<div class="crearfix selected-questions-details">

		<span class="pull-left">{{getPhrase('saved_questions')}} (@{{savedQuestions.length}})</span>

		<span class="pull-right">{{getPhrase('total_marks')}}: @{{ totalMarks }}</span>

	</div>	

	</div>

	{!! Form::open(array('url' => URL_QUIZ_UPDATE_QUESTIONS.$record->slug, 'method' => 'POST')) !!}

					 	<input type="hidden" name="saved_questions" value="@{{savedQuestions}}">

	<div class="panel-body">

		<div class="row">

			<div class="col-md-12 clearfix">

				<div ng-if="savedQuestions!=''" class="vertical-scroll" >

					 				

					 				<a class="remove-all-questions text-red pointer-cur" ng-click="removeAll()">{{getPhrase('remove_all')}}</a>

					 				<table  

								  class="table table-hover">

								  <thead>

								  <tr>

									<th>{{getPhrase('subject')}}</th>

									<th>{{getPhrase('question')}}</th>

									<th>{{getPhrase('marks')}}</th>	

									<th></th>	

									</tr>

									</thead>

									<tbody>

										<tr ng-repeat="i in savedQuestions track by $index">

										<td>@{{ savedQuestions[$index].subject_title}}</td>

										<td title="@{{ savedQuestions[$index].question}}">@{{ savedQuestions[$index].question  }}</td>

										<td>@{{ savedQuestions[$index].marks}}</td>

										<td><a ng-click="removeQuestion(i)"  class="btn-outline btn-close text-red pointer-cur"><i class="fa fa-close"></i></a></td>

										</tr>

									</tbody>

									</table>

					 			</div>



					 			<div class="buttons text-center" >

							<button class="btn btn-lg btn-success button">{{getPhrase('update')}}</button>

						</div>

			</div>

		</div>

	</div>



{!! Form::close() !!}



	 

	 

