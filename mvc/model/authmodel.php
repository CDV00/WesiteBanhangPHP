<?php
    class AuthModel extends BaseModel{
        protected $table=DB_PREFIX.'admin';
        public function adminLogin(){
            //hứng dữ liệu
            $username=$_POST['inputUsername'];
            $password=md5($_POST['inputPassword']);
            //lấy user từ bảng admin
            //echo'username';
            $u=$this->get(['userName'=>$username,'Trash'=>0]);
            
            //echo $password;
            if(isset($u)&&($u['Pass']==$password)){
                $_SESSION['username']=$username;
                $_SESSION['level']=$u['level'];
                header('location:'.BASE_URL.'dashboard/home');
                exit;
            }
            else{
                $_SESSION['msg']="đăng nhập thất bại";
                header('location:'.BASE_URL.'auth/adminlogin');
                exit;
            }
        }
    }
