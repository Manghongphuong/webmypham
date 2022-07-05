<?php
    class sanpham{
    var $id=null;
    var $tensp=null;
    var $soluong=null;
    var $img=null;
    var $gia=null;
    var $chitiet=null;
    var $ngaycn=null;
    var $iddm=null;
    var $idbr=null;
    var $file_name= null;
    //pt khởi tạo/thiết lập
    public function _construct(){
        if(func_num_args()==9){
            $this->id = func_get_arg(0);
            $this->tensp = func_get_arg(1);
            $this->soluong = func_get_arg(2);
            $this->img = func_get_arg(3);
            $this->gia = func_get_arg(4);
            $this->chitiet = func_get_arg(5);
            $this->ngaycn= func_get_arg(6);
            $this->iddm= func_get_arg(7);
            $this->idbr= func_get_arg(8);
        }
    }
    public function getSP() {
        $db = new connect();
        $strQuerty = "select * from products";
        $p = $db->getList($strQuerty);
        return $p;

    }
    public function getSP_home() {
        $db = new connect();
        $strQuerty = "select * from products where 1 order by id_products desc limit 0,9";
        $p = $db->getList($strQuerty);
        return $p;

    }
    public function getSP_home_top10() {
        $db = new connect();
        $strQuerty = "select * from products where 1 order by view desc limit 0,9";
        $p = $db->getList($strQuerty);
        return $p;

    }
    public function getSPById($id) {
        $db = new connect();
        $str = "select * from products where id_products =".$_GET['id'];
        $sp= $db->getInstance($str);
        return $sp;
    }
    
    public function getSPnew() {
        $db = new connect();
        $strQuerty = "select * from products order by id_products desc limit 1";
        $p= $db->getList($strQuerty);
        return $p;
    }
    //ảnh nhiều
    public function getImg($id) {
        $db = new connect();
        $str = "select * from images where products_id =".$_GET['id'];
        $img= $db->getList($str);
        return $img;
    }
    public function addSP($tensp,$gia,$img,$soluong,$chitiet,$ngaycn,$iddm,$idbr){
        $db = new connect();
        $str = $str = "INSERT INTO `products` (`id_products`,`name`,`price`,`img`,`number`,`detail`,`update_at`,`category_id`,`brand_id`)
        VALUES(null,'".$tensp."','".$gia."','".$img."','".$soluong."','".$chitiet."','".$ngaycn."','".$iddm."','".$idbr."');";
        $p = $db->exec($str); 
        return $p;
    }
    
    public function updateSP($id,$tensp,$gia,$img,$soluong,$chitiet,$ngaycn,$iddm,$idbr){
        $db = new connect();
        if($img!="")
        $str= "update products set category_id='".$iddm."',brand_id='".$idbr."', name='".$tensp."', img='".$img."', price='".$gia."', number='".$soluong."', detail= '".$chitiet."', update_at='".$ngaycn."' where id_products=".$id;
        else
        $str= "update products set category_id='".$iddm."',brand_id='".$idbr."', name='".$tensp."', price='".$gia."', number='".$soluong."', detail= '".$chitiet."', update_at='".$ngaycn."'  where id_products=".$id;
        $p= $db->exec($str);
        return $p;


    }
    public function deleteSP($id){
        $db= new connect();
        $str = "delete from products where id_products=".$id;
        $p = $db->exec($str);
        return $p;
    }
}
?>