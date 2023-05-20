<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use \Auth;
use App\User;
use Socialite;
use Exception;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;
    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $dbuser = '';
    protected $provider = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }





    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $type = 'student';
        if ($data['is_student'])
            $type = 'parent';

        $role = getRoleData($type);

        $user = new User();
        $user->name = $data['name'];
        $user->username = $data['username'];

        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role_id = $role;
        $user->slug = $user->makeSlug($user->name);

        $user->save();

        $user->roles()->attach($user->role_id);
        try {
            $this->sendPushNotification($user);
            sendEmail('registration', array('user_name' => $user->name, 'username' => $data['username'], 'to_email' => $user->email, 'password' => $data['password']));

        } catch (Exception $ex) {

        }

        flash('success', 'record_added_successfully', 'success');

        $options = array(
            'name' => $user->name,
            'image' => getProfilePath($user->image),
            'slug' => $user->slug,
            'role' => getRoleData($user->role_id),
        );
        pushNotification(['owner', 'admin'], 'newUser', $options);
        return $user;
    }



    public function sendPushNotification($user)
    {
        if (getSetting('push_notifications', 'module')) {
            if (getSetting('default', 'push_notifications') == 'pusher') {
                $options = array(
                    'name' => $user->name,
                    'image' => getProfilePath($user->image),
                    'slug' => $user->slug,
                    'role' => getRoleData($user->role_id),
                );

                pushNotification(['owner', 'admin'], 'newUser', $options);
            } else {
                $this->sendOneSignalMessage('New Registration');
            }
        }
    }


    //this view the login page
    public function getLogin($layout_type = '')
    {


        try {

            session()->put("layout_number", $layout_type);

            $data['active_class'] = 'login';
            $data['title'] = getPhrase('login');
            $rechaptcha_status = getSetting('enable_rechaptcha', 'recaptcha_settings');
            $data['rechaptcha_status'] = $rechaptcha_status;


            $view_name = getTheme() . '::auth.login';
            return view($view_name, $data);

        } catch (Exception $e) {

            if (env('DB_DATABASE') == '') {
                return redirect(URL_INSTALL_SYSTEM);
            } else {
                return redirect(URL_UPDATE_DATABASE);
            }
        }
    }


    /**
     * This is method is override from Authenticate Users class
     * This validates the user with username or email with the sent password
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postLogin(Request $request)
    {

        $rechaptcha_status = getSetting('enable_rechaptcha', 'recaptcha_settings');

        if ($rechaptcha_status == 'yes') {

            $columns = array(

                'g-recaptcha-response' => 'required|captcha',

            );

            $messsages = array(
                'g-recaptcha-response.required' => 'Please Select Captcha',

            );

            $this->validate($request, $columns, $messsages);

        }

        $login_status = FALSE;
        if (Auth::attempt(['username' => $request->email, 'password' => $request->password])) {

            $login_status = TRUE;
        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $login_status = TRUE;
        }

        if (!$login_status) {
            $message = getPhrase("Please Check Your Details");
            flash('Ooopsiii...!', $message, 'error');
            return redirect()->back();


        }

        /**
         * Check if the logged in user is parent or student
         * if parent check if admin enabled the parent module
         * if not enabled show the message to user and logout the user
         */




        if ($login_status) {

            $user = Auth::user();
            if ($user->is_verified == 0) {
                Auth::logout();
                flash('Ooopsiie...!', 'please_active_your_email_verification_to_login_into_your_account', 'overlay');
                return redirect()->back();
            }


            if ($user->login_enabled == 0) {
                Auth::logout();
                flash('Ooopsiie...!', 'your_account_is_inactive_please_contact_admin', 'overlay');
                return redirect()->back();
            }

            $enable_multiple_logins = getSetting('enable_multiple_logins', 'site_settings');
            if (empty($enable_multiple_logins)) {
                $enable_multiple_logins = 'yes';
            }
            if ($user->is_loggedin == 'yes' && $enable_multiple_logins == 'no') {
                $hourdiff = 0;
                if (!empty($user->last_login)) {
                    $hourdiff = abs(round((strtotime($user->last_login) - strtotime(date('Y-m-d H:i:s'))) / 3600, 1));
                }
                /**
                 * Some times system obruptly shutdown, in that case database may not updated that 'is_loggedin' fields, so let us allow user to login again after 24 hours.
                 */
                if ($hourdiff < 24) {
                    Auth::logout();
                    flash('Ooops...!', 'you_already_logged_into_system', 'overlay');
                    return redirect()->back();
                }
            }
        }





        if ($login_status) {
            $user->is_loggedin = 'yes';
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();

            if (checkRole(getUserGrade(7))) {
                if (!getSetting('parent', 'module')) {
                    return redirect(URL_PARENT_LOGOUT);
                }
            }
        }

        /**
         * The logged in user is student/admin/owner
         */
        if ($login_status) {
            $user->is_loggedin = 'yes';
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();
            $layout_num = session()->get('layout_number');

            return redirect(PREFIX);
        }




    }





    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($logintype)
    {


        $checker = 'google_plus';

        if ($logintype == 'facebook')
            $checker = $logintype;
        if ($logintype == 'twitter')
            $checker = $logintype;

        if (!getSetting($checker . '_login', 'module')) {
            flash('Ooops..!', $logintype . '_login_is_disabled', 'error');
            return redirect(PREFIX);
        }
        $this->provider = $logintype;
        return Socialite::driver($this->provider)->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request, $logintype)
    {

        try {
            $user = Socialite::driver($logintype);

            if (!$user) {
                return redirect(PREFIX);
            }

            if ('twitter' === $logintype) {
                $user = $user->user();

                $token = $user->token;
                $tokenSecret = $user->tokenSecret;

                $user = Socialite::driver('twitter')->userFromTokenAndSecret($token, $tokenSecret);
            } else {
                $user = $user->stateless()->user();
            }

            if ($user) {
                if ($this->checkIsUserAvailable($user, $logintype)) {
                    $availableuser = $this->dbuser;
                    Auth::loginUsingId($availableuser->id, true);
                    flash('Success...!', 'log_in_success', 'success');
                    return redirect($this->redirectTo);
                }
                flash('Ooops...!', 'faiiled_to_login', 'error');
                return redirect(PREFIX);
            }
        } catch (Exception $ex) {

            return redirect(PREFIX);
        }

    }

    public function checkIsUserAvailable($user, $logintype)
    {
        // dd("tes");

        $id = $user->getId();

        $nickname = $user->getNickname();
        $name = $user->getName();
        $email = $user->getEmail();
        if (empty($email)) {
            $email = $id . '@' . $logintype . '.com';
        }
        $avatar = $user->getAvatar();

        $this->dbuser = User::where('email', '=', $email)->first();

        if ($this->dbuser) {
            //User already available return true
            return TRUE;
        }

        $newUser = array(
            'name' => $name,
            'email' => $email,
        );
        $newUser = (object) $newUser;

        $userObj = new User();
        $this->dbuser = $userObj->registerWithSocialLogin($newUser);
        $this->dbuser = User::where('slug', '=', $this->dbuser->slug)->first();

        return TRUE;

    }

    public function socialLoginCancelled(Request $request)
    {
        return redirect(PREFIX);
    }


    public function confirmUser($activation_code)
    {

        $record = User::where('activation_code', $activation_code)->first();

        if($record){
            User::where('activation_code', $activation_code)
            ->update(['is_verified' => 1]);
            $record = User::where('activation_code', $activation_code)->first();
        }

        if (!$record) {
            $data['active_class'] = 'login';
            $data['title'] = getPhrase('login');
            $rechaptcha_status = getSetting('enable_rechaptcha', 'recaptcha_settings');
            $data['rechaptcha_status'] = $rechaptcha_status;

            $view_name = getTheme() . '::auth.loginnoverif';
            return view($view_name, $data);
        }
        if ($isValid = $this->isValidRecord($record))

            if ($record->is_verified == 1) {

                $view_name = getTheme() . '::auth.loginverif';

                return view($view_name, $record);
            } else {
                User::where('activation_code', $activation_code)
                    ->update(['is_verified' => 1]);
                $record = User::where('activation_code', $activation_code)->first();
                $view_name = getTheme() . '::auth.loginverif';

                return view($view_name, $record);
            }

        $view_name = getTheme() . '::auth.loginverif';
        return view($view_name, ['record' => $record]);

    }

    public function isValidRecord($record)
    {

        if ($record === null) {

            flash('Ooops...!', 'account_is_not_existed_please_contact_your_admin', 'error');
            return redirect(URL_HOME);
        }
    }


    public function authenticate(Request $request)
    {

        $response = [];
        $response['status'] = 0;
        $response['message'] = 'Email/Password is incorrect';
        $user_object = null;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user_object = Auth::user();
        } else if (Auth::attempt(['username' => $request->email, 'password' => $request->password])) {


            $user_object = Auth::user();


        }

        if ($user_object) {
            if ($user_object->role_id == 6) {
                $response['message'] = 'Parent login is not allowed';
                return $response;
            }
            if ($request->device_id) {
                $user_object->device_id = $request->device_id;
                $user_object->save();
            }


            $user['id'] = $user_object->id;
            $user['name'] = $user_object->name;
            $user['email'] = $user_object->email;
            $user['phone'] = $user_object->phone;
            $user['image'] = $user_object->image;
            $login_status = TRUE;
            $response['status'] = 1;
            $response['user'] = $user;
            $response['message'] = 'Login Success';
        }

        return $response;
    }
}