<?php
    class taikhoan{
        var $id=null;
        var $tendn=null;
        var $hoten=null;
        var $email=null;
        var $phone=null;
        var $diachi=null;
        var $mk=null;
        //pt khởi tạo/thiết lập
        public function _construct(){
            if(func_num_args()==7){
                $this->id = func_get_arg(0);
                $this->tendn = func_get_arg(1);
                $this->hoten = func_get_arg(2);
                $this->email = func_get_arg(3);
                $this->phone = func_get_arg(4);
                $this->diachi = func_get_arg(5);
                $this->mk= func_get_arg(6);
            }
        }
        public function insert_taikhoan($tendn,$hoten,$email,$phone,$diachi,$mk){
            $db = new connect();
            $str = "INSERT INTO `user` (`username`,`fullname`,`email`,`phone`,`address`,`password`,`role`)
            VALUES('".$tendn."','".$hoten."','".$email."','".$phone."','".$diachi."','".$mk."', 1)";
            // echo($str);
            $a = $db->exec($str); 
            return $a;
        }
        public function checkuser($tendn,$mk) {
            $db = new connect();
            $strQuerty = 'SELECT * from user where username="'.$tendn.'" and password= "'.$mk.'" ';
            $a = $db->getList($strQuerty);
            return $a;
        }
        public function getKh() {
            $db = new connect();
            $str = 'SELECT * FROM `user`';
            $a = $db->getList($str);
            return $a;
        }
        public function deleteKh($id){
            $db= new connect();
            $str = "DELETE FROM `user` WHERE id_user=".$id;
            $a = $db->exec($str);
            return $a;
        }


    }

?>