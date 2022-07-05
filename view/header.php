        
                <!-- Main Slider Start -->
                <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-home"></i>Danh mục</a>
                                </li>
                                <?php 
                                    foreach ($dm as $danhmuc){
                                        extract($danhmuc);
                                        $linkdm = 'user.php?act=dm&id='.$id_category;
                                        echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="'.$linkdm.'"><i class="fa fa-plus-square"></i>'.$name_category.'</a>
                                            </li>
                                        ';
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                 <img src="../content/img/sl2.jpg" alt="Slider Image" style="height:400px;" /> 
                            </div>
                            <div class="header-slider-item">
                                <img src="../content/img/sl3.jpg" alt="Slider Image" style="height:400px;" />
                            </div>
                            <div class="header-slider-item">
                                <img src="../content/img/sl1.jpg" alt="Slider Image" style="height:400px;" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="../content/img/sl4.jpeg" />
                            </div>
                            <div class="img-item">
                                <img src="../content/img/sl5.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
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

        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Thanh Toán</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Giao hàng toàn quốc</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>Đổi trả 30 ngày</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Hỗ trợ 24/7</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="../content/img/qc4.jpeg" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="../content/img/category-4.jpg" />
                        </div>
                        <div class="category-item ch-150">
                            <img src="../content/img/qc5.jpeg" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="../content/img/category-6.jpg" />
                        </div>
                        <div class="category-item ch-250">
                        <img src="../content/img/son1.webp" style="height:250px;"/>                       
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="../content/img/category-8.jpg" />                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản phẩm nổi bật</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php 
                        foreach($sptc as $sanpham){
                            extract($sanpham);
                            $hinh='../upload/'.$img;      
                            $linksp='user.php?act=spct&id='.$id_products;
                    ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="<?php echo $linksp?>"><?php echo $name ?></a>
                            </div>
                            <div class="product-image">
                                <a href="<?php echo $linksp?>">
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
                                <h3><?php echo number_format("$price").""?> VND</h3>
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
                                    </form>
                                    ';
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản phẩm hot</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php 
                        foreach($top10 as $sanpham){
                            extract($sanpham);
                            $hinh='../upload/'.$img;      
                            $linksp='user.php?act=spct&id='.$id_products;
                    ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="<?php echo $linksp?>"><?php echo $name?></a>
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
                            <div class="product-price">
                                <h3><?php echo number_format("$price").""?> VND</h3>
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
                                    </form>
                                    ';
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        