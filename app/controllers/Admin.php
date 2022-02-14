<?php
class Admin extends Controller
{
    private $data = [], $data1;
    private $user;
    public function __construct()
    {
        $this->user = $this->model('UserModel');
    }
    public function index()
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {
            $data = $this->user->listUser();
            $data1 = $this->data1['msgDelete'] = Session::flash('msgDelete');
            $this->data['sub_connent']['msgDelete'] = $data1;
            $this->data['sub_connent']['list_user'] = $data;
            $this->data['connent'] = 'admin/user/user_list';
            $this->render('layouts/admin_layout', $this->data);
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
}
