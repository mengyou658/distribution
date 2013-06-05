<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    public function __construct()
    {
        $this->beforeFilter('auth', array('only' => array(
            'getIndex',
            'getSetting',
            'getSettingProfile',
            'postSettingProfile',
            'getSettingAvatar',
            'postSettingAvatar',
            'getSettingSecurity',
            'postSettingSecurity',
            'getSettingAccount',
            'postSettingAccount'
        )));
    }

	public function getIndex()
	{
        $user = Auth::user();
        
		return View::make('user.detail')
                   ->with('user', $user);
	}
    
    public function getDetail($user_id)
    {
        $user = User::find($user_id);
		return View::make('user.detail')
                   ->with('user', $user);
	}
    
    public function getLogin()
	{
		if (Auth::check()) {
            return Redirect::to('user');
        }
        
        return View::make('user.login');
	}
    
    public function postLogin()
	{
		if (Auth::check()) {
            return Redirect::to('user');
        }
        
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if ($this->user_login_auth($credentials)) {
            return Redirect::to('/')->with('msg', 'login success');
        }
        
        // 验证失败，返回登录页
        return Redirect::to('user/login')->with('msg', '登录失败');
	}
    
    public function getForgotPassword()
    {
        return View::make('user.forgot_password');
    }
    
    public function postForgotPassword()
    {
        $credentials = array('email' => Input::get('email'));
        return Password::remind($credentials, function($message, $user){
            $message->subject('统计之都账号密码重置');
        });
    }
    
    public function getResetPassword($token)
    {
        return View::make('user.reset_password')->with('token', $token);
    }
    
    public function postResetPassword()
    {
        $credentials = array('email' => Input::get('email'));
        return Password::reset($credentials, function($user, $password){
            $user->password = Hash::make($password);
            $user->save();
            return Redirect::to('/')->with('msg', '密码重置成功');
        });
    }
    
    public function getRegister()
    {
        if (Auth::check()) {
            return Redirect::to('user');
        }
        
        return View::make('user.register');
    }
    
    public function postRegister()
    {
        if (Auth::check()) {
            return Redirect::to('/');
        }
        
        $input = array(
            'email' => Input::get('email'),
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'password_again' => Input::get('password_again'),
        );
        
        $rules = array(
            'email' => 'required|email|unique:users',
            'username' => 'required|max:32',
            'password' => 'required|min:4|max:32',
            'password_again' => 'same:password',
        );

        $v = Validator::make($input, $rules);

        if ( $v->fails() ) {
            return Redirect::to('user/register')->with('msg', 'input error');
        }
        
        // 注册用户信息构建
        $new_user = array(
            'email' => Input::get('email'),
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
        );
        
        // 保存用户数据
        $user = new User($new_user);
        $user->save();
        
        // TODO: 新用户注册验证码
        // $verify_code = Str::random(12);
        // 注册session
        Auth::loginUsingId($user->id);
        
        return Redirect::to('/')->with('msg','register success');
    }
    
    
    public function getLogout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        
        return Redirect::to('/')->with('msg','logout success');
    }
    
    public function getSetting()
    {
        return Redirect::to('user/setting/profile');
    }
    
    public function getSettingProfile()
    {
        $user = Auth::user();
        return View::make('user.setting.profile')
                   ->with('user', $user);
    }
    
    public function postSettingProfile()
    {
        $user = Auth::user();
        $user->title = Input::get('title');
        $user->intro = Input::get('intro');
        $user->save();
        return Redirect::to('user/setting/profile')->with('msg','修改成功');
    }
    
    public function getSettingAvatar()
    {
        $user = Auth::user();
        return View::make('user.setting.avatar')
                   ->with('user', $user);
    }
    
    public function postSettingAvatar()
    {


        $input = array(
            'avatar' => Input::file('avatar')
        );
        
        $rules = array(
            'avatar' => 'image'
        );
        
        $v = Validator::make($input, $rules);
        
        if ( $v->fails() ) {
            return Redirect::to('user/setting/avatar')->with('msg', '错误');
        }
        
        // TODO: 保存到公共目录 public_path(); ，再 update 用户数据
        
    }
    
    public function getSettingSecurity()
    {
        return View::make('user.setting.security');
    }
    
    public function postSettingSecurity()
    {
        $user = Auth::user();
        $old_password = Input::get('old_password');
        $new_password = Input::get('new_password');
        
        $input = array(
            'new_password' => $new_password,
            'new_password_again' => Input::get('new_password_again'),
        );
        $rules = array(
            'new_password' => 'required|min:4|max:32',
            'new_password_again' => 'same:new_password',
        );
        
        $v = Validator::make($input, $rules);
        
        if ( $v->fails() ) {
            return Redirect::to('user/setting/security')->with('msg', '两次输入新密码不相同');
        }
        
        if (Hash::check($old_password, $user->password)) {
            $user->password = Hash::make($new_password);
            $user->save();
            Auth::logout();
            return Redirect::to('/')->with('msg', '修改成功，请重新登录');
        } else {
            return Redirect::to('user/setting/security')->with('msg', '旧密码错误');
        }
    }

    public function getSettingAccount()
    {
        return View::make('user.setting.account');
    }
    
    public function postSettingAccount()
    {
        // TODO:
    }
    
    public function getNotices()
    {
        $per_page_num = 3;
        
        $user = Auth::user();
        
        $user->notices_count = 0;
        $user->save();

        $notices = Notice::whereUser_id($user->id)->orderBy('created_at', 'desc')->paginate($per_page_num);
        return View::make('user.notices')
                   ->with('notices', $notices);
    }
    
    // custom
    public function user_login_auth($credentials)
    {
        $user = User::whereEmail($credentials['email'])->first();
        if ($user) {
            $hashed_password = $user->password;
            if ($user->permission > 0 && Hash::check($credentials['password'], $hashed_password)) {
                Auth::loginUsingId($user->id);
                return true;
            }
        }
        return false;
    }
}