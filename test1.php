<?php
require_once "config.php";
$path= './public/upload';
            $_SESSION['img']=array();
            $_SESSION['name']=array();
            if (is_dir($path)) {
                if ($dh = opendir($path)) {
                    while (($file = readdir($dh)) !== false) {
                        if($file=='.'||$file=='..')
                        continue;
                        else{  
                            $_SESSION['img'][]='<img src='.BASE_URL.'public/upload/'.$file.' style="width:100px;">';
                            $_SESSION['name'][]=$file;
                        }
                            
                    }
                    closedir($dh);
                }
                var_dump($_SESSION['name']);
}?>
