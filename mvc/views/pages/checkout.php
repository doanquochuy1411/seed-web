<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo BASE_URL; ?>/public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo BASE_URL ?>">Trang chủ</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin thanh toán</h4>
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Họ tên<span>*</span></p>
                                    <input type="text" placeholder="Họ tên" value="<?php echo $user_name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Số điện thoại<span>*</span></p>
                            <input type="text" placeholder="Số điện thoại" value="<?php echo $phone_number ?>">
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" placeholder="Địa chỉ" value="<?php echo $address ?>">
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú<span>*</span></p>
                            <input type="text" placeholder="Ghi chú cho đơn hàng của bạn">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Bạn đồng ý với các điều khoản của chúng tôi ?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label> <br>
                            <small id="DieuKhoan-mess"></small>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Hóa đơn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                            <ul>
                                <?php
                                $total = 0;
                                if (!empty($product_list)) {
                                    foreach ($product_list as $product) {
                                        echo '<li>' . $product["product_name"] . '<span>' . number_format($product['sale_price'] * $product['quantity'], 0, '', '.') . 'đ</span></li>';
                                        $total += ($product['sale_price'] * $product['quantity']);
                                    }
                                }
                                ?>
                            </ul>
                            <div class="checkout__order__total">Tổng tiền
                                <span><?php echo number_format($total, 0, '', '.') ?>đ</span></div>

                            <p>Vui lòng chọn phương thức thanh toán.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span> <br>
                                    <small id="PhuongThucThanhToan-mess"></small>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">THANH TOÁN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->