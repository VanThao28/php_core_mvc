<?php
class Users extends Controller
{
    private $data = [], $user;
    public function __construct()
    {
        $this->user = $this->model('UserModel');
    }
    public function createUser()
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {
            $this->data['errors'] = Session::flash('errors');
            $this->data['msg'] = Session::flash('msg');
            $this->data['msgCreate'] = Session::flash('msgCreate');
            $this->data['old'] = Session::flash('old');
            $this->data['sub_connent']['data'] = $this->data;
            $this->data['connent'] = 'admin/user/create_user';
            $this->render('layouts/admin_layout', $this->data);
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
    public function storeUser()
    {
        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'form_input_name' => 'required|min:2|max:30',
                'tbl_email' => 'required|email|min:10|unique:users:tbl_email',
                'form_input_password' => 'required|min:8',
                'form_input_confirm_password' => 'required|match:form_input_password',
            ]);
            $request->message([
                'form_input_name.required' => 'tên không được bỏ trống',
                'form_input_name.min' => 'tên không được nhỏ hơn 2 ký tự',
                'form_input_name.max' => 'tên không được nhiều hơn 30 ký tự',
                'tbl_email.required' => 'mail không được bỏ trống',
                'tbl_email.email' => 'định dạng mail không hợp lệ',
                'tbl_email.min' => 'mail không ngắn hơn 8 ký tự',
                'tbl_email.unique' => 'mail này đã tồn tại',
                'form_input_password.required' => 'mật khẩu không được bỏ trống',
                'form_input_password.min' => 'mật khẩu không ngắn hơn 8 ký tự',
                'form_input_confirm_password.required' => 'mật khẩu nhập lại không được bỏ trống',
                'form_input_confirm_password.match' => 'mật khẩu không trùng khớp',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                Session::flash('errors', $request->errors());
                Session::flash('msg', 'đã có lỗi, vui lòng kiểm tra lại');
                Session::flash('old', $request->getFields());
            } else {
                $data =  $request->getFields();
                $data = [
                    'tbl_name' => $data['form_input_name'],
                    'tbl_email' => $data['tbl_email'],
                    'tbl_password' => md5($data['form_input_password']),
                    'tbl_date' => date('Y-m-d'),
                ];
                $this->user->createUserModel($data);
                Session::flash('msgCreate', 'them thanh cong');
            }
        }
        $response = new Response();
        $response->redirect('Users/createUser');
    }
    public function editUser($idUser = 0)
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {
            $this->data['errorUserUpdate'] = Session::flash('errorUserUpdate');
            $this->data['msgUserUpdate'] = Session::flash('msgUserUpdate');
            $this->data['msgUpdate'] = Session::flash('msgUpdate');
            $this->data['oldUserUpdate'] = Session::flash('oldUserUpdate');
            $this->data['sub_connent']['data'] = $this->data;

            $this->data['sub_connent']['editUserId'] = $this->user->editUserModel($idUser);
            $this->data['connent'] = 'admin/user/update_user';
            $this->render('layouts/admin_layout', $this->data);
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
    public function updateUser($idUser = 0)
    {
        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'input_name' => 'min:2|max:30',
                'tbl_email' => 'email|min:10',
                'input_password' => 'min:8',
                'input_confirm_password' => 'match:input_password',
            ]);
            $request->message([
                'input_name.min' => 'tên không được nhỏ hơn 2 ký tự',
                'input_name.max' => 'tên không được nhiều hơn 30 ký tự',
                'tbl_email.email' => 'định dạng mail không hợp lệ',
                'tbl_email.min' => 'mail không ngắn hơn 8 ký tự',
                'input_password.min' => 'mật khẩu không ngắn hơn 8 ký tự',
                'input_confirm_password.match' => 'mật khẩu không trùng khớp',
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('errorUserUpdate', $request->errors());
                Session::flash('msgUserUpdate', 'đã có lỗi, vui lòng kiểm tra lại');
                Session::flash('oldUserUpdate', $request->getFields());
            } else {
                $data =  $request->getFields();
                $data = [
                    'tbl_name' => $data['input_name'],
                    'tbl_email' => $data['tbl_email'],
                    'tbl_password' => md5($data['input_password']),
                    'tbl_date' => date('Y-m-d'),
                ];

                $this->user->updateUserModel($data, $idUser);
                Session::flash('msgUpdate', 'sua thanh cong');
            }
            $response = new Response();
            $response->redirect('Users/editUser/' . $idUser);
        }
    }
    public function deleteUser($idDelete = 0)
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {
            Session::flash('msgDelete', 'xoa thanh cong');

            $this->user->deleteUserModel($idDelete);
            $response = new Response();
            $response->redirect('admin/index');
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
}
