<?php

class User_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    
    function __construct()
    {
        parent::__construct();
        
        $this->restful = true;
        $this->filter('before', 'auth')->only(array('index'));
    }

	public function get_index()
	{
		return View::make('user.index');
	}
    
    public function get_detial($id)
	{
        // 
        
        var_dump($id);
		//return View::make('user.index');
	}
    
	public function get_login()
	{
        if (Auth::check()) {
            return Redirect::to('user/');
        }
        
        return View::make('user.login');
	}
    
	public function post_login()
	{
        if (Auth::check()) {
            return Redirect::to('user/');
        }
        
        $credentials = array(
            'username' => Input::get('email'),
            'password' => Input::get('password')
        );

        if ($this->user_login_auth($credentials)) {
            return Redirect::to('/')->with('msg', 'login success');
        }
        
        // 验证失败，返回登录页
        return Redirect::to('user/login')->with('msg', '登录失败');
	}
    
    public function get_register()
    {
        if (Auth::check()) {
            return Redirect::to('user/');
        }
        
        return View::make('user.register');
    }
    
    public function post_register()
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
        Auth::login($user->id);
        
        return Redirect::to('/')->with('msg','register success');
    }

    public function get_logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        
        return Redirect::to('/')->with('msg','logout success');
    }

    public function user_login_auth($credentials)
    {
        $user = User::where_email($credentials['username'])->first();
        $hashed_password = $user->password;
        if ( $user->permission > 0 && Hash::check($credentials['password'], $hashed_password) ) {
            Auth::login($user->id);
            return true;
        }
        return false;
    }
}