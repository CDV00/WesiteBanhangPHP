<?php
class AdminLink extends AdminController{
    public function linkList($limit=LIMIT,$offset=0){
        //yeu cau model thuc hien
        $adminlinkmodel=new AdminLinkModel;
        $data=$adminlinkmodel->linkList($limit,$offset);
        //gui du lieu cho view
        $this->loadAdminView('adminmaster1','adminlink/linklist',$data);
    }
    public function linkListInTrash($limit=LIMIT,$offset=0){
        $adminlinkmodel=new AdminLinkModel;
        $data=$adminlinkmodel->linkListInTrash($limit,$offset);
        $this->loadAdminView('adminmaster1','adminlink/linklistintrash',$data);
    }
    public function linkToggleStatus($id){
        $adminlinkmodel=new AdminLinkModel;
        echo 'ddd';
        $adminlinkmodel->toggleStatus($id);
    }
    public function Addlink(){
        //xử lý dữ liệu nhận được
        if(isset($_POST['submit'])){
            $adminlinkmodel=new AdminLinkModel;
            $adminlinkmodel->doAddLink();
        }
       
        $this->loadAdminView('adminmaster1','adminlink/addlink',[]);
    }
    public function linkToggleTrash($Id){
        $adminlinkmodel=new AdminLinkModel;
        $adminlinkmodel->toggleTrash($Id);
    }
    public function linkUnTrash($Id){
        //yêu cầu model thực hiện
        $adminlinkmodel=new AdminLinkModel;
        $adminlinkmodel->linkUnTrash($Id);
    }
    public function linkDelete($Id){
        //yêu  cầu model thực hiện
        $adminlinkmodel=new AdminLinkModel;
        $adminlinkmodel->linkDelete($Id);
    }
    public function Updatelink($Id){
        //xử lý dữ liệu nhận được
        $adminlinkmodel=new AdminLinkModel;
        if(isset($_POST['submit'])){
            $adminlinkmodel->doUpdateLink($Id);
        }
        //hiển thị form add product
        /* $catmodel=new AdminCategoryModel;
        $data['cats']=$catmodel->getAll([]);
        $brandmodel=new AdminBrandModel;
        $data['brands']=$brandmodel->getAll([]); */
        $data['oldproduct']=$adminlinkmodel->get(['id'=>$Id]);
        $this->loadAdminView('adminmaster1','adminlink/updatelink',$data);
    }
    /* public function productToggleStatus($productId){
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

    


    
    
     */
}
?>