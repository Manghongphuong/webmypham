        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Hình</th>
                                            <th>Sản Phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $tong=0;
                                        $tamtinh=0;
                                        $i=0;
                                        foreach ($_SESSION['cart'] as $cart){
                                            $hinh = "../upload/".$cart[2];
                                            $thanhtien = $cart[4]*$cart[3];
                                            $phi=15000;
                                            $tamtinh+=$thanhtien;
                                            $tong=$tamtinh+$phi;
                                            $xoacart='user.php?act=delete_cart&id='.$i;
                                            // Echo '<pre>';
                                            // Print_r($_SESSION['cart']);
                                            // Echo '</pre>';

                                    ?>
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="<?php echo $hinh ?>" alt="Image"></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="img">
                                                    <p><?php echo $cart[1] ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo number_format("$cart[3]").""?></td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="<?=$cart[4]?>">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td><?php echo number_format("$thanhtien").""?></td>                                            
                                            <td>
                                                <a class="cart_quantity_delete" href="<?php echo ("$xoacart")?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                        $i+=1; 
                                        } 
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Tổng giỏ hàng</h1>
                                            <p>Tổng phụ<span><?php echo number_format("$tamtinh").""?> VND</span></p>
                                            <p>Gía vận chuyển<span><?php echo number_format("$phi").""?> VND</span></p>
                                            <h2>Tổng cổng<span><?php echo number_format("$tong").""?> VND</span></h2>
                                        </div>
                                        <div class=" cart-btn">
                                            <!-- <button>Cập nhật giỏ hàng</button>
                                            <button>Thủ tục thanh toán</button> -->
                                            <a href="user.php?act=checkout">
                                                <button>Thủ tục thanh toán</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->