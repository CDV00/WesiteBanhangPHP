<?php
class Cart extends usercontroller
{
    public function add($productId, $productName, $Price, $Image)
    {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } else {

            $_SESSION['cart'][$productId]['quantity'] = 1;
            $_SESSION['cart'][$productId]['productName'] = $productName;
            $_SESSION['cart'][$productId]['Price'] = $Price;
            $_SESSION['cart'][$productId]['Image'] = $Image;
        }
        echo '<script>window.history.back();</script>';
    }
    public function getCount()
    {
        $count = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $k => $v)
                $count += $v['quantity'];
        }
        return $count;
    }
    public function getItems()
    {
        if (isset($_SESSION['cart']))
            return $_SESSION['cart'];
        else
            return null;
    }
    public function getSubTotal($productId)
    {
        if (isset($_SESSION['cart'][$productId]))
            return $_SESSION['cart'][$productId]['Price'] * $_SESSION['cart'][$productId]['quantity'];
        else return 0;
    }
    public function getTotal()
    {
        $total = 0;
        if (isset($_SESSION['cart']))
            foreach ($_SESSION['cart'] as $k => $v)
                $total += $this->getSubTotal($k);
                return $total;
            }
    public function update()
    {
        foreach($_POST as $productId=>$quantity)
            if($quantity==0) 
                $this->remove($productId);
            else{
                $_SESSION['cart'][$productId]['quantity']=$quantity;
                $_SESSION['update']=true;
            }
                
            echo '<script>window.history.back();</script>';  
    }
    public function remove($productId){
        if(isset($_SESSION['cart'][$productId]))
            unset($_SESSION['cart'][$productId]);
        if(empty($_SESSION['cart']))
            unset($_SESSION['cart']);
    }
    public function checkOut(){
        if(isset($_POST['submit'])){
            $cartmodel=new CartModel();
            $cartmodel->checkOut($this->getTotal());
        }
        $this->loadView('master1','cart/checkOut',[]);
    }
}
?>
