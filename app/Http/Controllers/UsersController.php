<?php
namespace App\Http\Controllers;

use Input;
use Auth;
use Validator;
use Session;
use Redirect;
use Lang;
use App\Models\User;
use Mail;
use App\Models\Email;
use App\Models\ResetPass;
use App\Helpers\HelperUser;
class UsersController extends Controller
{

    protected $data;
    protected $content;
    protected $layout = "layouts.auth";

    public function __construct()
    {
        $this->middleware('auth');
        $this->setModelClass('App\Models\User');
    }

    /**
     * Display login form
     *
     */
    public function getLogin()
    {
        return view($this->layout, [
            'content' => (view('users.login')),
            'footer' => view('users.signuplink'),
            'title' => trans('users.login.title')
        ]);
    }

    /**
     * Attempt to do login with sso
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        $input = Input::all();
//        if(strpos($input["username"],'@vtv.com')) {
//            die('abc');
//            if ($input["username"]=="admin")
//                $input["username"] = trim($input["username"]) . '@gmail.com';
//            else
//                $input["username"] = trim($input["username"]) . '@vtv.com';
//        }
//
        $validator = Validator::make($input, array(
            'username' => 'required',
            'password' => 'required',
        ));

        if (!$validator->passes()) {
            return Redirect::route('users.login.get')->withInput()->with('error', $validator->messages()->all());
        }
        $remember = (Input::has('remember_me')) ? true : false;
        Session::put('remember_me', $remember);
        $email = $input["username"];
        if(strpos($email, '@') < 1) {
            if($email=='admin')
                $email = $email.'@gmail.com';
            else
                $email = $email . '@vtv.com';
        }
        $auth = Auth::attempt(array(
            'email' => $email,
            'password' => Input::get('password'),
        ), $remember);

        if ($auth) {
            return Redirect::route('dashboard');
        } else {
            return Redirect::route('users.login.get')->with('error', Lang::get('users.login_error_mess'));
        }
    }

    /**
     * Display register form
     */
    public function getRegister()
    {
        return view($this->layout, [
            'content' => (view('users.register')),
            'footer' => view('users.signuplink'),
            'title' => trans('users.register.title')
        ]);
    }

    /**
     *
     * Redirect to login form when register success
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate()
    {
        $validator = Validator::make(Input::all(), User::$rules);
        if (!$validator->passes()) {
            return Redirect::route('users.register.get')->with('error', Lang::get('users.register_validate_error_mess'))->withErrors($validator)->withInput();
        }
        $data = Input::all();
        $data['password'] = \Hash::make($data['password']);
        $data['username'] = $data['email'];

        $user = $this->store($data);

        return Redirect::route('users.login.get');
    }


    /**
     * Redirect to sso logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('users.login.get');
    }

    public function getRecoverPassword()
    {
        return view($this->layout, [
            'content' => (view('users.recover-password')),
            'title' => trans('users.forgot_title'),
        ]);
    }

    /**
     * recovery pass word
     * @return mixed
     */
    public function postRecoverPassword()
    {
        $email = Input::get('username');
        $url = route('users.reset-password');
        $validator = Validator::make(['email' => $email], ['email' => 'required|email']);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag()->getMessages();
            $errors = [];
            foreach ($messages as $message) {
                $errors[] = implode("\n", $message);
            }
            return Redirect::route('users.recover-password')->withError($errors);
        }

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            return Redirect::route('users.recover-password')->withError('The email do not exits :)');
        }
        $rand = substr(md5(microtime()), rand(0, 26), 60);
        $pass = substr(md5(microtime()), rand(0, 26), 6);

        $data['email'] = $email;
        $data['name'] = $user->first_name . ' ' . $user->last_name;
        $data['key'] = $rand;
        $data['time'] = time();
        $data['password'] = $pass;
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/users/reset-password?key=' . $rand;
        $data['url'] = $url;
        $data['_id'] = 'recovery_password';

        $token = new ResetPass($data);
        if ($token->save()) {
            $this->sendEmail($data);
            // Redirect to login form
            return Redirect::route('users.recover-password')->withSuccess(trans('users.forgot_success_msg', [
                'email' => $email,
            ]));
        }
        return Redirect::route('users.recover-password')->withError('Some things errors, Please try again!:)');
    }


    /**
     * update password
     * @return mixed
     */
    public function updatedPassword()
    {
        $key = Input::get('key');
        $token = ResetPass::where('key', '=', $key)
            ->where('time', '>', time() - 3600)
            ->first();
        if (!$token) {
            return Redirect::route('users.recover-password')->withError('The Token not match or time out!:)');
        }
        $pass = \Hash::make($token->password);
        $user = User::where('email', '=', $token->email)
            ->first();
        $user->password = $pass;
        $user->save();
        return Redirect::route('users.login')->withError('Your Password was changed, Get it by your email end login!');
    }

    /**
     * send email to recovery password
     * @param $input
     */
    public function sendEmail($input)
    {
        $temp = Email::where('key', '=', $input['_id'])->first()->toArray();
        $content = [
            'sender_email' => $temp['sender_email'],
            'sender_name' => $temp['sender_name']
        ];
        $data['email'] = $input['email'];
        $data['name'] = $input['name'];
        $data['password'] = $input['password'];
        $data['url'] = $input['url'];
        $data['subject'] = 'Recovery Password';
        $this->data = $data;
        $this->content = $content;
        Mail::send('emails.' . $input['_id'], array('content' => $content, 'data' => $data), function ($message) {
            $message->from($this->content['sender_email'], $this->content['sender_name']);
            $message->to($this->data['email'], $this->data['name'])->subject($this->data['subject']);
        });
    }
}
