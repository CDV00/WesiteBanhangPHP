<?php
    class AdminCategory extends AdminController{
        public function categoryList($limit=LIMIT,$offset=0){
            //yêu cầu model thục hiện
            $admincategorymodel=new AdminCategoryModel;
            $data=$admincategorymodel->categoryList($limit,$offset);
            $this->loadAdminView('adminmaster1','AdminCategory/categorylist',$data);
        }

        public function categorylistInTrash($limit=LIMIT,$offset=0){
            $admincategorymodel=new AdminCategoryModel;
            $data=$admincategorymodel->categoryListInTrash($limit,$offset);
            $this->loadAdminview('adminmaster1','AdminCategory/categoryListInTrash',$data);
        }
        public function Addcategory(){
            if(isset($_POST['submit'])){
                $admincategorymodel=new AdminCategoryModel;
                $admincategorymodel->doAddCategory();
            }
            //hiển thị form Add category
            $this->loadAdminview('adminmaster1','AdminCategory/addcategory',[]);
        }
        public function UpdateCategory($catId){
            //xử lý dữ liệu nhận được
            $admincategorymodel=new AdminCategoryModel;
            if(isset($_POST['submit'])){
                $admincategorymodel->doUpdateCategory($catId);
            } 
            //hiển thị form add product
            $data['oldcategory']=$admincategorymodel->get(['catId'=>$catId]);
            $this->loadAdminView('adminmaster1','admincategory/UpdateCategory',$data);
        }

        public function categoryToggleTrash($catId){
            $admincategorymodel=new AdminCategoryModel;
            $admincategorymodel->toggleTrash($catId);
        }
        public function categoryToggleStatus($catId){
            $admincategorymodel=new AdminCategoryModel;
            $admincategorymodel->toggleStatus($catId);
        }

        public function categoryDelete($catId){
            //yêu  cầu model thực hiện
            $admincategorymodel=new AdminCategoryModel;
            $admincategorymodel->categoryDelete($catId);
        }
    
        public function categoryUnTrash($catId){
            //yêu cầu model thực hiện
            $admincategorymodel=new AdminCategoryModel;
            $admincategorymodel->categoryUnTrash($catId);
        }
    }


?>