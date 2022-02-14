<?php 
    class PostModel extends Model{
        private $__table = 'post';
        function tableFill(){
            return 'post';
        }
        function fieldFill(){
           return '*';
        }
        function primaryKey(){
            return 'id';
        }
        public function getListPost(){
           $data = $this->db->table('post')->join('users', 'post.btl_user_id = users.id')->select('post.id,post.tbl_title,post.tbl_connent,post.image_post,post.tbl_category,post.is_public,post.tbl_date,users.tbl_name')->where('post.is_public','=',0)->orderBy('id','DESC')->get();
           return $data;
        }
        public function ListPost(){
            $data = $this->db->table('post')->join('users', 'post.btl_user_id = users.id')->select('post.id,post.tbl_title,post.tbl_connent,post.image_post,post.tbl_category,post.is_public,post.tbl_date,users.tbl_name')->orderBy('id','DESC')->get();
            return $data;
         }
        public function single_blogList($id){
            $data = $this->db->table('post')->join('users', 'post.btl_user_id = users.id')->select('post.id,post.tbl_title,post.tbl_connent,post.image_post,users.tbl_name')->where('post.id','=',$id)->get();
            return $data;
        }
        public function createPostModel($data){
            $this->db->table('post')->insert($data);
        }
        public function editPostModel($idPost){
            $data = $this->db->table('post')->where('id','=',$idPost)->get();
            return $data;
        }
        public function updateUserModel($data,$idPost){
            $this->db->table('post')->where('id','=',$idPost)->update($data);
        }
        public function deletePostModel($idDeletePost){
            $this->db->table('post')->where('id','=',$idDeletePost)->delete();
        }
    }

?>