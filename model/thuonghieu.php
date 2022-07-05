<?php
    class thuonghieu{
        var $id=null;
        var $thuonghieu=null;
        //pt khởi tạo/thiết lập
        public function _construct(){
            if(func_num_args()==2){
                $this->id = func_get_arg(0);
                $this->thuonghieu = func_get_arg(1);
            }
        }
        public function getTH() {
            $db = new connect();
            $strQuerty = "select * from  brand";
            $th = $db->getList($strQuerty);
            return $th;

        }
        public function getTHById($id) {
            $db = new connect();
            $strQuerty = "select * from  brand where id_brand =$id";
            $br= $db->getInstance($strQuerty); 
            return $br;
        }
        public function addTH($thuonghieu){
            $db = new connect();
            $str = "INSERT INTO `brand` (`id_brand`,`namebr`)
            VALUES(null,'".$thuonghieu."');";
            $th = $db->exec($str);
            return $th;
        }
        public function updateTH($id, $thuonghieu){
            $db = new connect();
            $str= "UPDATE `brand`
            SET `namebr` = '".$thuonghieu."'
            WHERE `brand`.`id_brand`= $id;";
            $th= $db->exec($str);
            return $th;
        }
        public function deleteTH($id){
            $db= new connect();
            $str = "DELETE FROM `brand` WHERE `brand`.`id_brand` = $id";
            $th = $db->exec($str);
            return $th;
        }
}
?>