        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Đăng ký & đăng nhập</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                            <form action="user.php?act=account" method="post">
                                <div class="row">
                                   
                                    <div class="col-md-6">
                                        <label>Tên đăng nhập</label>
                                        <input class="form-control" name="tendn" type="text" placeholder="Tên đăng nhập">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Họ và tên</label>
                                        <input class="form-control" name="hoten" type="text" placeholder="Họ và tên">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Eamil</label>
                                        <input class="form-control" name="email" type="text" placeholder="Email">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" name="sdt" type="text" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Địa chỉ</label>
                                        <input class="form-control" name="diachi" type="text" placeholder="Địa chỉ">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mật khẩu</label>
                                        <input class="form-control" name="mk" type="password" placeholder="Nhập mật khẩu">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit"  class="btn" name="dangky" value="Đăng ký">
                                    </div>
                                </div>
                                <?php if(isset($thongbao)&&($thongbao!="")) echo $thongbao ?>
                            </form>
                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                            <form action="user.php?act=account" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tên đăng nhập</label>
                                        <input class="form-control" name="tendn" type="text" placeholder="Tên đăng nhập">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mật khẩu</label>
                                        <input class="form-control" name="mk" type="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="col-md-12">
                                    <input type="submit"  class="btn" name="dangnhap" value="Đăng nhập">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
