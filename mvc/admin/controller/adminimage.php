<?php
    class AdminImage extends AdminController{
        public function imageList($limit=LIMIT,$offset=0){
            //yêu cầu model thục hiện
            $adminimagemodel=new AdminImageModel;
            $data=$adminimagemodel->imageList($limit,$offset);
            $this->loadAdminView('adminmaster1','AdminImage/imageList',$data);
        }
    }

?>