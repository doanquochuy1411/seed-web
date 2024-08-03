<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo BASE_URL; ?>/public/img/logo.png" alt="IMG">
            </div>

            <form action="<?php echo BASE_URL; ?>/<?php echo $data["controller"] ?>/SendCode"
                class="login100-form validate-form" method="post">
                <span class="login100-form-title1">
                    <?php echo $data["title"] ?>
                </span>

                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="email" placeholder="Nhập email của bạn ">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="container-login100-form-btn1">
                    <input type="submit" name="btnSendCode" value="Tiếp theo" class="login100-form-btn">
                </div>
                <div class="text-center p-t-12">
                    <a class="txt2" href="http://localhost/seed-web/Login">
                        Bạn đã có tài khoản? Đăng nhập tại đây
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>