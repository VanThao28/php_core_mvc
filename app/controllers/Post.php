<?php
class Post extends Controller
{
    private $data = [], $dataDe;
    private $post, $user;
    public function __construct()
    {
        $this->post = $this->model('PostModel');
        $this->user = $this->model('UserModel');
    }
    public function index()
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {
            $data = $this->post->ListPost();
            $dataDe = $this->dataDe['msgDeletePost'] = Session::flash('msgDeletePost');
            $this->data['sub_connent']['msgDe'] = $dataDe;
            $this->data['sub_connent']['list_post'] = $data;
            $this->data['connent'] = 'admin/post/post_list';
            $this->render('layouts/admin_layout', $this->data);
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
    public function createPost()
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {

            $this->data['msgCreatePostImageError'] = Session::flash('msgCreatePostImageError');
            $this->data['errorsCreatePost'] = Session::flash('errorsCreatePost');
            $this->data['msgCreatePost'] = Session::flash('msgCreatePost');
            $this->data['oldCreatePost'] = Session::flash('oldCreatePost');
            $this->data['msgCreatePostImage'] = Session::flash('msgCreatePostImage');
            $this->data['msgCreatePosts'] = Session::flash('msgCreatePosts');
            $this->data['sub_connent']['dataFieldsPost'] = $this->data;

            $this->data['sub_connent']['dataUser'] = $this->user->listUser();
            $this->data['connent'] = 'admin/post/create_post';
            $this->render('layouts/admin_layout', $this->data);
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
    public function storePost()
    {
        $request = new Request();

        $permited = array('jpg', 'jpeg', 'png');
        $file_name = $_FILES['form_input_image']['name'];
        $file_size = $_FILES['form_input_image']['size'];
        $file_temp = $_FILES['form_input_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = 'public/assets/image_blog/' . $unique_image;

        if ($request->isPost()) {
            $request->rules([
                'form_input_title' => 'required',
                'form_input_connent' => 'required',
                'form_input_category' => 'required',
            ]);

            $request->message([
                'form_input_title.required' => 'title không được bỏ trống',
                'form_input_connent.required' => 'connent không được bỏ trống',
                'form_input_category.required' => 'category không được bỏ trống',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                Session::flash('errorsCreatePost', $request->errors());
                Session::flash('msgCreatePost', 'đã có lỗi, vui lòng kiểm tra lại');
                Session::flash('oldCreatePost', $request->getFields());
            }
            if (!empty($file_name)) {
                if (in_array($file_ext, $permited) === false) {
                    Session::flash('msgCreatePostImage', 'lỗi,bạn chỉ có thể tải lên.' . implode(',', $permited));
                    Session::flash('msgCreatePost', 'đã có lỗi vui lòng kiểm tra lại');
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $data = $request->getFields();

                    $data = [
                        'btl_user_id' => $data['form_input_user'],
                        'tbl_title' => $data['form_input_title'],
                        'tbl_connent' => $data['form_input_connent'],
                        'image_post' => $uploaded_image,
                        'tbl_category' => $data['form_input_category'],
                        'is_public' => $data['form_input_is_public'],
                        'tbl_date' => date('Y-m-d'),
                    ];

                    $this->post->createPostModel($data);
                    Session::flash('msgCreatePosts', 'thêm thành công');
                }
            }else{
                Session::flash('msgCreatePostImageError','image không được bỏ trống');
            }
            $response = new Response();
            $response->redirect('post/createPost');
        }
    }
    public function editPost($idPost = 0)
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {
            $request = new Request();
            $this->data['errorUpdatePost'] = Session::flash('errorUpdatePost');
            $this->data['msgUpdatePost'] = Session::flash('msgUpdatePost');
            $this->data['msgUpdateDataPost'] = Session::flash('msgUpdateDataPost');
            $this->data['msgUpdatePostImage'] = Session::flash('msgUpdatePostImage');
            $this->data['oldUpdatePost'] = Session::flash('oldUpdatePost');
            $this->data['sub_connent']['dataFieldPostUpdate'] = $this->data;

            $this->data['sub_connent']['listUser'] = $this->user->listUser();
            $this->data['sub_connent']['editPostId'] = $this->post->editPostModel($idPost);
            $this->data['connent'] = 'admin/post/update_post';
            $this->render('layouts/admin_layout', $this->data);
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
    public function updatePost($idPost = 0)
    {
        $request = new Request();

        $permited = array('jpg', 'jpeg', 'png');
        $file_name = $_FILES['input_image']['name'];
        $file_size = $_FILES['input_image']['size'];
        $file_temp = $_FILES['input_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = 'public/assets/image_blog/' . $unique_image;

        if ($request->isPost()) {
            $request->rules([
                'input_title' => 'required',
                'input_connent' => 'required',
                'input_category' => 'required',
            ]);
            $request->message([
                'input_title.required' => 'title không được bỏ trống',
                'input_connent.required' => 'connent không được bỏ trống',
                'input_category.required' => 'category không được bỏ trống',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                Session::flash('errorUpdatePost', $request->errors());
                Session::flash('msgUpdatePost', 'đã có lỗi vui lòng kiểm tra lại');
                Session::flash('oldUpdatePost', $request->getFields());
            }
                $data = $request->getFields();
                if (!empty($file_name)) {
                    if (!empty($file_name)) {
                        if (in_array($file_ext, $permited) === false) {
                            Session::flash('msgUpdatePostImage', 'lỗi,bạn chỉ có thể tải lên.' . implode(',', $permited));
                            Session::flash('msgUpdatePost', 'đã có lỗi vui lòng kiểm tra lại');
                        } else {
                            move_uploaded_file($file_temp, $uploaded_image);
                            $data = [
                                'btl_user_id' => $data['input_user'],
                                'tbl_title' => $data['input_title'],
                                'tbl_connent' => $data['input_connent'],
                                'image_post' => $uploaded_image,
                                'tbl_category' => $data['input_category'],
                                'is_public' => $data['input_is_public'],
                                'tbl_date' => date('Y-m-d'),
                            ];
                            $this->post->updateUserModel($data, $idPost);
                            Session::flash('msgUpdateDataPost', 'sửa thành công');
                        }
                    }
                } else {
                    $data = [
                        'btl_user_id' => $data['input_user'],
                        'tbl_title' => $data['input_title'],
                        'tbl_connent' => $data['input_connent'],
                        'tbl_category' => $data['input_category'],
                        'is_public' => $data['input_is_public'],
                        'tbl_date' => date('Y-m-d'),
                    ];
                    $this->post->updateUserModel($data, $idPost);
                    Session::flash('msgUpdateDataPost', 'sửa thành công');
                }
            $response = new Response();
            $response->redirect('post/editPost/' . $idPost);
        }
    }
    public function deletePost($idDeletePost = 0)
    {
        $checkSession = Session::data('checkLogin');
        if (!empty($checkSession)) {
            Session::flash('msgDeletePost', 'xóa thành công');

            $this->post->deletePostModel($idDeletePost);
            $response = new Response();
            $response->redirect('post/index');
        } else {
            $response = new Response();
            $response->redirect('login/signIn');
        }
    }
}
