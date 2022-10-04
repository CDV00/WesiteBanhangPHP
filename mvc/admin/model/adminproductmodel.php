<?php
    class AdminProductModel extends AdminModel{
        protected $table=DB_PREFIX.'product';
        protected $field=['productName','Alias','catId','brandId','Image','trash','status','Detail','Price','salePrice'];
        protected $key='productId';
        //cac function can thiet
        public function productList($limit,$offset){
            //lay danh sach cac san pham
            $data['products']=$this->getAllLimit(['trash'=>0],$limit,$offset);
            //tinh tong cac san pham
            $totalRecords=count($this->getAll(['trash'=>0]));
            //chuan bi paging
            $data['paging']=new Paging('adminproduct/productlist/',$totalRecords,$limit,$offset);
            return $data;
        }
        public function toggleTrash($productId){
            if($this->toggle('trash',$productId))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            
           header("location:".BASE_URL."adminproduct/productlist/".LIMIT.'/0');
            exit;
        }
        
        public function toggleStatus($productId){
            if($this->toggle('status',$productId))
                $_SESSION['msg']='thực hiện thành công';
            else
                $_SESSION['msg']='thực hiện không thành công thành công';
            header("location:".BASE_URL."adminproduct/productlist/".LIMIT.'/0');
            exit;
        }
        public function productListInTrash($limit,$offset){
            //lay danh sach cac san pham thung rac
            $data['products']=$this->getAllLimit(['trash'=>1],$limit,$offset);
            //tinh tong cac san pham
            $totalRecords=count($this->getAll(['trash'=>1]));
            //chuan bi paging
            $data['paging']=new Paging('adminproduct/productlistInTrash/',$totalRecords,$limit,$offset);
            return $data;
        }

        public function productDelete($productId){
            if($this->delete($productId))
                $_SESSION['msg']='Thực hiện thành công';
            else
                $_SESSION['msg']='Thực hiện không thành công';
            header("location:".BASE_URL."adminproduct/productlistInTrash/".LIMIT."/0");
            exit;
        }

        public function productUnTrash($productId){
            if($this->toggle('trash',$productId))
                $_SESSION['msg']='khôi phục sản phẩm thành công.';
            else
                $_SESSION['msg']='khôi phục sản phẩm không thành công.';
            header("location:".BASE_URL."adminproduct/productListIntrash/".LIMIT."/0");
            exit;
        }



        public function doAddProduct(){
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
                    $_SESSION['msg'].='Giá sale phải nhỏ hơn giá bán';
            }
            $uploadSuccess=$helper->doUpload('inputFileUpload');
            if($uploadSuccess){
                if($this->insert($newpro))
                    $_SESSION['msg'].='Thêm sản phẩm thành công';
                else
                    $_SESSION['msg'].='Thêm sản phẩm thất bại';
            }
            
        }

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
        }
            
    }
?>