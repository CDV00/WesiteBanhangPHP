<?php
    class ProductModel extends BaseModel{
        protected $table=DB_PREFIX.'product';
        //protected $key='productId';
        public function home($limit,$offset){
            $sql="select * from ".$this->table." where trash='0' and status='1' and salePrice<>''limit $offset,$limit";
            //echo $sql;
            $data['products']=$this->queryAll($sql);
            $sql="select * from ".$this->table." where trash='0' and status='1' and salePrice<>''";
            $totalRecords=count($this->queryAll($sql));
            $data['paging']=new Paging('product/home/',$totalRecords,$limit,$offset);
            return $data;
        }
        

        public function productByCat($catAlias,$limit,$offset){
            //lấy nhóm sản phẩm
            $categorymodel = new CategoryModel;
            $cat = $categorymodel->get(['alias'=>$catAlias]);
            //lấy sản phẩm trong nhóm
            $data['products']=
                $this->getAllLimit(['status'=>1,'trash'=>0,'catId'=>$cat['catId']],$limit,$offset);
            $data['cat']=$cat;
            //tinh tong so san pham
            $totalRecords=count($this->getAll(['status'=>1,'trash'=>0,'catId'=>$cat['catId']]));
            //chuan bi paging
            $data['paging']=
                new Paging('product/productByCat/'.$catAlias.'/',$totalRecords,$limit,$offset);
            return $data;
        }

        public function productByBrand($brandAlias,$limit,$offset){
            //lấy nhóm sản phẩm
            $brandmodel = new BrandModel;
            $brand=$brandmodel->get(['alias'=>$brandAlias]);
            //lấy sản phẩm trong nhóm
            $data['products']=
                $this->getAllLimit(['status'=>1,'trash'=>0,'brandId'=>$brand['brandId']],$limit,$offset);
            $data['brand']=$brand;
            //tinh tong so san pham
            $totalRecords=count($this->getAll(['status'=>1,'trash'=>0,'brandId'=>$brand['brandId']]));
            //chuan bi paging
            $data['paging']=
                new Paging('product/productByBrand/'.$brandAlias.'/',$totalRecords,$limit,$offset);
            return $data;
        }
        
        public function productDetail($productAlias){
            //lấy nhóm sản phẩm
            $data['currentproduct']=$this->get(['alias'=>$productAlias]);
           
           
            //lấy sản phẩm tuong tu
           
            $data['sameProducts']=
                $this->getAll(['status'=>1,'trash'=>0,'catId'=>$data['currentproduct']['catId']]);
            return $data;
        }

        public function productSearch($searchKey,$limit,$offset){
            //lay thong tin san pham duoc hien thi
            $sql="select * from $this->table 
            where status='1' and trash='0' and productName like '%$searchKey%' 
            order by productId limit $offset,$limit";
            //thuc thi cau lenh 
            $data['products']=$this->queryAll($sql);
            //tinh tong so san pham tim thay
            $sql="select * from $this->table 
            where status='1' and trash='0' and productName like '%$searchKey%' 
            order by productId";
            $totalRecords=count($this->queryAll($sql));
            $data['totalRecords']=$totalRecords;
            $data['paging']=
                new Paging('product/productSearch/',$totalRecords,$limit,$offset);
            //echo $sql;
            return $data;
            
        }
    }
?>