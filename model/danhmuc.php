<?php
    class danhmuc{
    var $id=null;
    var $tenloai=null;

    public function _construct(){
        if(func_num_args()==2){
            $this->id = func_get_arg(0);
            $this->tenloai = func_get_arg(1);
        }
    }
    public function getLoaidm() {
        $db = new connect();
        $strQuerty = "select * from category";
        $r = $db->getList($strQuerty);
        return $r;

    }
    public function getLoaidmById($id) {
        $db = new connect();
        $strQuerty = "select * from category where id_category =$id";
        $dm= $db->getInstance($strQuerty); 
        return $dm;
    }
    public function addDm($tenloai){
        $db = new connect();
        $str = "INSERT INTO `category` (`id_category`,`name_category`)
        VALUES(null,'".$tenloai."');";
        $r = $db->exec($str);
        return $r;
    }
    public function updatedm($id, $tenloai){
        $db = new connect();
        $str= "UPDATE `category`
        SET `name_category` = '".$tenloai."'
        WHERE `category`.`id_category`= $id;";
        $r= $db->exec($str);
        return $r;
    }
    public function deletedm($id){
        $db= new connect();
        $str = "DELETE FROM `category` WHERE `category`.`id_category` = $id";
        $r = $db->exec($str);
        return $r;
    }
}
?>
