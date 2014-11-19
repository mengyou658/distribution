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
        $this->beforeFilter('auth', ['only' => [

            'getDashboard',
            'getSettingProfile',
            'postSettingProfile',
            'getSettingEmail',
            'postSettingEmail',
            'getSettingAvatar',
            'postSettingAvatar',
            'getSettingPassword',
            'postSettingPassword',

        ]]);
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

    // // origin
    // public function postLogin() {

    //     $input = array(
    //         // 'email' => Input::get('email'),
    //         'name' => Input::get('name'),
    //         'password' => Input::get('password'),
    //     );

    //     if (Auth::attempt($input)) {
    //         return Redirect::intended('/')->with('msg', '登录成功');
    //     }

    //     return Redirect::to('user/login')->with('msg', '输入账号信息错误，如需请重新注册');
    // }

    public function postLogin() {
        //dd(Input::all());

        $name = Input::get('name');
        $password = Input::get('password');

        $user = User::whereName($name)->first();

        if ($user) {
            if (Auth::attempt(['name' => $name, 'password' => $password])) {
                return Redirect::intended('/')->with('msg', '登录成功');
            }
            else {
                return Redirect::to('user/login')->with('msg', '输入密码错误');
            }
        }
        
        $wpUser = WpUser::whereUser_login($name)->first();
        if ($wpUser) {
  
            if(WpPassword::check($password, $wpUser->user_pass)) {
                $newUser = User::create([
                    'email' => $wpUser->user_email,
                    'name' => $wpUser->user_login,
                    'password' => Hash::make($password),
                ]);

                // create 会直接使用默认值，所以需要另外写入
                $newUser->nickname = $wpUser->display_name;
                $newUser->website = $wpUser->user_url;
                $newUser->created_at = $wpUser->user_registered;
                $newUser->is_confirmed = true;
                $newUser->save();

                Auth::login($newUser);
                return Redirect::intended('/')->with('msg', '登录成功');
            }
            else {
                return Redirect::to('user/login')->with('msg', '输入密码错误');
            }
        }
        
        return Redirect::to('user/login')->with('msg', '无此账号信息错误，请重新注册');
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/')->with('msg', '退出成功');
    }

    public function getDashboard() {
        $user = Auth::user();
        return View::make('user.dashboard', compact('user'));
    }

    public function getUserDetail($userId) {
        $user = User::find($userId);
        return View::make('user.dashboard', compact('user'));
    }

    public function getSettingProfile() {
        return View::make('user.setting.profile');
    }

    public function postSettingProfile() {
        // dd(Input::all());

        // @todo: 其他的用户属性
        // profession sex

        $user = Auth::user();
        $descr = Input::get('descr');

        $input = [];
        $rules = [];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('user/setting/profile')->with('msg', '信息填写错误');
        }

        $user->descr = $descr;
        $user->save();

        return Redirect::to('user/setting/profile')->with('msg', '修改成功');
    }

    public function getSettingEmail() {
        return View::make('user.setting.email');
    }

    public function postSettingEmail() {
        dd(Input::all());

        $email = Input::get('email');
    }

    public function getSettingAvatar() {
        return View::make('user.setting.avatar');
    }

    public function postSettingAvatar() {
        dd(Input::all());
    }

    public function getSettingPassword() {
        return View::make('user.setting.password');
    }

    public function postSettingPassword() {
        dd(Input::all());
    }
}
