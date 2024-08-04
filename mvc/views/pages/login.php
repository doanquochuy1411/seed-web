<div class="limiter">
    <div class="container-login100" style="background: #7fad39">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <a href="<?php echo BASE_URL; ?>">
                    <img src="<?php echo BASE_URL; ?>/public/img/logo.png" alt="IMG">
                </a>
            </div>

            <form action="<?php echo BASE_URL; ?>/Login/HandelLogin" class="login100-form validate-form" method="post">
                <span class="login100-form-title">
                    Đăng nhập
                </span>

                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="email"
                        value="<?php echo isset($data[0]) ? $data[0] : '' ?>" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 ">
                    <input class="input100" type="password" name="password"
                        value="<?php echo isset($data[1]) ? $data[1] : '' ?>" placeholder="Mật khẩu">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="container-login100-form-btn">
                    <input type="submit" style="background: #7fad39" class=" login100-form-btn" name="btnLogin"
                        value="Đăng nhập">
                </div>

                <div class="text-center p-t-12">
                    <a class="txt2" href="<?php echo BASE_URL; ?>/Reset">
                        Quên mật khẩu
                    </a>
                </div>

                <div class="text-center p-t-12">
                    <a class="txt2" href="<?php echo BASE_URL; ?>/Register">
                        Bạn chưa có tài khoản? Đăng ký tại đây
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>