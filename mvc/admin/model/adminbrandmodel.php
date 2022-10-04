<?php
    class AdminBrandModel extends AdminModel{
        protected $table=DB_PREFIX.'brand';
        protected $field=['brandName','alias','trash','status'];
        protected $key='brandId';

        public function brandList($limit,$offset){
            //lấy tất cả nhóm
            $data['brands']=$this->getAllLimit(['trash'=>0],$limit,$offset);
            //tính tổng các nhóm
            $totalRecords=count($this->getAll(['trash'=>0]));
            //Chuẩn bị paging
            $data['paging']=new Paging('adminbrand/brandList/',$totalRecords,$limit,$offset);
            return $data;
        }
        public function brandlistInTrash($limit,$offset){
            //xem tất cả nhốm trong thùng rác
            $data['brands']=$this->getAllLimit(['trash'=>1],$limit,$offset);
            //tính tổng
            $totalRecords=count($this->getAll(['trash'=>1]));
            //chuẩn bị paging
            $data['paging']=new Paging('adminbrand/brandListInTrash/',$totalRecords,$limit,$offset);
            return $data;
        }
        public function doAddbrand(){
            //lấy dữ liệu nhóm mới
            $newbrand['brandName']=$_POST['inputBrandName'];
            $newbrand['alias']=$_POST['inputAlias'];
            $newbrand['trash']=0;
            $newbrand['status']=$_POST['inputStatus'];
            //tại chuỗi alias
            $helper=new Helper;
            if($newbrand['alias']=='')
                $newbrand['alias']=$helper->to_alias($newbrand['brandName']);
            $_SESSION['msg']='';
            if($this->get(['brandName'=>$newbrand['brandName']]))
                $_SESSION['msg'].='Lỗi! tên thương hiệu đã có trên server hãy tạo tên thương hiệu khác.';
            else{
                if($this->get(['alias'=>$newbrand['alias']]))
                    $_SESSION['msg'].='Lỗi! alias đã có trên server hãy đổi alias khác.';
                else{
                    if($this->insert($newbrand))
                        $_SESSION['msg'].='Thêm thương hiệu thành công';
                     else
                        $_SESSION['msg'].='Thêm thương hiệu thất bại';
                }
            }
            

        }

        public function doUpdateBrand($brandId){
            //lấy dữ liệu sản phẩm mới
            $newbrand['brandName']=$_POST['inputBrandName'];
            $newbrand['alias']=$_POST['inputAlias'];
            $newbrand['trash']=0;
            $newbrand['status']=$_POST['inputStatus'];
            //tạo chuổi alias
            $helper=new Helper;
            if($newbrand['alias']=='')
                $newbrand['alias']=$helper->to_alias($newbrand['brandName']);
            //kiểm lỗi
            $_SESSION['msg']='';
            //lấy dữ liệu
            $rows=$this->getAll(['$sql']);
            //đưa dữ liệu vào array
            $brandName=array();
            $alias=array();
            foreach($rows as $tt=>$a){
                foreach($a as $k=>$v){
                    if($k=='brandId'&& $v==$brandId)
                        break;
                    
                        if($k=='brandName')
                        $brandName[]=$v;
                        if($k=='alias')
                        $alias[]=$v; 
                } 
            }
            //kiểm tra có trùng brandName không
            $name=0;
            for($i=0;$i<count($brandName);$i++){
                if($brandName[$i]==$newbrand['brandName']){
                    $name=1;
                    break;
                }
           }
           //kiểm tra có trùng alias không
           $as=0;
            for($i=0;$i<count($alias);$i++){
                if($alias[$i]==$newbrand['alias']){
                    $as=1;
                    break;
                }
           }
           //xử lý lỗi và update
           if($name==1){
                $_SESSION['msg'].='lỗi! tên thương hiệu trùng cập nhập thất bại.';
                
           }
           else{
               if($as==1){
                    $_SESSION['msg'].='lỗi! alias trùng cập nhập thất bại.';
                   
               }
               else{
                if($this->update($newbrand,$brandId))
                    $_SESSION['msg'].='Cập nhật thương hiệu thành công.';
                else
                    $_SESSION['msg'].='Cập nhật thương hiệu thất bại';
               }
           }
        }

        public function toggleTrash($brandId){
            if($this->toggle('trash',$brandId))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            
           header("location:".BASE_URL."adminbrand/brandlist/".LIMIT.'/0');
            exit;
        }
        
        public function toggleStatus($brandId){
            if($this->toggle('status',$brandId))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            header("location:".BASE_URL."adminbrand/brandlist/".LIMIT.'/0');
            exit;
        }

        public function brandDelete($brandId){
            if($this->delete($brandId))
                $_SESSION['msg']='Thực hiện thành công';
            else
                $_SESSION['msg']='Thực hiện không thành công';
            header("location:".BASE_URL."adminbrand/brandlistInTrash/".LIMIT."/0");
            exit;
        }

        public function brandUnTrash($brandId){
            if($this->toggle('trash',$brandId))
                $_SESSION['msg']='khôi phục nhóm sản phẩm thành công.';
            else
                $_SESSION['msg']='khôi phục nhóm sản phẩm không thành công.';
            header("location:".BASE_URL."adminbrand/brandListIntrash/".LIMIT."/0");
            exit;
        }
    }
?>