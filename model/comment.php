<?php 
    class binhluan{
        var $id=null;
        var $taikhoan=null;
        var $sanpham=null;
        var $noidung=null;
        var $ngaybl = null;

        public function _construct(){
            if(func_num_args()==5){
                $this->id = func_get_arg(0);
                $this->taikhoan = func_get_arg(1);
                $this->sanpham = func_get_arg(2);
                $this->noidung = func_get_arg(3);
                $this->ngaybl = func_get_arg(4);
               
            }
        }
        public function getBlsanpham() {
            $db = new connect();
            $strQuerty = "select * from comment order by product_id desc limit 10";
            $b= $db->getList($strQuerty);
            return $b;
        }
        public function getListbl() {
            $db = new connect();
            $strQuerty = "select * from comment";
            $b= $db->getList($strQuerty);
            return $b;
        }
        public function insert_binhluan($username, $user_id, $sanpham, $noidung, $ngaybl){
            $db = new connect();
            $str = "INSERT INTO `comment`(`username`,`user_id`, `product_id`, `content`, `daycomment`) 
            VALUES ('$username','$user_id', '$sanpham', '$noidung', '$ngaybl')";
            $b = $db->exec($str); 
            return $b;
        }
        public function getbinhluan($sanpham) {
            $db = new connect();
            $query = "SELECT * FROM `comment` WHERE product_id = '$sanpham' ORDER BY `id_comment` DESC";
            $b= $db->getList($query);
            return $b;
        }
        public function deletebl($id){
            $db= new connect();
            $str = "delete from comment where id_comment=".$id;
            $b = $db->exec($str);
            return $b;
        }
    }
    
?>