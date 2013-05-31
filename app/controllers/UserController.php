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
        $this->beforeFilter('auth', array('only' => array('getIndex')));
    }

	public function getIndex()
	{
		return View::make('user.index');
	}
    
    public function getDetail($id)
	{
        // TODO: 如果当是自己时，跳转 getIndex
        
        // TODO: 取到用户数据，渲染
		return View::make('user.detail');
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