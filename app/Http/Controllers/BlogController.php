<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App;
use App\Http\Requests;
use App\Blog;
use Yajra\Datatables\Datatables;
use DB;
use Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function index()
    {
    	$data['active_class']       = 'blogs';
        $data['title']              = getPhrase('blogs');

        $blogs = Blog::where('status',1)
        				->orderBy('updated_at', 'desc')
        				->paginate(9);

        $data['blogs'] = $blogs;

        $view_name = getTheme().'::site.blogs.list';
        return view($view_name, $data);
    }


    public function view($slug)
    {

    	if (!$slug)
    		return redirect(URL_HOME_BLOGS);

    	$data['active_class']       = 'blogs';
        $data['title']              = getPhrase('blogs');

        $blog = Blog::where('slug', $slug)->first();
        if (!$blog)
            return redirect( URL_HOME_BLOGS );

        $data['blog'] = $blog;

        $view_name = getTheme().'::site.blogs.blog-details';
        return view($view_name, $data);
    }
}
