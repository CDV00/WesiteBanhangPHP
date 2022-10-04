<?php
    class AdminCategoryModel extends AdminModel{
        protected $table=DB_PREFIX.'category';
        protected $field=['catName','alias','parentId','trash','status'];
        protected $key='catId';
        //xem tất cả nhóm sản phẩm
        public function categoryList($limit,$offset){
            //lấy tất cả nhóm
            $data['categorys']=$this->getAllLimit(['trash'=>0],$limit,$offset);
            //tính tổng các nhóm
            $totalRecords=count($this->getAll(['trash'=>0]));
            //Chuẩn bị paging
            $data['paging']=new Paging('admincategory/categoryList/',$totalRecords,$limit,$offset);
            return $data;
        }
        public function categorylistInTrash($limit,$offset){
            //xem tất cả nhốm trong thùng rác
            $data['categorys']=$this->getAllLimit(['trash'=>1],$limit,$offset);
            //tính tổng
            $totalRecords=count($this->getAll(['trash'=>1]));
            //chuẩn bị paging
            $data['paging']=new Paging('admincategory/categoryListInTrash/',$totalRecords,$limit,$offset);
            return $data;
        }
        public function doAddCategory(){
            //lấy dữ liệu nhóm mới
            $newcat['catName']=$_POST['inputCategoryName'];
            $newcat['alias']=$_POST['inputAlias'];
            $newcat['parentId']=$_POST['inputParentId'];
            $newcat['trash']=0;
            $newcat['status']=$_POST['inputStatus'];
            //tại chuỗi alias
            $helper=new Helper;
            if($newcat['alias']=='')
                $newcat['alias']=$helper->to_alias($newcat['catName']);
            $_SESSION['msg']='';
            if($this->get(['catName'=>$newcat['catName']]))
                $_SESSION['msg'].='Lỗi! tên nhóm đã có trên server hãy tạo tên nhóm khác.';
            else{
                if($this->get(['alias'=>$newcat['alias']]))
                    $_SESSION['msg'].='Lỗi! alias đã có trên server hãy đổi alias khác.';
                else{
                    if($this->insert($newcat))
                        $_SESSION['msg'].='Thêm nhóm sản phẩm thành công';
                     else
                        $_SESSION['msg'].='Thêm sản phẩm thất bại';
                }
            }
            

        }

        public function doUpdateCategory($catId){
            //lấy dữ liệu sản phẩm mới
            $newcat['catName']=$_POST['inputCategoryName'];
            $newcat['alias']=$_POST['inputAlias'];
            $newcat['parentId']=$_POST['inputParentId'];
            $newcat['trash']=0;
            $newcat['status']=$_POST['inputStatus'];
            //tạo chuổi alias
            $helper=new Helper;
            if($newcat['alias']=='')
                $newcat['alias']=$helper->to_alias($newcat['catName']);
            //kiểm lỗi
            $_SESSION['msg']='';
            //lấy dữ liệu
            $rows=$this->getAll(['$sql']);
            //đưa dữ liệu vào array
            $catName=array();
            $alias=array();
            foreach($rows as $tt=>$a){
                foreach($a as $k=>$v){
                    if($k=='catId'&& $v==$catId)
                        break;
                    
                        if($k=='catName')
                        $catName[]=$v;
                        if($k=='alias')
                        $alias[]=$v; 
                } 
            }
            //kiểm tra có trùng catname không
            $name=0;
            for($i=0;$i<count($catName);$i++){
                //echo $newcat['catName'];
                if($catName[$i]==$newcat['catName']){
                    $name=1;
                    break;
                }
           }
           //kiểm tra có trùng alias không
           $as=0;
            for($i=0;$i<count($alias);$i++){
                if($alias[$i]==$newcat['alias']){
                    $as=1;
                    break;
                }
           }
           //xử lý lỗi và update
           if($name==1)
                $_SESSION['msg'].='lỗi! tên nhóm trùng cập nhập thất bại.';
           else{
               if($as==1)
                    $_SESSION['msg'].='lỗi! alias trùng cập nhập thất bại.';
               else{
                if($this->update($newcat,$catId))
                    $_SESSION['msg'].='Cập nhật sản phẩm thành công.';
                else
                    $_SESSION['msg'].='Cập nhật sản phẩm thất bại';
               }
           }
        }

        public function toggleTrash($catId){
            if($this->toggle('trash',$catId))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            
           header("location:".BASE_URL."admincategory/categorylist/".LIMIT.'/0');
            exit;
        }
        
        public function toggleStatus($catId){
            if($this->toggle('status',$catId))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            header("location:".BASE_URL."admincategory/categorylist/".LIMIT.'/0');
            exit;
        }

        public function categoryDelete($catId){
            if($this->delete($catId))
                $_SESSION['msg']='Thực hiện thành công';
            else
                $_SESSION['msg']='Thực hiện không thành công';
            header("location:".BASE_URL."admincategory/categorylistInTrash/".LIMIT."/0");
            exit;
        }

        public function categoryUnTrash($catId){
            if($this->toggle('trash',$catId))
                $_SESSION['msg']='khôi phục nhóm sản phẩm thành công.';
            else
                $_SESSION['msg']='khôi phục nhóm sản phẩm không thành công.';
            header("location:".BASE_URL."admincategory/categoryListIntrash/".LIMIT."/0");
            exit;
        }
    }
?>