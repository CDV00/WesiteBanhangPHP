<?php
    class AdminImageModel{
        public function imageList($limit,$offset){
            $path= './public/upload';
            if (is_dir($path)) {
                if ($dh = opendir($path)) {
                    while (($file = readdir($dh)) !== false) {
                        if($file=='.'||$file=='..')
                        continue;
                        else{  
                            $data['img'][]='<img src='.BASE_URL.'public/upload/'.$file.' style="width:100px;">';
                            $data['name'][]=$file;
                        }
                            
                    }
                    closedir($dh);
                }
            }
            $totalRecords=count($data);
            $data['paging']=new Paging('adminimage/imageList/',$totalRecords,$limit,$offset);
            return $data;
        }
    }

?>