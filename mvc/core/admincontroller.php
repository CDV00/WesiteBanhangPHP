<?php
    class AdminController extends controller{
        function __construct()
        {
            if(!isset($_SESSION['username'])||($_SESSION['level']!=0)){
                header('location:'.BASE_URL.'auth/adminLogin/');
                exit;
            }
        }
        protected function loadAdminView($master,$viewName,$data){
            require_once PATH_TO_ADMINVIEW.strtolower($master).'.php';
        }
    }
