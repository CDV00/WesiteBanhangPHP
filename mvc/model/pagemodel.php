<?php
    class PageModel extends BaseModel{
        protected $table=DB_PREFIX.'page';
        public function showall($limit,$offset){
            $sql="select * from ".$this->table." where trash='0' and status='1' limit $offset,$limit";
            //echo $sql;
            $data['posts']=$this->queryAll($sql);
            $sql="select * from ".$this->table." where trash='0' and status='1'";
            $totalRecords=count($this->queryAll($sql));
            $data['paging']=new Paging('page/showall/',$totalRecords,$limit,$offset);
            //var_dump($data['posts']);
            return $data;

        }
        public function showByTopic($topic,$limit,$offset){
            //lấy nhóm sản phẩm
            $sql="select * from ".$this->table." where topicId=".$topic." and trash='0' and status='1' limit $offset,$limit";
            //lấy sản phẩm trong nhóm
            if($topic==1) $data['topic']='THông Tin Shop';
            else $data['topic']='Tin Công Nghệ';
            $data['posts']=$this->queryAll($sql);
                /* $this->getAllLimit(['status'=>1,'trash'=>0,'catId'=>$cat['catId']],$limit,$offset);
            $data['cat']=$cat; */
            //tinh tong so san pham
            /* var_dump($data['posts']);
            $totalRecords=count($this->getAll(['status'=>1,'trash'=>0,'catId'=>$cat['catId']]));
            //chuan bi paging
            $data['paging']=
                new Paging('product/productByCat/'.$topic.'/',$totalRecords,$limit,$offset); */
            return $data;
        }
        public function showdetail($alias){
            //lấy nhóm sản phẩm
            $data['currentpost']=$this->get(['alias'=>$alias]);
           
            //lấy sản phẩm tuong tu
           
            $data['samepost']=
                $this->getAll(['status'=>1,'trash'=>0,'topicId'=>$data['currentpost']['topicId']]);
            return $data;
        }
    }