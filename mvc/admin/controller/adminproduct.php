<?php
class AdminProduct extends AdminController{
    public function productList($limit=LIMIT,$offset=0){
        //yeu cau model thuc hien
        $adminproductmodel=new AdminProductModel;
        $data=$adminproductmodel->productList($limit,$offset);
        //gui du lieu cho view
        $this->loadAdminView('adminmaster1','adminproduct/productlist',$data);
    }
    public function productToggleTrash($productId){
        $adminproductmodel=new AdminProductModel;
        $adminproductmodel->toggleTrash($productId);
    }
    public function productToggleStatus($productId){
        $adminproductmodel=new AdminProductModel;
        $adminproductmodel->toggleStatus($productId);
    }
    public function productListInTrash($limit=LIMIT,$offset=0){
        $adminproductmodel=new AdminProductModel;
        $data=$adminproductmodel->productListInTrash($limit,$offset);
        $this->loadAdminView('adminmaster1','adminproduct/productlistintrash',$data);
    }
    public function productDelete($productId){
        //yêu  cầu model thực hiện
        $adminproductmodel=new AdminProductModel;
        $adminproductmodel->productDelete($productId);
    }

    public function productUnTrash($productId){
        //yêu cầu model thực hiện
        $adminproductmodel=new AdminProductModel;
        $adminproductmodel->productUnTrash($productId);
    }


    public function Addproduct(){
        //xử lý dữ liệu nhận được
        if(isset($_POST['submit'])){
            $adminproductmodel=new AdminProductModel;
            $adminproductmodel->doAddProduct();
        }
        //hiển thị form add product
        $catmodel=new AdminCategoryModel;
        $data['cats']=$catmodel->getAll(['trash'=>0,'status'=>1]);
        $brandmodel=new AdminBrandModel;
        $data['brands']=$brandmodel->getAll(['trash'=>0,'status'=>1]);
        $this->loadAdminView('adminmaster1','adminproduct/addproduct',$data);
    }
    
    public function UpdateProduct($productId){
        //xử lý dữ liệu nhận được
        $adminproductmodel=new AdminProductModel;
        if(isset($_POST['submit'])){
            $adminproductmodel->doUpdateProduct($productId);
        }
        //hiển thị form add product
        $catmodel=new AdminCategoryModel;
        $data['cats']=$catmodel->getAll([]);
        $brandmodel=new AdminBrandModel;
        $data['brands']=$brandmodel->getAll([]);
        $data['oldproduct']=$adminproductmodel->get(['productId'=>$productId]);
        $this->loadAdminView('adminmaster1','adminproduct/updateproduct',$data);
    }
}
?>