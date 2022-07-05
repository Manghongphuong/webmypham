<?php
    include '../model/connect.php';
    include '../model/thuonghieu.php';
    include '../model/danhmuc.php';
    include '../model/sanpham.php';
    include '../model/comment.php';
    include '../model/bill.php';
    include '../model/taikhoan.php';
    include '../model/tongquan.php';
    include '../admin/home.php';
    if(isset($_GET['act'])&&($_GET['act']!='')){
        $act=$_GET['act'];
        $t = new thuonghieu();
        $l = new danhmuc();
        $s = new sanpham();
        $bl = new binhluan();
        $hd = new hoadon();
        $kh = new taikhoan();
        $tq = new tongquan();
        $br = null;
        $dm = null;
        $sp = null;
        $hb = null;
        $donhang = null;
        switch ($act) {
            //thuonghieu
            case 'add_th':
                if(isset($_POST['gui'])&&($_POST['gui'])){
                    $thuonghieu = $_POST['name'];
                    $th = $t->addTH($thuonghieu);
                    $thongbao="Thêm thành công";
                }
                include '../admin/thuonghieu/themmoi.php';
                break;
            case 'ds_th':
                $th = $t->getTH();
                include '../admin/thuonghieu/danhsach.php';
                break;
            case 'xoath':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $th = $t->deleteTH($_GET['id']);
                }
                $th = $t->getTH();
                include '../admin/thuonghieu/danhsach.php';
                break;
            case 'suath':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $br = $t->getTHById($_GET['id']);
                }
                $th=$t->getTH();
                include '../admin/thuonghieu/capnhat.php';
                break;
            case 'capnhath':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $thuonghieu=$_POST['name'];
                    $id=$_POST['id'];
                    $th=$t->updateTH($id, $thuonghieu);
                    $thongbao = 'Cập nhật thành công';
                }
                $th = $t->getTH();
                include '../admin/thuonghieu/capnhat.php';
                break;
            //danhmuc
            case 'add_dm':
                if(isset($_POST['gui'])&&($_POST['gui'])){
                    $tenloai = $_POST['name'];
                    $r = $l->addDm($tenloai);
                    $thongbao="Thêm thành công";
                }
                include '../admin/danhmuc/themmoi.php';
                break;
            case 'ds_dm':
                $r = $l->getLoaidm();
                include '../admin/danhmuc/danhsach.php';
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $r = $l->deletedm($_GET['id']);
                }
                $r = $l->getLoaidm();
                include '../admin/danhmuc/danhsach.php';
                break;
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $dm = $l->getLoaidmById($_GET['id']);
                }
                $r = $l->getLoaidm();
                include '../admin/danhmuc/capnhat.php';
                break;
            case 'capnhatdm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['name'];
                    $id=$_POST['id'];
                    $r=$l->updatedm($id, $tenloai);
                    $thongbao = 'Cập nhật thành công';
                }
                $r = $l->getLoaidm();
                include '../admin/danhmuc/capnhat.php';
                break;
            //sanpham
            case 'add_sp':
                if(isset($_POST['gui'])&&($_POST['gui'])){
                    $iddm=$_POST['iddm'];
                    $idbr=$_POST['idbr'];
                    $tensp=$_POST['name'];
                    $gia=$_POST['gia'];
                    $soluong=$_POST['soluong'];
                    $ngaycn=$_POST['ngaynhap'];
                    $chitiet=$_POST['chitiet'];
                    
                    // var_dump($_FILES);

                    $img=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                      } else {
                    }
                    $p = $s->addSP($tensp,$gia,$img,$soluong,$chitiet,$ngaycn,$iddm,$idbr);  
                        if($p){
                            $p = $s->getSPnew();
                            $product_id = $p[0]['id_products'];
                            
                            $targetDir = "../upload/"; 
                            $allowTypes = array('jpg','png','jpeg','gif'); 
                        
                            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                            $fileNames = array_filter($_FILES['hinhs']['name']); 
                            if(!empty($fileNames)){ 
                                foreach($_FILES['hinhs']['name'] as $key=>$val){ 
                                    // File upload path 

                                    $fileName = basename($_FILES['hinhs']['name'][$key]); 
                                    $targetFilePath = $targetDir . $fileName; 
                                    
                                    // Check whether file type is valid 
                                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                                    if(in_array($fileType, $allowTypes)){ 
                                        // Upload file to server 
                                        if(move_uploaded_file($_FILES["hinhs"]["tmp_name"][$key], $targetFilePath)){ 
                                            // Image db insert sql
                                            // $products_id = $db->lastInsertId();
                                        
                                            $insertValuesSQL .= "('".$product_id."','".$fileName."', NOW()),"; 
                                        }else{ 
                                            $errorUpload .= $_FILES['hinhs']['name'][$key].' | '; 
                                        } 
                                    }else{ 
                                        $errorUploadType .= $_FILES['hinhs']['name'][$key].' | '; 
                                    } 
                                } 
                                
                                // Error message 
                                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                                
                                if(!empty($insertValuesSQL)){ 
                                    $insertValuesSQL = trim($insertValuesSQL, ','); 
                                    // Insert image file name into database 
                                    $db = new connect();
                                    $insert = $insert = "INSERT INTO images (products_id,file_name, uploaded_on) VALUES $insertValuesSQL"; 
                                    $i = $db->exec($insert);
                                    if($insert){ 
                                        $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                                    }else{ 
                                        $statusMsg = "Sorry, there was an error uploading your file."; 
                                    } 
                                }else{ 
                                    $statusMsg = "Upload failed! ".$errorMsg; 
                                } 
                            }else{ 
                                $statusMsg = 'Please select a file to upload.'; 
                            }
                        }                           
                        $thongbao="Thêm thành công";
                }
                    
                $r = $l->getLoaidm();  
                $th = $t->getTH(); 
                include '../admin/sanpham/themmoi.php';
                break;
            case 'ds_sp':
                $p = $s->getSP();
                include '../admin/sanpham/danhsach.php';
                break;
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $p = $s->deleteSP($_GET['id']);
                }
                $p = $s->getSP();
                include '../admin/sanpham/danhsach.php';
                break;
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sp = $s->getSPById($_GET['id']);
                    $str = $s->getImg($_GET['id']);
                }
                $p = $s-> getSP();
                include '../admin/sanpham/capnhat.php';
                break;
            case 'capnhatsp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $iddm=$_POST['iddm'];
                    $idbr=$_POST['idbr'];
                    $tensp=$_POST['name'];
                    $gia=$_POST['gia'];
                    $soluong=$_POST['soluong'];
                    $ngaycn=$_POST['ngaynhap'];
                    $chitiet=$_POST['chitiet'];
                    $img=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                      } else {
                      }
                    $p = $s->updateSP($id,$tensp,$gia,$img,$soluong,$chitiet,$ngaycn,$iddm,$idbr);                    

                    if($p){
                        $p = $s->getSPnew();
                        $product_id = $p[0]['id_products'];
                        
                        $targetDir = "../upload/"; 
                        $allowTypes = array('jpg','png','jpeg','gif'); 
                    
                        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                        $fileNames = array_filter($_FILES['hinhs']['name']); 
                        if(!empty($fileNames)){ 
                            foreach($_FILES['hinhs']['name'] as $key=>$val){ 
                                // File upload path 

                                $fileName = basename($_FILES['hinhs']['name'][$key]); 
                                $targetFilePath = $targetDir . $fileName; 
                                
                                // Check whether file type is valid 
                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                                if(in_array($fileType, $allowTypes)){ 
                                    // Upload file to server 
                                    if(move_uploaded_file($_FILES["hinhs"]["tmp_name"][$key], $targetFilePath)){ 
                                        // Image db insert sql
                                        // $products_id = $db->lastInsertId();
                                    
                                        $insertValuesSQL .= "('".$product_id."','".$fileName."', NOW()),"; 
                                    }else{ 
                                        $errorUpload .= $_FILES['hinhs']['name'][$key].' | '; 
                                    } 
                                }else{ 
                                    $errorUploadType .= $_FILES['hinhs']['name'][$key].' | '; 
                                } 
                            } 
                            
                            // Error message 
                            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                            
                            if(!empty($insertValuesSQL)){ 
                                $insertValuesSQL = trim($insertValuesSQL, ','); 
                                // Insert image file name into database 
                                $db = new connect();
                                $insert = $insert = "INSERT INTO images (products_id,file_name, uploaded_on) VALUES $insertValuesSQL"; 
                                $i = $db->exec($insert);
                                if($insert){ 
                                    $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                                }else{ 
                                    $statusMsg = "Sorry, there was an error uploading your file."; 
                                } 
                            }else{ 
                                $statusMsg = "Upload failed! ".$errorMsg; 
                            } 
                        }else{ 
                            $statusMsg = 'Please select a file to upload.'; 
                        }
                    }                           

                    $thongbao="Cập nhật thành công";
                }
                $r = $l->getLoaidm();  
                $th = $t->getTH();
                $p = $s->getSP('',0);
                include '../admin/sanpham/capnhat.php';
                break;
            //taikhoan
            case 'dk_tk':
                include '../admin/taikhoan/dk.php';
                break;
            case 'dn_tk':
                include '../admin/taikhoan/dn.php';
                break;
            //khachhang
            case 'user':
                $listkh = $kh->getKh();
                extract($listkh);
                include '../admin/khachhang/khachhang.php';
                break;
            case 'xoatk':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $listkh = $kh->deleteKh($_GET['id']);
                }
                $listkh = $kh->getKh();
                include '../admin/khachhang/khachhang.php';
                break;
            //binhluan
            case 'ds_bl':
                $listbl = $bl->getListbl();
                extract($listbl);
                include '../admin/binhluan/danhsach.php';
                break;
            case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $listbl = $bl->deletebl($_GET['id']);
                }
                $listbl = $bl-> getListbl();
                include '../admin/binhluan/danhsach.php';
                break;
            //donhang
            case 'ds_dh':
                $listbills = $hd->getbill();
                extract($listbills);
                include '../admin/donhang/danhsach.php';
                break;
            case 'xoahd':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $listbills = $hd->deleteHd($_GET['id']);
                }
                $listbills = $hd->getbill();
                include '../admin/donhang/danhsach.php';
                break;
            case 'suahd':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $hb = $hd->getBillID($_GET['id']);
                }
                $h = $hd-> getbill();
                include '../admin/donhang/capnhat.php';
                break;
            case 'cnhd':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $fullname = $_POST['kh'];
                    $orders_day = $_POST['ngaydat'];
                    $delivery_day = $_POST['ngaygiao'];
                    $total_money = $_POST['thanhtien'];
                    $note = $_POST['ghichu'];
                    $address = $_POST['noigiao'];
                    $pttt = $_POST['phuongthuc'];
                    $status = $_POST['trangthai'];
                    $h = $hd->updateHd($id,$fullname,$address,$note,$orders_day,$delivery_day,$pttt,$status,$total_money);
                    $thongbao = 'Cập nhật thành công';
                }

                include '../admin/donhang/capnhat.php';
                break;
            //tongquan
            case 'tongquan':
                $donhang = $tq->soluongdonhang();
                extract($donhang);
                $loaihang = $tq->soluongloaihang();
                extract($loaihang);
                $sanpham = $tq->soluongsanpham();
                extract($sanpham);
                $khachhang = $tq->soluongkhachhang();
                extract($khachhang);
                $listthongke = $tq->thongke();
                extract($listthongke);
                include '../admin/tongquan/thongke.php';
                break;
            //tintuc
            case 'baiviet':
                include '../admin/tintuc/baiviet.php';
                break;
            case 'dangbai':
                include '../admin/tintuc/dangbai.php';
                break;
            //lienhe
            case 'phanhoi':
                include '../admin/lienhe/phanhoi.php';
                break;
            default:
                include '../admin/header.php';
                break;
        }
    }
    else {
        include '../admin/header.php';
     }
    include '../admin/footer.php';

?>