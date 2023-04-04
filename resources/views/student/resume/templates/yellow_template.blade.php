<!DOCTYPE html>
<html>

<head>

      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="saas,crm,bootstrap4,template,download">
    <meta name="description" content="OhDearCRM is a Bootstrap4 Responsive Template for Startups,SaaS Companies and Agencies.">
    <meta name="author" content="">
    <title>Resume</title>
    <link rel="icon" href="" width="100%">
<link href="{{CSS}}bootstrap/4.1.3/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">

   <link href="{{CSS}}bootstrap/font-awesome/4.7.0/font-awesome.min.css" type="text/css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        * {
            box-sizing: border-box;
        }
        
        .header,
        .footer {
            background-color: grey;
            color: white;
            padding: 15px;
        }
        
        .column {
            float: left;
            padding: 15px;
        }
        
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        
        .menu {
            width: 35%;
        }
        
        h4 {
            line-height: 4px;
        }
        
        .content {
            width: 65%;
        }
        
        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        
        .yellow-bg {
            background: #efc115a1;
        }
        
        .menu li {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        
        .menu li h1,
        .menu li h4 {
            padding: 0;
            margin: 0;
        }
        .yellow-templateimg{
          width:120px;height:120px;margin:0 auto;
        }
        .yellotemplate-al{
          text-align:left;
        }
        .t-temp-talh{
          text-align:left;line-height:24px;
        }
        .yellow-template-tar{
          text-align:right;
        }
        .y-template-fw{
          font-weight:500;
        }
        .font-weight:500;line-height:19px;{
          font-size:14px; color:#aaa;
        }
    </style>
</head>

<body onload="printMe()">
    <div class="clearfix yellow-bg" id="printableArea">
        <div class="column menu">
            <ul>
              <li>
                  <img src="{{ getProfilePath($user->image) }}" alt="" class="yellow-templateimg">
              </li>
                <li>
                    <h1 class="yellotemplate-al" >{{ucwords($user->name)}}</h1></li>
                <li>
                    <h4 class="t-temp-talh" >{{$user->qualification}}</h4> 
                    <h4  class="t-temp-talh" >{{$user->department}}</h4> 
                </li>
            </ul>
        </div>
        <div class="column content">
            <p class="yellow-template-tar">{{$user->college_name}} </p>
            <p class="yellow-template-tar">{{$user->college_place}} </p>
            <p class="yellow-template-tar">{{$user->state}} &nbsp; {{$user->country}}  </p>
            <p class="yellow-template-tar"><strong>Email:</strong> {{$user->email}} </p>
            <p class="yellow-template-tar"><strong>Mobile:</strong> {{$user->phone}} </p>
        </div>
    </div>
    
    <div class="clearfix">
          <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('career_objective')}}</h3> </li>
            </ul>
        </div>
        <div class="column content">
            <p class="y-template-fw">{!!  $user->career_objective !!}</p>
        </div>
    </div>

@if (isset($work_experience) && count($work_experience))
    <div class="clearfix yellow-bg">
        <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('work_experience')}}</h3> </li>
            </ul>
        </div>
        <div class="column content">
            @foreach($work_experience as $experience)

            <p class="yellow-temp-fwlh" >{{$experience->work_experience}} {{getPhrase('from')}} {{$experience->from_date}} {{getPhrase('to')}} {{$experience->to_date}}</p>

             @endforeach
        </div>
    </div>

 @endif 

 @if (isset($projects) && count($projects))

    <div class="clearfix">
        <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('projects')}}</h3> </li>
            </ul>
        </div>
        <div class="column content">

              @foreach ($projects as $project)

              <p class="y-template-fw">{{$project->project_title}}

            @if($project->project_description)
            <p class="y-template-fw">{{ $project->project_description }}</p>
            @endif

          </p>
           @endforeach

           
        </div>
    </div>

  @endif
    
   @if (isset($academic_profiles) && count($academic_profiles)) 
    <div class="clearfix yellow-bg">
        <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('academic_profile')}}:</h3> </li>
            </ul>
        </div>
        <div class="column content">

            <p class="yellow-temp-fwlh" > 
                <div class="table-responsive">
           <table class="table" cellspacing="0" cellpadding="10" border="1" width="100%">
         <tr>
             <th>{{getPhrase('examination_passed')}}</th>
            <th>{{getPhrase('university')}}/{{getPhrase('board')}}</th>
            <th>{{getPhrase('year')}}</th>
            <th>% {{getPhrase('marks_obtained')}}</th>
            <th>{{getPhrase('class')}}</th>
         </tr>
         @foreach ($academic_profiles as $academic)
         <tr>
            <td>{{$academic->examination_passed}}</td>
            <td>{{$academic->university}}</td>
            <td>{{$academic->passed_out_year}}</td>
            <td>{{$academic->marks_obtained}}</td>
            <td>{{$academic->class}}</td>
         </tr>
         @endforeach
         
      </table>
   </div>
</p>
           
        </div>
    </div>

    @endif

     @if (isset($technical_skills) && count($technical_skills))
    <div class="clearfix">
        <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('technical_skills')}}:</h3> </li>
            </ul>
        </div>
        <div class="column content">
            @foreach ($technical_skills as $skill)

            <p class="yellow-temp-fwlh" >{{$skill->skill_type}} : {{$skill->skills_known}}</p>

             @endforeach
        </div>
    </div>

 @endif 

@if ($user->field_of_interest)

 <div class="clearfix yellow-bg">
          <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('field_of_interest')}}:</h3> </li>
            </ul>
        </div>
        <div class="column content">
            <p class="y-template-fw">{{$user->field_of_interest}}</p>
        </div>
    </div>
  @endif  

  @if ($user->subject_taught)

 <div class="clearfix">
          <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('subject_taught')}}:</h3> </li>
            </ul>
        </div>
        <div class="column content">
            <p class="y-template-fw">{{$user->subject_taught}}</p>
        </div>
    </div>
  @endif  


   @if (isset($activities) && count($activities))
    <div class="clearfix  yellow-bg">
        <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('activities')}}:</h3> </li>
            </ul>
        </div>
        <div class="column content">
            @foreach ($activities as $activity)

            <p class="yellow-temp-fwlh" >{{$activity->activity_description}}</p>

             @endforeach
        </div>
    </div>

 @endif 


    <div class="clearfix">
        <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('personal_profile')}}:</h3> </li>
            </ul>
        </div>
        <div class="column content">

            <p class="yellow-temp-fwlh" > 
                  <div class="table-responsive">
          <table class="table">
         <tr>
            <td>{{getPhrase('name')}}:</td>
            <td>{{$user->name}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('gender')}}:</td>
            <td>{{$user->gender}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('date_of_birth')}}:</td>
            <td>{{$user->dob}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('marital_status')}}:</td>
            <td>{{$user->marital_status}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('nationality')}}:</td>
            <td>{{$user->nationality}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('father_name')}}:</td>
            <td>{{$user->father_name}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('linguistic_ability')}}:</td>
            <td>{{$user->linguistic_ability}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('passport_number')}}:</td>
            <td>{{$user->passport_number}}</td>
         </tr>
         <tr>
            <td>{{getPhrase('present_address')}}:</td>
            <td>{{$user->present_address}}
            </td>
         </tr>
         <td>{{getPhrase('personal_strength')}}:</td>
         <td>{{$user->personal_strength}}</td>
         
      </table>
   </div>
</p>
           
        </div>
    </div>

 @if ($user->declaration)
     <div class="clearfix yellow-bg">
          <div class="column menu">
            <ul>
                <li>
                    <h3  class="yellotemplate-al" >{{getPhrase('declaration')}}:</h3> </li>
            </ul>
        </div>
        <div class="column content">
            <p class="y-template-fw">{!!$user->declaration!!}</p>
            <p class="y-template-fw">{{$user->name}}</p>
        </div>
    </div>

    @endif


<script src="{{JS}}jquery.min.js"></script>
<script src="{{JS}}ajax/libs/popper/popper.min.js"></script>
<script src="{{JS}}bootstrap/4.1.3/bootstrap.min.js"></script>

<script>
   function printMe(){
      var printContents = document.getElementById('printableArea').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              printContents + "</body>";;

     window.print();

     document.body.innerHTML = originalContents;
   };
</script> 

</body>

</html>