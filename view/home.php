<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cosmetic</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="../img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../content/lib/slick/slick.css">
        <link rel="stylesheet" href="../content/lib/slick/slick-theme.css">

        <link href="../content/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        cosmetic@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +84 847384724
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="user.php" class="nav-item nav-link active">Trang chủ</a>
                            <a href="user.php?act=shop" class="nav-item nav-link">Shop</a>
                            <a href="user.php?act=cart" class="nav-item nav-link">Giỏ hàng</a>
                            <a href="user.php?act=checkout" class="nav-item nav-link">Thanh Toán</a>
                            <a href="user.php?act=news" class="nav-item nav-link">Tin Tức</a>
                            <a href="user.php?act=contact" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <?php 
                                if(isset($_SESSION['user'])){
                                    // echo '<pre>';
                                    // print_r($_SESSION['user']);
                                    // echo '<pre>';
                            ?>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['user'][0]['username']?></a>
                                    <div class="dropdown-menu">
                                        <?php if($_SESSION['user'][0]['role']==1){ ?>
                                            <a href="#" class="dropdown-item">Quản trị viên</a>
                                        <?php } ?>
                                            <a href="user.php?act=donhang" class="dropdown-item">Đơn hàng của tôi</a>
                                            <a href="user.php?act=dangxuat" class="dropdown-item">Đăng xuất</a>
                                    </div>
                                </div>
                            <?php } else{?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tài Khoản</a>
                                <div class="dropdown-menu">
                                    <a href="user.php?act=account" class="dropdown-item">Đăng Ký</a>
                                    <a href="user.php?act=account" class="dropdown-item">Đăng nhập</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <!-- <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Tìm kiếm">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="index.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="user.php?act=cart" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->       
        
