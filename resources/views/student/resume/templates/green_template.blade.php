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

    <link href="{{CSS}}font-awesome/4.7.0/font-awesome.min.css" type="text/css">

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
            /*width: 45%;*/

            width: 30%;
        }
        
        h4 {
            line-height: 4px;
        }
        
        .content {
            /*width: 55%;*/
            width: 70%;
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
        .printable-colmenu{
            text-align:center;
        }
        .printable-menuimg{
            width:120px;height:120px;margin:0 auto;
        }
        .printable-paracolthree{
            font-weight: 500;font-size: 14px;line-height: 15px;width: 40rem;    margin-left: 10px;
        }
        .printable-colthree{
            text-transform:uppercase;font-size:21px;margin-left: 10px;
        }
        .printable-menuheadingone{
            text-transform:uppercase;font-size:21px;
        }
        .printable-menupara{
            font-weight: 500;text-transform: uppercase;font-size: 12px;line-height: 0px;
        }
        .printable-colmenu-div{
            padding:7px;width:20%;
        }
        .printable-colmenu-content{
            padding:7px;width:80%;
        }
        .printable-paraone{
           line-height:25px;margin:0;padding:0;font-weight:500;text-align:left;     
        }
        .printable-colhead{
           text-transform:uppercase;font-size:21px;margin-top:23px;
        }
        .printable-colheaddiv{
           padding:7px;width:100%;     
        }
        .print-para-three{
           padding:0;margin:0;overflow: hidden;line-height:25px;font-weight:500;display: -webkit-box; -webkit-line-clamp: 3;-webkit-box-orient: vertical;     
        }
        .printable-par-fiv{
           font-weight: 500;font-size: 14px;line-height: 15px;
        }

    </style>
</head>

<body onload="printMe()">
    <div class="clearfix" id="printableArea">

        <div class="column menu printable-colmenu">
         <img src="{{ getProfilePath($user->image) }}" class="printable-menuimg" alt="">
            <h1 class="printable-menuheadingone">{{ucwords($user->name)}}</h1>
            <p class="printable-menupara">{{$user->qualification}} </p>
            <p class="printable-menupara">{{$user->department}} </p>
            <div class="clearfix">
                <div class="column menu printable-colmenu-div" >  </div>
                <div class="column content printable-colmenu-content" >
                    <p class="printable-paraone">{{$user->college_name}}</p>
                    <p class="printable-paraone">{{$user->college_place}}</p>
                    <p class="printable-paraone">{{$user->state}} &nbsp; {{$user->country}}</p>
                    <p class="printable-paraone"><strong>Email:</strong> {{$user->email}}</p>
                    <p class="printable-paraone"><strong>Mobile:</strong> {{$user->phone}}</p>
                </div>
            </div>
            
            <h1 class="printable-colhead" >{{getPhrase('personal_profile')}}</h1>
            <div class="clearfix">
                <div class="column menu printable-colheaddiv">
                    <p class="print-para-three"> <div class="table-responsive">
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
   </div></p>
                </div>
               
            </div>
           
        </div>

        <div class="column content">
            <h1 class="printable-colthree">{{getPhrase('career_objective')}}:</h1>
            <p class="printable-paracolthree">{!!  $user->career_objective !!}</p>
       
          
           @if (isset($work_experience) && count($work_experience))

          <div class="column content">
            <h1 class="printable-menuheadingone">{{getPhrase('work_experience')}}:</h1>
            @foreach($work_experience as $experience)
            <p class="printable-par-fiv">{{$experience->work_experience}} из {{$experience->from_date}} в {{$experience->to_date}}</p>

             @endforeach
        </div>

        @endif


           @if (isset($projects) && count($projects))

          <div class="column content">
            <h1 class="printable-menuheadingone">{{getPhrase('projects')}} and {{getPhrase('work_done')}}:</h1>
           @foreach ($projects as $project)
            <p class="printable-par-fiv">{{$project->project_title}}</p>

             @if($project->project_description)

             <p class="printable-par-fiv">{{ $project->project_description }}</p>

             @endif

             @endforeach
        </div>

        @endif


          @if (isset($academic_profiles) && count($academic_profiles))

          <div class="column content">
            <h1 class="printable-menuheadingone">{{getPhrase('academic_profile')}}:</h1>
            <p class="printable-par-fiv"> 

                <!-- <div class="table-responsive"> -->
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
   <!-- </div> -->

</p>

        </div>

        @endif


        @if (isset($technical_skills) && count($technical_skills))

          <div class="column content">
            <h1 class="printable-menuheadingone">{{getPhrase('technical_skills')}}:</h1>
            @foreach ($technical_skills as $skill)
            <p class="printable-par-fiv">{{$skill->skill_type}} : {{$skill->skills_known}}</p>

             @endforeach
        </div>

        @endif

       @if ($user->field_of_interest)

          <div class="column content">
            <h1 class="printable-menuheadingone">{{getPhrase('field_of_interest')}}:</h1>
            <p class="printable-par-fiv">{!!  $user->field_of_interest !!}</p>
        </div>

        @endif

           @if ($user->subject_taught)
       
          <div class="column content">
            <h1 class="printable-menuheadingone">{{getPhrase('subject_taught')}}:</h1>
            <p class="printable-par-fiv">{!!  $user->subject_taught !!}</p>
        </div>

        @endif


          @if (isset($activities) && count($activities))

          <div class="column content">
            <h1 class="printable-menuheadingone">{{getPhrase('extra_activities')}}:</h1>
            @foreach ($activities as $activity)
            <p class="printable-par-fiv">{{$activity->activity_description}}</p>

             @endforeach
        </div>

        @endif

          @if ($user->declaration)
       
          <div class="column content">
            <h1 class="printable-menuheadingone" >{{getPhrase('declaration')}}:</h1>
            <p class="printable-par-fiv">{!!  $user->declaration !!}</p>
            <p class="printable-par-fiv">{!!  $user->name !!}</p>
        </div>

        @endif

    </div>
     </div>



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