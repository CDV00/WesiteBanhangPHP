<?php
    class AdminLinkModel extends AdminModel{
        protected $table=DB_PREFIX.'link';
        protected $field=['title','Position','Image','link','orders','trash','status'];
        protected $key='id';
        //cac function can thiet
        public function linkList($limit,$offset){
            //lay danh sach cac san pham
            $data['links']=$this->getAllLimit(['trash'=>0],$limit,$offset);
            //var_dump($data);
            //tinh tong cac san pham
            $totalRecords=count($this->getAll(['trash'=>0]));
            //chuan bi paging
            $data['paging']=new Paging('adminlink/linklist/',$totalRecords,$limit,$offset);
            return $data;
        }
        public function linkListInTrash($limit,$offset){
            //lay danh sach cac san pham thung rac
            $data['links']=$this->getAllLimit(['trash'=>1],$limit,$offset);
            //tinh tong cac san pham
            $totalRecords=count($this->getAll(['trash'=>1]));
            //chuan bi paging
            $data['paging']=new Paging('adminlink/linklist/',$totalRecords,$limit,$offset);
            return $data;
        }
        public function toggleStatus($id){
            if($this->toggle('status',$id))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            header("location:".BASE_URL."adminlink/linklist/".LIMIT.'/0');
            exit;
        }
        public function doAddLink(){
            //lấy dữ liệu sản phẩm mới
            $newlink['title']=$_POST['inputTitle'];
            $newlink['Position']=$_POST['inputPosition'];
            $newlink['Image']=basename($_FILES['inputFileUpload']['name']);
            $newlink['link']=$_POST['inputLink'];
            $newlink['orders']=$_POST['inputOrders'];
            $newlink['trash']=0;
            $newlink['status']=$_POST['inputStatus'];
              
            //kiểm lỗi
            $_SESSION['msg']='';
            
            
            if(($this->get(['title'=>$newlink['title']]))&&($this->get(['Position'=>$newlink['Position']])))
                $_SESSION['msg'].='Thêm sản phẩm thất bại';
            else{
                if($this->insert($newlink))
                    $_SESSION['msg'].='Thêm sản phẩm thành công';
                else
                    $_SESSION['msg'].='Thêm sản phẩm thất bại';
            }
            
            
        }

        public function doUpdateLink($Id){
            //lấy dữ liệu sản phẩm mới
            $newlink['title']=$_POST['inputTitle'];
            $newlink['Position']=$_POST['inputPosition'];
            $newlink['Image']=basename($_FILES['inputFileUpload']['name']);
            $newlink['link']=$_POST['inputLink'];
            $newlink['orders']=$_POST['inputOrders'];
            $newlink['trash']=0;
            $newlink['status']=$_POST['inputStatus'];
              
            //kiểm lỗi
            $_SESSION['msg']='';


            if(($this->get(['title'=>$newlink['title']]))&&($this->get(['Position'=>$newlink['Position']])))
                $_SESSION['msg'].='Thêm sản phẩm thất bại';
                else{
                    if($this->update($newlink,$Id))
                        $_SESSION['msg'].='Cập nhật thành công';
                    else
                        $_SESSION['msg'].='Cập nhật thất bại';
                    header("location:".BASE_URL.'adminproduct/productlist');
                    exit;
                }
            
            
        }

        public function toggleTrash($Id){
            if($this->toggle('Trash',$Id))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            
           header("location:".BASE_URL."adminlink/linklist/".LIMIT.'/0');
            exit;
        }
        public function linkUnTrash($Id){
            if($this->toggle('Trash',$Id))
                $_SESSION['msg']='khôi phục thành công.';
            else
                $_SESSION['msg']='khôi phục không thành công.';
            header("location:".BASE_URL."adminlink/linkListIntrash/".LIMIT."/0");
            exit;
        }
        public function linkDelete($Id){
            if($this->delete($Id))
                $_SESSION['msg']='Thực hiện thành công';
            else
                $_SESSION['msg']='Thực hiện không thành công';
            header("location:".BASE_URL."adminlink/linkListIntrash/".LIMIT."/0");
            exit;
        }
        /* 
        

        


        public function doUpdateProduct($productId){
            //lấy dữ liệu sản phẩm mới
            $newpro['productName']=$_POST['inputProductName'];
            $newpro['Alias']=$_POST['inputAlias'];
            $newpro['catId']=$_POST['inputCatId'];
            $newpro['brandId']=$_POST['inputBrandId'];
            $newpro['Image']=basename($_FILES['inputFileUpload']['name']);
            $newpro['trash']=0;
            $newpro['status']=$_POST['inputStatus'];
            $newpro['Detail']=$_POST['inputDetail'];
            $newpro['Price']=$_POST['inputPrice'];
            $newpro['salePrice']=$_POST['inputsalePrice'];
            //tạo chuổi alias
            $helper=new Helper;
            if($newpro['Alias']=='')
                $newpro['Alias']=$helper->to_alias($newpro['productName']);
            //kiểm lỗi
            $_SESSION['msg']='';
            if($newpro['salePrice']=='')
                $newpro['salePrice']=0;
            else{
                if($newpro['Price']<$newpro['salePrice'])
                    $_SESSION['msg'].='Giá sale phải nhỏ hơn giá bán <br> Cập nhập sản phẩm không thành công.';
                    header("location:".BASE_URL.'adminproduct/productlist');
                    exit;
            }
            if($_FILES['inputFileUpload']['name']!=''){
                $_SESSION['msg'].='file up lên: '.$_FILES['inputFileUpload']['name'];
                $uploadSuccess=$helper->doUpload('inputFileUpload');
                if($uploadSuccess){
                    $newpro['Image']=$_FILES['inputFileupload']['name'];
                    if($this->update($newpro,$productId))
                        $_SESSION['msg'].='Cập nhật sản phẩm thành công';
                    else
                        $_SESSION['msg'].='Cập nhật sản phẩm thất bại';
                    header("location:".BASE_URL.'adminproduct/productlist');
                    exit;
                }
            }
            else{
                if($this->update($newpro,$productId))
                    $_SESSION['msg'].='Cập nhật sản phẩm thành công';
                else
                    $_SESSION['msg'].='Cập nhật sản phẩm thất bại';
                header("location:".BASE_URL.'adminproduct/productlist');
                exit;
            }
        } */
            
    }
?>