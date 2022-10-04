<?php
    class Auth extends controller{
        public function adminLogin(){

            if(isset($_POST['login'])){
                $authmodel=new AuthModel;
                $authmodel->adminLogin();
            }

            $this->loadView('master3','auth/login',[]);
        }
        public function adminLogout(){
            if(isset($_SESSION['username'])){
                unset($_SESSION['username']);
                unset($_SESSION['level']);
                header('location:'.BASE_URL.'auth/adminLogin/');
                exit;
            }
            
        }
        /*public function checkAdminLogin(){
            if(isset($_SESSION['username'])||($_SESSION['level']!=0)){
                header('location:'.BASE_URL.'auth/adminLogin/');
                exit;
            }
        }*/
    }
?>