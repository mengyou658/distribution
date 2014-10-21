<?php

class UserController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    public function __construct(){
        $this->beforeFilter('auth', array('only' => array(
            'getDashboard',
            // 'getSettingAvatar',
            // 'postSettingAvatar',
            // 'getSettingPassword',
            // 'postSettingPassword',
        )));
    }

    public function getSignup() {
        return View::make('user.signup');
    }

    public function postSignup() {
        //dd(Input::all());

        $input = array(
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'password' => Input::get('password'),
            'repassword' => Input::get('repassword'),
        );
        
        $rules = array(
            'email' => 'required|email|unique:user',
            //'name' => 'required|alpha_dash|min:4|max:16', // 英文 数字 下划线 中划线
            'name' => 'required|unique:user|min:2|max:16', // 允许中文用户名
            'password' => 'required|min:4|max:32',
            'repassword' => 'required|same:password',
        );
        
        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {
            $messages = $validator->messages();
            
            if ($messages->has('email')) {
                return Redirect::to('user/signup')->with('msg', '此邮件地址已经注册过');
            }
            
            if ($messages->has('name')) {
                return Redirect::to('user/signup')->with('msg', '用户名不规范，或者已经被注册');
            }
            
            if ($messages->has('repassword')) {
                return Redirect::to('user/signup')->with('msg', '两次输入的密码不一致');
            }
        
            return Redirect::to('user/signup')->with('msg', '输入信息错误');
        }

        // hash password
        $input['password'] = Hash::make($input['password']);
        
        $user = User::create($input);
        Auth::login($user);
        
        return Redirect::to('/')->with('msg', '注册成功');
    }

    public function getLogin() {
        return View::make('user.login');
    }

    public function postLogin() {
        //dd(Input::all());

        $input = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($input)) {
            return Redirect::intended('/')->with('msg', '登录成功');
        }
        
        return Redirect::to('user/login')->with('msg', '账号信息错误');
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/')->with('msg', '退出成功');
    }

    public function getDashboard() {
        return View::make('user.dashboard');
    }
}
