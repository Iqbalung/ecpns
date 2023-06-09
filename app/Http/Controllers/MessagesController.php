<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
namespace App\Http\Controllers;
use \App;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class MessagesController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');


    }

     /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {


        if(!getSetting('messaging', 'module'))
        {
            pageNotFound();
            return back();
        }
        $currentUserId = Auth::user()->id;

        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->latest('updated_at')->paginate(getRecordsPerPage());

        $data['title']        = getPhrase('create_message');
        $data['active_class'] = 'messages';
        $data['currentUserId']= $currentUserId;
        $data['threads'] 	  = $threads;
        $data['layout']       = getLayout();

         $view_name = getTheme().'::messaging-system.index';
        return view($view_name, $data);
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        if(!getSetting('messaging', 'module'))
        {
            pageNotFound();
            return back();
        }

        try {
            $thread = Thread::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }

        // don't show the current user in list
        $userId = Auth::user()->id;
        $thread_participants = $thread->participants()->get();
        $is_member = 0;
        foreach($thread_participants as $tp)
        {
            if($tp->user_id == $userId) {
                $is_member = 1;
                break;
            }
        }


        if(!$is_member)
        {
            pageNotFound();
            return back();
        }

        $participants = $thread->participantsUserIds($userId);

        $users = User::whereNotIn('id', $participants)->get();

        $thread->markAsRead($userId);

        $data['title']        = getPhrase('messages');
        $data['active_class']        = 'messages';
        $data['thread'] 	= $thread;
        $data['users']  = $users;
        $data['layout'] 	= getLayout();

          $view_name = getTheme().'::messaging-system.show';
        return view($view_name, $data);
        // return view('messenger.show', compact('thread', 'users'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        if(!getSetting('messaging', 'module'))
        {
            pageNotFound();
            return back();
        }

        $query = User::where('id', '!=', Auth::id());

       if(getSetting('messaging_system_for','messaging_system')=='admin')
       {
            // If the loggedin user is admin
            // List all the users
             if(!checkRole(getUserGrade(2)))
            {

                $admin_role = getRoleData('admin');
                $owner_role = getRoleData('owner');

                $query->where('role_id', '=', $admin_role)
                  ->orWhere('role_id', '=', $owner_role);
            }

       }

        $users = $query->get();

          $data['title']        = getPhrase('send_message');
        $data['active_class']        = 'messages';
        $data['users']  = $users;
        $data['layout'] 	= getLayout();

          $view_name = getTheme().'::messaging-system.create';
        return view($view_name, $data);
    }
     public function store()
    {
        if(!getSetting('messaging', 'module'))
        {
            pageNotFound();
            return back();
        }

        $input = Input::all();
        if (Input::has('recipients')) {

            $selectors = 'hai';
        }

        else{
             flash('Oops...!','please select the recipients', 'overlay');
             return redirect(URL_MESSAGES_CREATE);
        }
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }
        return redirect(URL_MESSAGES);
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        if(!getSetting('messaging', 'module'))
        {
            pageNotFound();
            return back();
        }

        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants(Input::get('recipients'));
        }
        return redirect('messages/' . $id);
    }
}
