        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <?php 
                            extract($ctsp);
                            $hinh='../upload/'.$img;
                            ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="<?php echo $hinh ?>" alt="Product Image">
                                        <!-- <img src="../content/img/a2.png" alt="Product Image">
                                        <img src="../content/img/a3.jpg" alt="Product Image">
                                        <img src="../content/img/a4.jpg" alt="Product Image">                                        -->
                                    </div>
                                    <!-- <div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img src="../content/img/a1.png" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="../content/img/a2.png" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="../content/img/a3.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="../content/img/a4.jpg" alt="Product Image"></div>
                                    </div> -->
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?php echo $name ?></h2></div>
                                        <p>Thương hiệu:</p>
                                        <div class="price">
                                            <h4>Đơn giá:</h4>
                                            <p><?php echo number_format("$price").""?> VND</p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Số lượng:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <?php 
                                                echo '
                                                <form action="user.php?act=cart" method="post">
                                                    <input type="hidden"  name="id" value="'.$id_products.'">
                                                    <input type="hidden" name="tensp" value="'.$name.'">
                                                    <input type="hidden" name="img" value="'.$img.'">
                                                    <input type="hidden" name="gia" value="'.$price.'"> 
                                                    <a class="btn" href="" >
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <input type="submit" name="cart"  value="Thêm vào giỏ hàng">
                                                    </a>
                                                </form>';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Chi tiết</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Nội dung</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Bình luận</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <?php 
                                        extract($ctsp);
                                        echo "$detail";
                                        ?>
                                        
                                    </div>
                                    <!-- <div id="specification" class="container tab-pane fade">
                                        <h4>Nội dung sản phẩm</h4>
                                    </div> -->
                                    <div id="reviews" class="container tab-pane fade">
                                        <?php
                                            foreach ($listComment as $binhluan) {
                                                extract($binhluan);
                                                echo '<div class="reviews-submitted">
                                                            <div class="reviewer">'.$username.' - <span>'.$daycomment.'</span></div>
                                                            <p>'.$content.'</p>
                                                    </div>';
                                            }
                                        ?>
                                        <div class="reviews-submit">
                                            <h4>Viết bình luận:</h4>
                                            <form action="user.php?act=comment" method="post">
                                                <input type="hidden" name="idsp" value="<?=$id_products ?>">
                                                <div class="row form">
                                                    <div class="col-sm-12">
                                                        <textarea name="noidung" placeholder="Nhận xét"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                         <button name="guibinhluan">Gửi</button> 
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Sản Phẩm liên quan</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                <?php 
                                    foreach($sptc as $sanpham){
                                        extract($sanpham);
                                        $hinh='../upload/'.$img;      
                                        $linksp='user.php?act=spct&id='.$id_products;
                                    // Echo '<pre>';
                                    // Print_r($img);
                                    // Echo '</pre>';
                                ?>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="<?php echo $linksp?>"><?php echo $name ?></a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="<?php echo $hinh?>" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <style>
                                            .product-price .btn{
                                                background: #FF6F61;
                                                margin-top: -2pc;
                                                margin-left: 2px;
                                            }
                                            .product-item .product-price .btn input{
                                                background-color:#FF6F61;
                                                border: 0
                                            }
                                            .product-item .product-price .btn input:hover{
                                                color: #FF6F61;
                                                background: #ffffff;
                                            };
                                        </style>
                                        <div class="product-price">
                                            <h3><?php echo number_format("$price").""?></h3>
                                            <?php 
                                                echo '
                                                <form action="user.php?act=cart" method="post">
                                                    <input type="hidden"  name="id" value="'.$id_products.'">
                                                    <input type="hidden" name="tensp" value="'.$name.'">
                                                    <input type="hidden" name="img" value="'.$img.'">
                                                    <input type="hidden" name="gia" value="'.$price.'"> 
                                                    <a class="btn" href="" >
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <input type="submit" name="cart"  value="Mua">
                                                    </a>
                                                </form>';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Danh Mục</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <?php 
                                        foreach ($dm as $danhmuc){
                                            extract($danhmuc);
                                            $linkdm = 'user.php?act=dm&id='.$id_category;
                                            echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="'.$linkdm.'"><i class="fa fa-plus-square"></i>'.$name_category.'</a>
                                            </li>';
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                         
                        <div class="sidebar-widget brands">
                            <h2 class="title">Thương hiệu</h2>
                            <?php 
                                foreach($th as $thuonghieu){
                                    extract($thuonghieu);
                                    $linkth = "user.php?act=th&id=".$id_brand;
                                    echo '
                                    <ul>
                                        <li><a href="'.$linkth.'">'.$namebr.'</a></li>
                                    </ul>';
                                }
                            ?>
                        </div>
                        
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="../content/img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="../content/img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="../content/img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="../content/img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="../content/img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="../content/img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->