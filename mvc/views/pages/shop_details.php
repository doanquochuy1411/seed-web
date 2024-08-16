<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo BASE_URL ?>/public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?php echo $product[0]['name'] ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo BASE_URL; ?>">Trang chủ</a>
                        <?php echo '<a href="' . BASE_URL . '/Shop/Categories/' . $product[0]['category_id'] . '">' . $product[0]['category_name'] . '</a>
                        <span>' . $product[0]['name'] . '</span>' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="<?php echo BASE_URL ?>/public/img/product/details/product-details-1.jpg" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="<?php echo BASE_URL ?>/public/img/product/details/product-details-2.jpg"
                            src="<?php echo BASE_URL ?>/public/img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="<?php echo BASE_URL ?>/public/img/product/details/product-details-3.jpg"
                            src="<?php echo BASE_URL ?>/public/img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="<?php echo BASE_URL ?>/public/img/product/details/product-details-5.jpg"
                            src="<?php echo BASE_URL ?>/public/img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="<?php echo BASE_URL ?>/public/img/product/details/product-details-4.jpg"
                            src="<?php echo BASE_URL ?>/public/img/product/details/thumb-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?php echo $product[0]['name'] ?></h3>
                    <div class="product__details__rating">
                        <?php
                        $totalRating = 0;
                        $totalReviews = count($review_list);
                        foreach ($review_list as $review) {
                            $totalRating += $review['rating'];
                        }

                        $avgRating = $totalReviews > 0 ? $totalRating / $totalReviews : 0;

                        for ($i = 1; $i <= 5; $i++) {
                            if ($avgRating >= $i) {
                                echo '<i class="fa fa-star"></i>  '; // Sao đầy
                            } elseif ($avgRating >= ($i - 0.5)) {
                                echo '<i class="fa fa-star-half-o"></i>  '; // Sao nửa
                            } else {
                                echo '<i class="fa fa-star-o"></i>  '; // Sao rỗng
                            }
                        }
                        ?>
                        <span>(<?php echo $totalReviews ?> đánh giá)</span>
                    </div>
                    <div class="product__details__price">
                        <?php echo number_format($product[0]['sale_price'], 0, '', '.') ?>đ
                    </div>
                    <p><?php echo $product[0]['description'] ?></p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Thêm vào giỏ hàng</a>
                    <ul>
                        <li><b>Kho</b> <span><?php echo $product[0]['stock_quantity'] ?> Sản phẩm</span></li>
                        <li><b>Giao hàng</b> <span>Trong vòng 3 ngày. </span>
                            <!-- Chỉ miễn phí giao hàng vào ngày 15 mỗi tháng -->
                            <?php $today = date('j');

                            $isFifteenth = ($today == 15);

                            echo ($isFifteenth) ? ' <br> <samp style="color: red;"> *** Miễn phí giao hàng trong hôm nay ***</samp>' : "";
                            ?>
                            </span>
                        </li>
                        <li><b>Chia sẻ</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">Thông
                                tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Đánh
                                giá <span><?php count($review_list) ?></span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p><?php echo $product[0]['description'] ?></p>
                                <p><?php echo $product[0]['information'] ?></p>
                            </div>
                        </div>

                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Đánh giá</h6>
                                <div class="review__list">
                                    <?php
                                    if (!empty($review_list)) {
                                        foreach ($review_list as $review) {
                                            echo '    
                                    <div class="user-review">
                                        <div class="review-item">
                                            <div class="review-header">
                                                <span class="user-name">' . $review['full_name'] . '</span>
                                                <span class="review-date">' . $review['created_at'] . '</span>
                                                <span class="rating">;';
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($review['rating'] >= $i) {
                                                    echo '<i class="fa fa-star"></i>  ';
                                                } elseif ($review['rating'] >= ($i - 0.5)) {
                                                    echo '<i class="fa fa-star-half-o"></i>  ';
                                                } else {
                                                    echo '<i class="fa fa-star-o"></i>  ';
                                                }
                                            }
                                            echo '</span>
                                            </div>
                                            <div class="review-content">
                                                <p>' . $review['comment'] . '</p>
                                                <div class="review-image">
                                                    <img src="' . BASE_URL . '/public/img/product/details/product-details-5.jpg" alt="Đánh giá của Người dùng A">
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($related_product)) {
                foreach ($related_product as $re_product) {
                    if ($product[0]['id'] != $re_product['id']) {
                        echo '<div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="' . BASE_URL . '/public/img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="' . BASE_URL . '/Shop/Products/' . $re_product["id"] . '">' . $re_product['name'] . '</a></h6>
                            <h5>' . number_format($re_product['sale_price'], 0, '', '.') . 'đ</h5>
                        </div>
                        </div>
                    </div>';
                    }
                }
            } else {
                echo '<p>Không tìm thấy sản phẩm liên quan.</p>';
            }
            ?>

        </div>
    </div>
</section>
<!-- Related Product Section End -->