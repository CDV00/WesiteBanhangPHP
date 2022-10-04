<?php
    class AdminBrand extends AdminController{
        public function brandList($limit=LIMIT,$offset=0){
            //yêu cầu model thục hiện
            $adminbrandmodel=new AdminBrandModel;
            $data=$adminbrandmodel->brandList($limit,$offset);
            $this->loadAdminView('adminmaster1','Adminbrand/brandlist',$data);
        }

        public function brandlistInTrash($limit=LIMIT,$offset=0){
            $adminbrandmodel=new AdminBrandModel;
            $data=$adminbrandmodel->brandListInTrash($limit,$offset);
            $this->loadAdminview('adminmaster1','Adminbrand/brandListInTrash',$data);
        }
        public function Addbrand(){
            if(isset($_POST['submit'])){
                $adminbrandmodel=new AdminBrandModel;
                $adminbrandmodel->doAddBrand();
            }
            //hiển thị form Add brand
            $this->loadAdminview('adminmaster1','Adminbrand/Addbrand',[]);
        }
        public function UpdateBrand($brandId){
            //xử lý dữ liệu nhận được
            $adminbrandmodel=new AdminBrandModel;
            if(isset($_POST['submit'])){
                $adminbrandmodel->doUpdateBrand($brandId);
            } 
            //hiển thị form add product
            $data['oldbrand']=$adminbrandmodel->get(['brandId'=>$brandId]);
            $this->loadAdminView('adminmaster1','adminbrand/UpdateBrand',$data);
        }

        public function brandToggleTrash($brandId){
            $adminbrandmodel=new AdminBrandModel;
            $adminbrandmodel->toggleTrash($brandId);
        }
        public function brandToggleStatus($brandId){
            $adminbrandmodel=new AdminBrandModel;
            $adminbrandmodel->toggleStatus($brandId);
        }

        public function brandDelete($brandId){
            //yêu  cầu model thực hiện
            $adminbrandmodel=new AdminBrandModel;
            $adminbrandmodel->brandDelete($brandId);
        }
    
        public function brandUnTrash($brandId){
            //yêu cầu model thực hiện
            $adminbrandmodel=new AdminBrandModel;
            $adminbrandmodel->brandUnTrash($brandId);
        }
    }


?>