<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App;
use App\Feedback;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
class FeedbackController extends Controller
{
     public function __construct()
    {
    	$this->middleware('auth');


    }

    /**
     * Course listing method
     * @return Illuminate\Database\Eloquent\Collection
     */
   public function index()
    {

      if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }

        $data['active_class'] = 'feedback';
        $data['layout']       = getLayout();
        $data['title']        = getPhrase('feed_backs');
         $view_name = getTheme().'::feedbacks.list';
        return view($view_name, $data);
    }


    /**
     * This method returns the datatables data to view
     * @return [type] [description]
     */
    public function getDatatable()
    {

      if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }

        $records = array();


            $records = Feedback::join('users', 'users.id','=','feedbacks.user_id')
            ->select(['title', 'image','name','subject','description','feedbacks.slug', 'feedbacks.id', 'feedbacks.updated_at', 'read_status'])
            ->orderBy('updated_at', 'desc');

        return Datatables::of($records)
        ->escapeColumns([])
        ->addColumn('action', function ($records) {

          $link_data = '<div class="dropdown more">
                        <a id="dLabel" type="button" class="more-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                           <li><a href="'.URL_FEEDBACK_VIEW.$records->slug.'"><i class="fa fa-eye"></i>'.getPhrase("view").'</a></li>';


                    if ($records->read_status==0)
                    $link_data .= '<li><a href="'.URL_FEEDBACK_STATUS.$records->slug.'"><i class="fa fa-check"></i>'.getPhrase("approve").'</a></li>';
                    elseif ($records->read_status==1)
                    $link_data .= '<li><a href="'.URL_FEEDBACK_STATUS.$records->slug.'"><i class="fa fa-close"></i>'.getPhrase("disapprove").'</a></li>';


                    $temp = '';
                    if(checkRole(getUserGrade(1))) {
                    $temp .= ' <li><a href="javascript:void(0);" onclick="deleteRecord(\''.$records->slug.'\');"><i class="fa fa-trash"></i>'. getPhrase("delete").'</a></li>';
                      }

                    $temp .='</ul></div>';


                    $link_data .=$temp;
            return $link_data;
            })
        ->editColumn('title', function($records)
        {
        	return '<a href="'.URL_FEEDBACK_VIEW.$records->slug.'">'.$records->title.'</a>';
        })
        ->editColumn('image', function($records)
        {
          $image = getProfilePath($records->image);

            return '<img src="'.$image.'" height="60" width="60"  />';
        })
        ->editColumn('description', function($records)
        {
          return substr($records->description, 0,40).'..';
        })
        ->editColumn('read_status', function($records)
        {
            if ($records->read_status==0)
              return getPhrase('not_approved');
            elseif ($records->read_status==1)
              return getPhrase('approved');

        })

        ->removeColumn('id')
        ->removeColumn('slug')
        ->make(false);
    }

    /**
     * This method loads the create view
     * @return void
     */
    public function create()
    {

      if(checkRole(getUserGrade(2)))
      {
        return back();
      }

    	$data['record']         	= FALSE;
    	$data['layout']         	= getLayout();
    	$data['active_class']       = 'feedback';
      	$data['title']              = getPhrase('give_feedback');
        $view_name = getTheme().'::feedbacks.add-edit';
        return view($view_name, $data);
    }

     /**
     * This method adds record to DB
     * @param  Request $request [Request Object]
     * @return void
     */
    public function store(Request $request)
    {


	    $rules = [
         'title'         => 'bail|required|max:40' ,
         'subject'       => 'bail|required|max:40' ,
         'description'   => 'bail|required|max:200' ,
          ];
        $this->validate($request, $rules);
        $record = new Feedback();
      	$name  						=  $request->title;
		$record->title 				= $name;
       	$record->slug 				= $record->makeSlug($name);
        $record->subject			= $request->subject;
        $record->description		= $request->description;
        $record->user_id			= Auth::user()->id;
        $record->save();

        flash('success','feedback_submitted_successfully', 'success');
    	return redirect(URL_FEEDBACK_SEND);
    }

    public function details($slug)
    {

    	$record = Feedback::where('slug','=',$slug)->first();

    	if($isValid = $this->isValidRecord($record))
    		return redirect($isValid);

    	$data['record']         	= $record;
    	$data['layout']         	= getLayout();
    	$data['active_class']       = 'feedback';
      	$data['title']              = getPhrase('feedback_details');
      $view_name = getTheme().'::feedbacks.details';
        return view($view_name, $data);

    }

    public function isValidRecord($record)
    {
    	if ($record === null) {

    		flash('Ooops...!', getPhrase("page_not_found"), 'error');
   			return $this->getRedirectUrl();
		}

		return FALSE;
    }


    public function getReturnUrl()
    {
       if(!checkRole(getUserGrade(2)))
      {
        return URL_FEEDBACK_SEND;
      }
      return URL_FEEDBACK_VIEW;

    }

    public function delete($slug)
    {
     if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }
	 $record = Feedback::where('slug', $slug)->first();

    if(!env('DEMO_MODE')) {
	     $record->delete();
    }

	 $response['status'] = 1;
     $response['message'] = getPhrase('deleted_successfully');
        return json_encode($response);
    }




    public function updateStatus($slug)
    {

        $record = Feedback::where('slug','=',$slug)->first();

        if($isValid = $this->isValidRecord($record))
        return redirect($isValid);

        if ($record->read_status==0)
          $record->read_status  = 1;
        elseif ($record->read_status==1)
          $record->read_status  = 0;

        $record->save();

        flash('success','feedback_approved_successfully', 'success');
        return redirect(URL_FEEDBACKS);
    }

}
