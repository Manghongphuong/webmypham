
<?php
session_start();
include '../model/connect.php';
include '../model/thuonghieu.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include '../model/taikhoan.php';
include '../model/comment.php';
include '../model/bill.php';
include '../view/home.php';
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$t = new thuonghieu();
$l = new danhmuc();
$s = new sanpham();
$tk = new taikhoan();
$bl = new binhluan();
$hd = new hoadon();
$dm = $l->getLoaidm();
$th = $t->getTH();
$sptc = $s->getSP_home();
$top10 = $s->getSP_home_top10();

if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
            //taikhoan
        case 'account':
            //dangky
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $tendn = $_POST['tendn'];
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $phone = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $mk = $_POST['mk'];
                $a = $tk->insert_taikhoan($tendn, $hoten, $email, $phone, $diachi, $mk);
                // var_dump($a);
                $thongbao = 'Đăng ký thành công';
                include '../view/account.php';
            } else {
                include '../view/account.php';
            }

            //dangnhap
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $tendn = $_POST['tendn'];
                $mk = $_POST['mk'];
                $checkuser = $tk->checkuser($tendn, $mk);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    echo '<script>window.location="user.php"</script>';
                } else {
                    echo " Tài khoản không chính xác vui lòng kiểm tra hoặc đăng ký tài khoản ";
                }
            }
            break;
        case 'dangxuat':
            session_destroy();
            echo '<script>window.location="user.php"</script>';
            break;
            //danhmuc
        case 'danhmuc':
            include '../view/header.php';
            break;
            //sanpham
        case 'spct':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $ctsp = $s->getSPById($id);
                extract($ctsp);
                $listComment = $bl->getbinhluan($id);
                extract($listComment);
                include '../view/product-detail.php';
            } else {
                include '../view/product-detail.php';
            }
            break;
        case 'comment':       
            //binhluan
            if (isset($_POST['guibinhluan'])) {
                 $noidung = $_POST['noidung'];
                 $sanpham = $_POST['idsp'];
                 $username = $_SESSION['user'][0]['username'];
                 $id_user = $_SESSION['user'][0]['id_user'];
                 date_default_timezone_set('Asia/Ho_Chi_Minh');
                 $ngaybl = date('Y/m/d h:i:sa');
                 $b = $bl->insert_binhluan($username, $id_user, $sanpham, $noidung, $ngaybl);
                 echo '<script>window.location="user.php?act=spct&id='.$sanpham.'"</script>';
             }
            break;
        case 'shop':
            include '../view/product-list.php';
            break;
        case 'cart':
            $tamtinh = 0;
            $tong = 0;
            $phi = 0;
            if (isset($_POST['cart']) && ($_POST['cart'])) {
                $id = $_POST['id'];
                $name = $_POST['tensp'];
                $img = $_POST['img'];
                $price = $_POST['gia'];
                $num = 1;
                $thanhtien = $num * $price;
                $tamtinh += $thanhtien;
                $giohang = [$id, $name, $img, $price, $num, $thanhtien, $tamtinh];
                array_push($_SESSION['cart'], $giohang);
            }
            include '../view/cart.php';
            break;
        case 'delete_cart':
            if (isset($_GET['id'])) {
                array_splice($_SESSION['cart'], $_GET['id'], 1);
            } else {
                $_SESSION['cart'] = [];
            }
            echo '<script>window.location="user.php?act=cart"</script>';
            break;
        case 'checkout':
            $tamtinh = 0;
            $tong = 0;
            $phi = 0;
            include '../view/checkout.php';
            break;
        case 'bill':
            if (isset($_POST['dathang'])) {
                    if(isset($_SESSION['user'])) 
                    $user_id=$_SESSION['user'][0]['id_user'];
                    else $id=0;
                   $fullname=$_POST['fullname'];
                   $email=$_POST['email'];
                   $phone=$_POST['phone'];
                   $address=$_POST['address'];
                   $note=$_POST['note']; 
                   date_default_timezone_set('Asia/Ho_Chi_Minh');
                   $orders_day=date('Y/m/d');
                   $pttt = $_POST['pttt'];
                //    Khởi tạo đối tượng Hóa Đơn và lấy giá trị của tổng bill
                   $hoaDon = new hoadon();
                   $total_money = $hoaDon->tonghoadon();
                   $handleInputOrder = $hoaDon->insert_bill($user_id,$fullname,$email,$phone,$address,$note,$orders_day,$pttt,$total_money);
                   $handleInputOrder = $hoaDon->getctbill();
                   $id = $handleInputOrder[0][0];
                //    var_dump($id);
                // echo '<pre>';
                // print_r($handleInputOrder);
                   foreach ($_SESSION['cart'] as $cartbill){
                        $str=$hoaDon->insert_ctbill($_SESSION['user'][0]['id_user'],$id,$cartbill[0],$cartbill[1],$cartbill[2],$cartbill[3],$cartbill[4],$cartbill[5]);                     
                    }
                    if ($handleInputOrder) {
                        $_SESSION['cart']=[];
                        include '../view/hoadon.php';
                       } else {
                        echo "Thanh toán không thành công!";
                       } 
            }
            
            break;
        case 'donhang':
            $h=$hd->getbill($_SESSION['user'][0]['id_user']);
            include '../view/ctdh.php';
            break;
        case 'contact':
            include '../view/contact.php';
            break;
        case 'news':
            include '../view/news.php';
            break;
        default:
            include '../view/header.php';
            break;
    }
} else {
    include '../view/header.php';
}
include '../view/footer.php';
?>