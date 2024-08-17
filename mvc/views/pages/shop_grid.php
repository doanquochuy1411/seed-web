<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo BASE_URL; ?>/public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo BASE_URL; ?>">Trang chủ</a>
                        <span><?php echo $title ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            <li><a href="<?php echo BASE_URL ?>/Shop/">Tất cả</a></li>
                            <?php
                            if (!empty($category_list)) {
                                foreach ($category_list as $category) {
                                    echo '<li><a href="' . BASE_URL . '/Shop/Categories/' . $category["id"] . '">' . $category["name"] . '</a></li>';
                                }
                            } else {
                                echo '<p>Không tìm thấy danh mục.</p>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    if (!empty($product_at_least)) {
                                        foreach ($product_at_least as $product) {
                                            echo '<a href="' . BASE_URL . '/Shop/Products/' . $product["id"] . '" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="' . BASE_URL . '/public/img/latest-product/lp-1.jpg"
                                        alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>' . $product['name'] . '</h6>
                                        <span>' . number_format($product['sale_price'], 0, '', '.') . 'đ</span>
                                    </div>
                                    </a>';
                                        }
                                    } else {
                                        echo '<p>Không tìm thấy sản phẩm.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Giảm sốc</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php
                            if (!empty($product_list)) {
                                foreach ($product_list as $product) {
                                    echo '<div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="' . BASE_URL . '/public/img/product/discount/pd-2.jpg">
                            <div class="product__discount__percent">-20%</div>
                            <ul class="product__item__pic__hover">
                <li><a href="' . BASE_URL . '/Cart/AddToCart/' . $product["id"] . '/1"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__discount__item__text">
                            <span>"' . $product['category_name'] . '"</span>
                            <h5><a href="' . BASE_URL . '/Shop/Products/' . $product["id"] . '">' . $product['name'] . '</a></h5>
                            <div class="product__item__price">' . number_format($product['sale_price'], 0, '', '.') . 'đ <span>' . number_format($product['sale_price'], 0, '', '.') . 'đ</span></div>
                        </div>
                    </div>
                </div>';
                                }
                            } else {
                                echo '<p>Không tìm thấy sản phẩm.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sắp xếp</span>
                                <select>
                                    <option value="0">Mặc định</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span><?php echo count($product) ?></span> sản phẩm</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (!empty($product_list)) {
                        foreach ($product_list as $product) {
                            echo '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="' . BASE_URL . '/public/img/product/product-2.jpg">
                        <ul class="product__item__pic__hover">
                                        <li><a href="' . BASE_URL . '/Cart/AddToCart/' . $product["id"] . '/1"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="' . BASE_URL . '/Shop/Products/' . $product["id"] . '">' . $product['name'] . '</a></h6>
                        <h5>' . number_format($product['sale_price'], 0, '', '.') . 'đ</h5>
                    </div>
                </div>
            </div>';
                        }
                    } else {
                        echo '<p>Không tìm thấy sản phẩm.</p>';
                    }
                    ?>
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->