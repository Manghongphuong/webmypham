<?php
    session_start();
    include '../model/connect.php';
    include '../model/comment.php';
    $bl = new binhluan();
    $sanpham=$_REQUEST['idsp'];
    $dsbl = $bl->getbinhluan($sanpham);
 ?>

        <?php
            //   Echo '<pre>';
            //  Print_r($dsbl);
            //   Echo '</pre>';
            foreach ($dsbl as $binhluan) {
                extract($binhluan);
                echo '<div class="reviews-submitted">
                            <div class="reviewer">'.$user_id.' - <span>'.$daycomment.'</span></div>
                            <p>'.$content.'</p>
                    </div>';
            }
        ?>
        <div class="reviews-submit">
            <h4>Viết bình luận:</h4>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idsp" value="<?=$product_id ?>">
                <div class="row form">
                    <div class="col-sm-12">
                        <textarea name="noidung" placeholder="Nhận xét"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <!-- <button name="guibinhluan">Gửi</button> -->
                        <input type="submit" name="guibinhluan" value="Gửi">
                    </div>
                </div>
            </form>
        </div>
        <?php
         if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $noidung=$_POST['noidung'];
            $sanpham=$_POST['idsp'];
            $taikhoan=$_SESSION['user']['username'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaybl=date('h:i:sa d/m/y');
            insert_binhluan($taikhoan,$sanpham,$noidung,$ngaybl);
            header("location:".$_SERVER['HTTP_REFERER']);
        }
        
         ?>