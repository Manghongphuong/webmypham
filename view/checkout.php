        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active">Thanh toán</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Checkout Start -->
        <div class="checkout">
            <form action="user.php?act=bill" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="checkout-inner">
                                <?php
                                // echo '<pre>';
                                // print_r($_SESSION['user']);
                                // echo '<pre>';
                                if (isset($_SESSION['user'])) {
                                    $hoten = $_SESSION['user'][0]['fullname'];
                                    $email = $_SESSION['user'][0]['email'];
                                    $phone = $_SESSION['user'][0]['phone'];
                                    $diachi = $_SESSION['user'][0]['address'];
                                } else {
                                    $hoten = "";
                                    $email = "";
                                    $phone = "";
                                    $diachi = "";
                                }
                                ?>
                                <div class="billing-address">
                                    <h2>Thông tin đặt hàng</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Họ và tên</label>
                                            <input class="form-control" type="text" name="fullname" placeholder="Họ và tên" value="<?php echo $hoten ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>E-mail</label>
                                            <input class="form-control" type="text" name="email" placeholder="E-mail" value="<?php echo $email ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Số điện thoại</label>
                                            <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $phone ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" type="text" name="address" placeholder="Địa chỉ" value="<?php echo $diachi ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Ghi chú</label>
                                            <input class="form-control" type="text" name="note" placeholder="Ghi chú">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout-inner">

                                <div class="checkout-summary">
                                    <h1>Tổng giỏ hàng</h1>
                                    <p>Tên sản phẩm</p>
                                    <?php
                                    $tong = 0;
                                    $tamtinh = 0;
                                    $i = 0;
                                    foreach ($_SESSION['cart'] as $cart) {
                                        $thanhtien = $cart[4] * $cart[3];
                                        $phi = 15000;
                                        $tamtinh += $thanhtien;
                                        $tong = $tamtinh + $phi;
                                    ?>
                                        <p><?php echo $cart[1] ?></p>
                                    <?php } ?>
                                    <p class="sub-total">Tổng phụ<span><?php echo number_format("$tamtinh") . "" ?> VND</span></p>
                                    <p class="ship-cost">Gía vận chuyển<span><?php echo number_format("$phi") . "" ?> VND</span></p>
                                    <h2>Tổng cộng<span><?php echo number_format("$tong") . "" ?> VND</span></h2>
                                </div>
                                <div class="checkout-payment">
                                    <div class="payment-methods">
                                        <h1>Phương thức thanh toán</h1>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="pttt" value="1" class="custom-control-input" id="payment-1" name="payment">
                                                <label class="custom-control-label" for="payment-1">Chuyển khoản trực tuyến</label>
                                            </div>
                                        </div>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="pttt" value="2" class="custom-control-input" id="payment-3" name="payment">
                                                <label class="custom-control-label" for="payment-3">Thanh toán khi nhận hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="pttt" value="3" class="custom-control-input" id="payment-5" name="payment">
                                                <label class="custom-control-label" for="payment-5">MoMo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-btn">
                                        <button type="submit" name="dathang" type="submit">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Checkout End -->