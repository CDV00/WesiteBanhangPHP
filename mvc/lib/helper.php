<?php
    class Helper{
        public function to_alias($str){
            $str=trim(mb_strtolower($str));
            $str=preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/','a',$str);
            $str=preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/','e',$str);
            $str=preg_replace('/(ì|í|ị|ỉ|ĩ)/','i',$str);
            $str=preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/','o',$str);
            $str=preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/','u',$str);
            $str=preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/','y',$str);
            $str=preg_replace('/(đ)/','d',$str);
            $str=preg_replace('/[^a-z0-9-\s]/','',$str);
            $str=preg_replace('/([\s]+)/','-',$str);
            return $str;
        }
        public function doUpload($inputFileUpload){
            //kiểm tra có dữ liệu fileuploasd trong $_FILES không
            //nếu không có thì dừng
            $_SESSION['msg']='';
            if($_FILES[$inputFileUpload]['error']!=0)
                $_SESSION['msg'].="Dữ liệu không đúng cấu trúc, Dữ liệu upload lỗi hoặc chưa chọn file upload<br>";
            else{
                //Đã có dữ liệu upload,thực hiện xữ lý file upload
                //thư mục bạn chon sẽ lưu file upload
                $target_dir ="public/upload/";
                //vị trí file lưu tạm trong server (file sẽ lưu trong upload,với tên giống tên ban đều)
                $target_file =$target_dir.basename($_FILES[$inputFileUpload]['name']);
                $allowUpload =true;
                //lấy phần mở rộng của file (jpg,png,...)
                $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
                //cỡ lớn nhất được upload(bytes)
                $maxfilesize=800000;
                //những loại file được upload
                $allowtypes =array('jpg','png','jpeg','gif');
                if(isset($_POST["submit"])){
                    //kiểm tra xem có phải ảnh bằng hàm getimagesize
                    $check=getimagesize($_FILES[$inputFileUpload]['tmp_name']);
                    if($check!== false){
                        $_SESSION['msg'].="Đây là file ảnh - ".$check['mime']."<br>";
                        $allowUpload=true;
                    }
                    else{
                        $_SESSION['msg'].="Đây không phải file ảnh.<br>";
                        $allowUpload=false;
                    }
                }
                //Kiểm tra file đã tồn tại thì không cho phép ghi đè
                if(file_exists($target_file)){
                    $_SESSION['msg'].="tên file đã tồn tại trên server, không được phép ghi đè <br>";
                    $allowUpload=false;
                }
                //kiểm tra kích thước file upload không vượt quá giới hạn cho phép
                if($_FILES[$inputFileUpload]["size"]>$maxfilesize){
                    $_SESSION['msg'].="không được upload ảnh lớn hơn ".$maxfilesize."(bytes).<br>";
                    $allowUpload=false;
                }
                //kiểm tra kiểu file
                if(!in_array($imageFileType,$allowtypes)){
                    $_SESSION['msg'].="chỉ được upload các định dạng JPG,PNG,JPEG,GIF<br> ";
                    $allowUpload=false;
                }
                if($allowUpload){
                    //xử lý file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                    if(move_uploaded_file($_FILES[$inputFileUpload]["tmp_name"],$target_file)){
                        $_SESSION['msg'].="/public/upload/".basename($_FILES[$inputFileUpload]["name"])." đã upload thành công<br>";
                        $_SESSION['msg'].="File lưu tại ".$target_file.'<br>';
                        return true;
                    }
                    else{
                        $_SESSION['msg'].="Có lỗi xẩy ra khi upload file<br>";
                        return false;
                    }
                }
                else{
                    $_SESSION['msg'].="Không upload được file,có thể do file lớn,kiểu file không đúng,...";
                    return false;
                }

            }
        }
    }
?>