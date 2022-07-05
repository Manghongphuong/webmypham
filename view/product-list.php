
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <?php 
                            foreach($sptc as $sanpham){
                                extract($sanpham);
                                $hinh = "../upload/".$img;
                                $linksp='user.php?act=spct&id='.$id_products;
                            
                            ?>
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="<?=$linksp?>"><?=$name?></a>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="<?=$hinh?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><?php echo number_format("$price").""?></h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
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
                            <!-- <ul>
                                <li><a href="#">Nulla </a><span>(45)</span></li>
                            </ul> -->
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
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
        
