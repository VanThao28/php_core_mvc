<?php 
    class UserModel extends Model{
        private $__table = 'users'; 
        function tableFill(){
            return 'users';
        }
        function fieldFill(){
           return '*';
        }
        function primaryKey(){
            return 'id';
        }
        public function listUser(){
            $data = $this->db->query("SELECT * FROM $this->__table ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function createUserModel($data){
            $this->db->table('users')->insert($data);
        }
        public function editUserModel($idUser){
            $data = $this->db->table('users')->where('id','=',$idUser)->get();
            return $data;
        }
        public function updateUserModel($data,$idUser){
            $this->db->table('users')->where('id','=',$idUser)->update($data);
        }
        public function deleteUserModel($idDelete){
            $this->db->table('users')->where('id','=',$idDelete)->delete();
        }
        public function signInUserModel($data){
            $data= $this->db->table('users')->where('tbl_email','=',$data['email'])->where('tbl_password','=',$data['password'])->select('id,tbl_name,tbl_email,tbl_password')->get();
            return $data;
        }
        
    }
