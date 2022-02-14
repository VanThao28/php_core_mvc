<?php
class Login extends Controller
{
    private $data = [], $user;
    public function __construct()
    {
        $this->user = $this->model('UserModel');
    }
    public function signIn()
    {
        Session::delete();
        
        $this->data['errors_signIn'] = Session::flash('errors_signIn');
        $this->data['msg_signIn'] = Session::flash('msg_signIn');
        $this->data['msg_checksignIn'] = Session::flash('msg_checksignIn');
        $this->data['old_signIn'] = Session::flash('old_signIn');
        $this->data['sub_connent']['data'] = $this->data;
        $this->data['connent'] = 'admin/login/sign_in';
        $this->render('layouts/login_layout', $this->data);
    }
    public function insetSignIn()
    {
        $request = new Request();


        if ($request->isPost()) {
            $request->rules([
                'input_login_email' => 'required|email',
                'input_login_password' => 'required|min:8',
            ]);
            $request->message([
                'input_login_email.required' => 'email không được bỏ trống',
                'input_login_email.email' => 'định dạng mail không đúng',
                'input_login_password.required' => 'mật khẩu không được bỏ trống',
                'input_login_password.min' => 'mật khẩu không ngắn  hơn 8 ký tự',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                Session::flash('errors_signIn', $request->errors());
                Session::flash('msg_signIn', 'đã có lỗi, vui lòng kiểm tra');
                Session::flash('old_signIn', $request->getFields());
            } else {
                $data = $request->getFields();

                $data = [
                    'email' => $data['input_login_email'],
                    'password' => md5($data['input_login_password']),
                ];
                if (!empty($data)) {
                    $dataLogin = $this->user->signInUserModel($data);

                    Session::data('checkLogin', $dataLogin);

                    if ($dataLogin) {
                        $response = new Response();
                        $response->redirect('admin/index');
                    } else {
                        Session::flash('msg_checksignIn', 'email và mật khẩu không đúng');
                    }
                }
            }
        }
        $response = new Response();
        $response->redirect('login/signIn');
    }


    public function signUp()
    {
        $this->data['errors_register'] = Session::flash('errors_register');
        $this->data['msg_register'] = Session::flash('msg_register');
        $this->data['old_register'] = Session::flash('old_register');
        $this->data['sub_connent']['data_register'] = $this->data;
        $this->data['connent'] = 'admin/login/sign_up';
        $this->render('layouts/login_layout', $this->data);
    }
    public function CreateSignIn()
    {
       $request = new Request();
       if($request->isPost()){
           $request->rules([
               'register_name' => 'required|min:2|max:30',
               'tbl_email' => 'required|email|min:10|unique:users:tbl_email',
               'register_password' => 'required|min:8',
               'register_confirm_password' => 'required|match:register_password',
           ]);
           $request->message([
               'register_name.required' => 'tên không được bỏ trống',
               'register_name.min' => 'tên không ngắn hơn 2 ký tự',
               'register_name.max' => 'tên không dài hơn 30 ký tự',
               'tbl_email.required' => 'mail không được bỏ trống',
               'tbl_email.email' => 'định dạng mail không hợp lệ',
               'tbl_email.unique' => 'mail đã tồn tại',
               'register_password.required' => 'mật khẩu không dược bỏ trống',
               'register_password.min' => 'mật khẩu không ngắn hơn 8 ký tự',
               'register_confirm_password.required' => 'mật khẩu nhập lại không được bỏ trống',
               'register_confirm_password.match' => 'mật khẩu không trùng khớp',
           ]);
           $validate = $request->validate();
           if(!$validate){
               Session::flash('errors_register', $request->errors());
               Session::flash('msg_register', 'đã có lỗi, vui lòng nhập lại');
               Session::flash('old_register', $request->getFields());
           }else{
               $data = $request->getFields();
               $data = [
                   'tbl_name' => $data['register_name'],
                   'tbl_email' => $data['tbl_email'],
                   'tbl_password' => md5($data['register_password']),
                   'tbl_date' => date('Y-m-d'),
               ];
               $this->user->createUserModel($data);
               $response = new Response();
               $response->redirect('login/signIn');
           }
       }
       $response = new Response();
       $response->redirect('login/signUp');
    }
}
