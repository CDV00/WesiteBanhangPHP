<?php
    class CartModel extends BaseModel{
        public function checkOut($total){
            $_SESSION['msg']='';
            //hứng du lieu customer dua vao co so du lieu
            $newcustomer['userId']=0;
            $newcustomer['fullname']=$_POST['inputFullname'];
            $newcustomer['address']=$_POST['inputAddress'];
            $newcustomer['phone']=$_POST['inputPhone'];
            $newcustomer['email']=$_POST['inputEmail'];
            $newcustomer['trash']=0;

            $customermodel=new CustomerModel;
            if(!$customermodel->insert($newcustomer))
                $_SESSION['msg'].='lỗi trong quá  trình sử lý đơn hàng';
            //lấy id của customer mới
            $sql='select* from '.DB_PREFIX.'customer ORDER BY customerId DESC';
            $customerId=$this->queryFirst($sql)['customerId'];

            //hứng du lieu order dua vao co so du lieu
            $neworder['customerId']=$customerId;
            $neworder['orderDate']=date('Y-m-d H:i:s');
            $neworder['total']=$total;
            $neworder['Note']=$_POST['inputNote'];
            $neworder['status']=1;
            $neworder['trash']=0;

            $ordermodel=new OrderModel;
            if(!($ordermodel->insert($neworder)))
                $_SESSION['msg'].='lỗi trong quá  trình sử lý đơn hàng';
            //lấy Id order
            $sql='select* from '.DB_PREFIX.'order ORDER BY orderId DESC';

            $orderId=$this->queryFirst($sql)['orderId'];
            //echo $orderId;
            //hứng du lieu orderdetail dua vao co so du lieu
            $orderdetailmodel=new OrderDetailModel;
            
            foreach($_SESSION['cart'] as $k=>$c){
                $neworderdetail['orderId']=$orderId;
                $neworderdetail['productId']=$k;
                $neworderdetail['price']=$c['Price'];
                $neworderdetail['quantity']=$c['quantity'];
                $neworderdetail['trash']=0;

                if(!($orderdetailmodel->insert($neworderdetail)))
                    $_SESSION['msg'].='lỗi trong quá  trình sử lý đơn hàng';
            }
            //var_dump($orderdetailmodel);
            if($_SESSION['msg']==''){
                $_SESSION['msg']='đặt hàng thành công';
                unset($_SESSION['cart']);
            }
        }
    }

?>