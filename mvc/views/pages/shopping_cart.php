<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo BASE_URL ?>/public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo BASE_URL; ?>">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo BASE_URL; ?>/Cart/HandleCart" method="post">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cartItems">
                                <?php
                                if (!empty($product_list)) {
                                    foreach ($product_list as $product) {
                                        echo '<tr>
                                <td class="shoping__cart__item">
                                    <img src="' . BASE_URL . '/public/img/cart/cart-1.jpg" alt="">
                                    <input type="text" name="product_id[]" value="' . $product['product_id'] . '" hidden>
                                    <h5><a href="' . BASE_URL . '/Shop/Products/' . $product["product_id"] . '" style="color: #000;">' . $product['product_name'] . '</a></h5>
                                    <br><span class="stock-product-quantity"> Kho: ' . $product["stock_quantity"] . '</span>
                                    </td>
                                <td class="shoping__cart__price" >
                                    ' . number_format($product['sale_price'], 0, '', '.') . 'đ
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="quantity[]" value="' . $product['quantity'] . '" data-product-id="' . $product['product_id'] . '">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    ' . number_format($product['sale_price'] * $product['quantity'], 0, '', '.') . 'đ
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close"></span>
                                </td>
                            </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="shoping__cart__btns">
                        <a href="<?php echo BASE_URL; ?>/Shop" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                        <button type="submit" name="btnUpdate" class="primary-btn cart-btn cart-btn-right"><span
                                class="icon_loading"></span>
                            Cập nhật giỏ hàng</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <!-- <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Áp dụng</button>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <ul>

                        <li>
                            <h5>Tổng đơn hàng</h5><span id="totalAmount">$454.98</span>
                        </li>
                    </ul>
                    <a href="<?php echo BASE_URL; ?>/Checkout" class="primary-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->