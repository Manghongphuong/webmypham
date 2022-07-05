<?php
    class tongquan{
        public function soluongdonhang(){
            $db = new connect();
            $str = "select count(*) as SoLuongdh from `orders`";
            $donhang=$db->getInstance( $str);
            return $donhang;
        }
        public function soluongloaihang(){
             $db = new connect();
             $str = "select count(*) as SoLuonglh from `category`";
             $loaihang=$db->getInstance($str);
             return $loaihang;
         }
        public function soluongsanpham(){
             $db = new connect();
             $str = "select count(*) as SoLuongsp from `products`";
             $sanpham=$db->getInstance($str);
             return $sanpham;
         }
        public function soluongkhachhang(){
             $db = new connect();
             $str = "select count(*) as SoLuongkh from `user`";
             $khachhang= $db->getInstance($str);
             return $khachhang;
         }
        public function thongke(){
            $db = new connect();
            $str="select category.id_category as malh, category.name_category as tenloaihang, count(products.id_products) as countsp, min(products.price) as minprice, max(products.price) as maxprice, avg(products.price) as avgprice";
            $str.=" from products left join category on category.id_category=products.category_id";
            $str.= " group by category.id_category order by category.id_category desc";
             $listthongke= $db->getList($str);
            //  var_dump( $listthongke);
             return $listthongke;
          }
    }

?>