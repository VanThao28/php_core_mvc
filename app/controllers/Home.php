<?php
class Home extends Controller
{
  public $post, $data1;
  public $data = [];
  public function __construct()
  {
    $this->post = $this->model('PostModel');
  }
  public function index()
  {
    $data = $this->post->getListPost();

    $this->data['sub_content']['list_blog'] = $data;
    $this->data['content'] = 'blog/list';
    $this->render('layouts/client_layout', $this->data);
  }
  public function singleBlog($id = 0)
  {
    $this->data['sub_content']['singleBlog'] = $this->post->single_blogList($id);
    $this->data['content'] = 'blog/single_blog';
    $this->render('layouts/client_layout', $this->data);
  }
}
