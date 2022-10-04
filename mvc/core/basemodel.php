<?php
    class BaseModel extends Db{
        protected $table;
        protected $field;
        protected $key;

        //trả về tất cả các record
        public function getAll($cond)
        {
            $cond=$this->where($cond);
            //echo $this->table,$cond;
            $sql="select * from $this->table $cond";
            
            //$sql="select * from caodinhvu_product";
            //echo $sql;
            return($this->queryAll($sql));
        }
        

        public function getAllLimit($cond,$limit,$offset){
            $cond=$this->where($cond);
            $sql="select* from $this->table $cond limit $offset, $limit";
            return($this->queryAll($sql));
        }
        public function get($cond){
            $cond=$this->where($cond);
            $sql="select* from $this->table $cond";
            return($this->queryFirst($sql));
        }
        private function where($cond){
            $condString='';
            if($cond!=[]){
                foreach($cond as $k=>$v)
                {$condString.="$k='$v' and ";}
                $condString=substr($condString,0,strlen($condString)-4);
                $condString="where ".$condString;
            }

            return $condString;
        }
        function insert($data){
            //var_dump($data);
           /*  echo "<pre>";
            print_r($data);
            echo "</pre>"; */
            $dataString="'".implode("','",$data)."' ";
            //echo $dataString;
            $fieldString=implode(',',$this->field);
            $sql="  insert into $this->table($fieldString) values($dataString)";
            //echo $sql;
            return $this->query($sql);
        }
    }
?>