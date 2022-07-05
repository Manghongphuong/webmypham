<?php
    class hoadon{
        var $id=null;
        var $user_id=null;
        var $fullname=null;
        var $email=null;
        var $phone=null;
        var $address=null;
        var $note=null;
        var $orders_day=null;
        var $delivery_day=null;
        var $pttt= null;
        var $status=null;
        var $total_money=null;
        var $num = null;
        var $order_id = null;
        var $product_id = null;
        var $name = null;
    //pt khởi tạo/thiết lập
        public function _construct(){
            if(func_num_args()==16){
                $this->id = func_get_arg(0);
                $this->user_id = func_get_arg(1);
                $this->fullname = func_get_arg(2);
                $this->email = func_get_arg(3);
                $this->phone= func_get_arg(4);
                $this->address = func_get_arg(5);
                $this->note= func_get_arg(6);
                $this->orders_day= func_get_arg(7);
                $this->delivery_day= func_get_arg(8);
                $this->pttt= func_get_arg(9);
                $this->status= func_get_arg(10);
                $this->total_money= func_get_arg(11);
                $this->num= func_get_arg(12);
                $this->order_id = func_get_arg(13);
                $this->product_id = func_get_arg(14);
                $this->name = func_get_arg(17);
            }
        }
        public function tonghoadon(){
            $tong = 0;
            $phi = 0;
            $tamtinh = 0;
            foreach ($_SESSION['cart'] as $mycart) {
                $thanhtien=$mycart[4]*$mycart[3];
                $phi=15000;
                $tamtinh+=$thanhtien;
                $tong=$tamtinh+$phi;
            }
            return $tong;
        }
        public function insert_bill($user_id,$fullname,$email,$phone,$address,$note,$orders_day,$pttt,$total_money){
            $db = new connect();
            $str = 
            "INSERT INTO `orders`(`user_id`, `fullname`, `email`, `phone`, `address`, `note`, `orders_day`, `pttt`, `total_money`)
             VALUES 
             ('$user_id', '$fullname', '$email', '$phone', '$address', '$note', '$orders_day', '$pttt', '$total_money')";
            $h = $db->exec($str);
            return $h;
        }
        public function insert_ctbill($user_id,$order_id,$product_id,$name,$img,$price,$num,$total_money){
            $db = new connect();
            $str = 
            "INSERT INTO `orders_details`(`user_id`, `order_id`, `product_id`, `name`, `img`, `price`, `num`, `total_money`) 
            VALUES ('".$user_id."','".$order_id."','".$product_id."','".$name."','".$img."','".$price."','".$num."','".$total_money."')";
            $h = $db->exec($str);
            return $h;
        }
        public function getctbill() {
            $db = new connect();
            $str = "SELECT * FROM `orders` ORDER BY `id_orders` DESC limit 1";
            $handleInputOrder= $db->getList($str);
            return $handleInputOrder;
        }
        public function lastInsertId(){
            $db = new connect();
            $id = $db -> lastInsertId();
            return $id;
        }
        public function getbill(){
            $db = new connect();
            $strQuerty = "SELECT * FROM orders";
            $h= $db->getList($strQuerty);
            return $h;
        }
        public function getctdh(){
            $db = new connect();
            $strQuerty = "SELECT * FROM orders_details ";
            $order= $db->getList($strQuerty);
            return $order;
        }
        public function getBillID($id) {
            $db = new connect();
            $str = "select * from orders where id_orders=".$_GET['id'];
            $hb= $db->getInstance($str);
            return $hb;
        }
        public function get_status($t){
            switch ($t) {
               case '0':
                    $tt="Đơn hàng mới";
                    break;
               case '1':
                    $tt="Chưa xử lý";
                    break;
               case '2':
                    $tt="Đang giao hàng";
                    break;
               case '3':
                    $tt="Đã giao hàng";
                    break;
               default:
                   $tt="Đơn hàng mới";
                    break;
            }
            return $tt;
        }
        
        function get_pttt($p){
           switch ($p) {
               case '1':
                   $pt="Chuyển khoản trực tuyến";
                   break;
              case '2':
                   $pt="Thanh toán khi nhận nhận hàng";
                   break;
               case '3':
                   $pt="MoMo";
                   break;
               default:
                  $pt="Chuyển khoản trực tuyến";
                   break;
           }
           return $pt;
       }
        public function deleteHd($id){
            $db= new connect();
            $str = "DELETE FROM `orders` WHERE id_orders =".$id;
            $b = $db->exec($str);
            return $b;
        }
        public function updateHd($id,$fullname,$address,$note,$orders_day,$delivery_day,$pttt,$status,$total_money){
            $db = new connect();
            $sql = "UPDATE `orders` SET `fullname`='".$fullname."',`address`='".$address."',`note`='".$note."',`orders_day`='".$orders_day."',
            `delivery_day`='".$delivery_day."',`pttt`='".$pttt."',`status`='".$status."',`total_money`='".$total_money."' WHERE `id_orders`=".$id;
            $h= $db->exec($sql);
            return $h;
        }
    }
?>