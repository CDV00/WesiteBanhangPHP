<?php

    class App{
        function __construct(){
            $this->autoload();
            $reqs=$this->reqToArray();

            //xác định tên controller
            if(isset($reqs[0])&&(file_exists(PATH_TO_CONTROLLER.strtolower($reqs[0]).'.php')||file_exists(PATH_TO_ADMINCONTROLLER.strtolower($reqs[0]).'.php'))){
                $controllerName=$reqs[0];
                unset($reqs[0]);
            }
            else
                $controllerName = 'product';
                
            //Tạo Controller
            //var_dump(($reqs));
            $controller =new $controllerName;

                
//var_dump(($reqs));
            //Xác Định Action
            if(isset($reqs[1])&&method_exists($controller,$reqs[1])){
                $methodName = $reqs[1];
                unset($reqs[1]);
            }
            else
                $methodName = 'Home';
                
            //Xác Định Tham Số 
            if(empty($reqs))
                $reqs=[];
            // Gọi Method Và Truyền Tham Số
            //echo $_GET['req'];
            call_user_func_array([$controller,$methodName],$reqs);
        }
       

        private function reqToArray(){
            //
            if(isset($_GET['req']))
                return explode('/',$_GET['req']);
            else
                return null;
        }
        private function autoload(){
            $loadClass=function ($className){
                $filename = PATH_TO_CONTROLLER.strtolower($className).'.php';
                if(file_exists($filename))
                    include_once ($filename);
                
                $filename = PATH_TO_CORE.strtolower($className).'.php';
                if(file_exists($filename))
                    include_once ($filename);

                $filename = PATH_TO_CORE.strtolower($className).'.php';
                if(file_exists($filename))
                    include_once ($filename);

                $filename = PATH_TO_MODEL.strtolower($className).'.php';
                if(file_exists($filename))
                    include_once ($filename);

                $filename = PATH_TO_ADMINMODEL.strtolower($className).'.php';
                if(file_exists($filename))
                    include_once ($filename);

                $filename = PATH_TO_LIB.strtolower($className).'.php';
                if(file_exists($filename))
                    include_once ($filename);

                $filename = PATH_TO_ADMINCONTROLLER.strtolower($className).'.php';
                if(file_exists($filename))
                    include_once ($filename);
            };
            spl_autoload_register($loadClass);
        }
    }
?>