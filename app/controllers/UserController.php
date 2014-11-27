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

        $input = [
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'password' => Input::get('password'),
            'repassword' => Input::get('repassword'),
        ];

        $rules = [
            'email' => 'required|email|unique:user',
            //'name' => 'required|alpha_dash|min:4|max:16', // 英文 数字 下划线 中划线
            'name' => 'required|unique:user|min:2|max:16', // 允许中文用户名
            'password' => 'required|min:4|max:32',
            'repassword' => 'required|same:password',
        ];

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

        // escape
        $input['name'] = e($input['name']);

        // hash password
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        Auth::login($user);

        return Redirect::to('/')->with('msg', '注册成功');
    }

    public function getLogin() {
        $refer = Input::get('refer', '');
        return View::make('user.login', compact('refer'));
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

        $name = Input::get('name');
        $password = Input::get('password');
        $refer = Input::get('refer', '');

        $user = User::whereName($name)->first();

        if ($user) {
            if (Auth::attempt(['name' => $name, 'password' => $password])) {

                // Auth::user()->last_login_at = new DateTime();
                // Auth::user()->save();

                if ($refer) {
                    return Redirect::to($refer)->with('msg', '登录成功');
                }
                else {
                    return Redirect::intended('/')->with('msg', '登录成功');
                }
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
                //$newUser->last_login_at = new DateTime();
                $newUser->save();

                // delete
                $wpUser->delete();

                Auth::login($newUser);
                if ($refer) {
                    return Redirect::to($refer)->with('msg', '登录成功');
                }
                else {
                    return Redirect::intended('/')->with('msg', '登录成功');
                }
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

    public function getDetail($userId) {
        $user = User::find($userId);
        return View::make('user.dashboard', compact('user'));
    }

    public function getSettingProfile() {
        return View::make('user.setting.profile');
    }

    public function postSettingProfile() {

        $user = Auth::user();

        $nickname = e(Input::get('nickname'));
        $website = Input::get('website');
        $sex = Input::get('sex');
        $descr = Input::get('descr');

        // check nickname
        $duplicatedUser = User::whereNickname($nickname)
                              ->where('id', '!=', $user->id)->first();
        if ($duplicatedUser) {
            return Redirect::to('user/setting/profile')
                           ->with('msg', '这个昵称已经被使用');
        }

        $duplicatedUser = WpUser::whereDisplay_name($nickname)->first();
        if ($duplicatedUser) {
            return Redirect::to('user/setting/profile')
                           ->with('msg', '这个昵称已经被使用');
        }

        $input = [
            'website' => $website,
            'sex' => $sex,
        ];
        $rules = [
            'website' => 'url',
            'sex' => 'required|in:female,male,unknown'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            $messages = $validator->messages();

            $msg = '';
            switch (true) {
                case $messages->has('website'):
                    $msg = '请填写正确的网址';
                    break;
                
                default:
                    $msg = '请填写正确的信息';
                    break;
            }

            return Redirect::to('user/setting/profile')
                           ->with('msg', $msg);
        }

        $user->nickname = $nickname;
        $user->website = $website;
        $user->sex = $sex;
        $user->descr = $descr;
        $user->save();

        return Redirect::to('user/setting/profile')->with('msg', '修改成功');
    }

    public function getSettingEmail() {
        return View::make('user.setting.email');
    }

    public function postSettingEmail() {

        $user = Auth::user();
        $email = Input::get('email');

        $input = [
            'email' => $email,
        ];
        $rules = [
            'email' => 'required|email',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            $messages = $validator->messages();

            $msg = '';
            switch (true) {
                case $messages->has('email'):
                    $msg = '请填写正确的邮件地址';
                    break;
                
                default:
                    $msg = '请填写正确的信息';
                    break;
            }

            return Redirect::to('user/setting/email')
                           ->with('msg', $msg);
        }

        $user->email = $email;
        $user->save();

        return Redirect::to('user/setting/email')->with('msg', '修改成功');

    }

    public function getSettingAvatar() {
        return View::make('user.setting.avatar');
    }

    public function postSettingAvatar() {

        $user = Auth::user();
        
        if (!Input::hasFile('avatar')) {
            return Redirect::to('user/setting/avatar')
                           ->with('msg', '请上传头像图片文件');
        }
        
        $file = Input::file('avatar');
        $mime = $file->getMimeType();
        
        $validImageTypes = [
            'image/png',
            'image/jpeg',
            'image/gif',
            'image/bmp',
        ];
            
        if (!in_array($mime, $validImageTypes)) {
            return Redirect::to('user/setting/avatar')
                           ->with('msg', '本站不支持您上传的图片格式');
        }
            
        // 2M: 1024*1024*2 = 2097152
        if ($file->getClientSize() > 2097152) {
            return Redirect::to('user/setting/avatar')
                           ->with('msg', '图片文件太大（本站最大支持 2M 头像图片文件上传）');
        }
            
        $imageExts = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg',
            'image/gif' => 'gif',
            'image/bmp' => 'bmp',
        ];
            

        $fileName = $user->id.'.'.$imageExts[$mime];
            
        $publicAvatarPath = "/upload/avatar";
        $desPath = public_path().$publicAvatarPath;
            
        $file->move($desPath, $fileName);   
        $fileUri = $publicAvatarPath.'/'.$fileName;
        
        $oldAvatarPath = public_path().$user->avatar;
        $user->avatar = $fileUri;
        $user->save();

        // delete old avatar
        if (File::exists($oldAvatarPath)) {
            File::delete($oldAvatarPath);
        }

        return Redirect::to('user/setting/avatar')->with('msg', '修改头像成功');
    }

    public function getSettingPassword() {
        return View::make('user.setting.password');
    }

    public function postSettingPassword() {

        $user = Auth::user();
        $curPassword = Input::get('cur_password');
        $newPassword = Input::get('new_password');
        $reenterNewPassword = Input::get('reenter_new_password');

        if (!Hash::check($curPassword, $user->password)) {
            return Redirect::to('user/setting/password')->with('msg', '原密码错误');
        }

        $input = [
            'new_password' => $newPassword,
            'reenter_new_password' => $reenterNewPassword,
        ];
        
        $rules = [
            'new_password' => 'required|min:4|max:32',
            'reenter_new_password' => 'same:new_password',
        ];
        
        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {
            $messages = $validator->messages();
        
            if ($messages->has('reenter_new_password')) {
                return Redirect::to('user/setting/password')->with('msg', '两次输入的新密码不一致');
            }

            return Redirect::to('user/setting/password')->with('msg', '密码过于简单');
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return Redirect::to('user/setting/password')->with('msg', '密码修改成功');
    }
}
