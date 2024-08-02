<div class="limiter">
    <div class="container-login100" style="background: #7fad39">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <a href="../index.php">
                    <img src="../img/logo.png" alt="IMG">
                </a>
            </div>

            <form class="login100-form validate-form" method="post">
                <span class="login100-form-title">
                    Đăng nhập
                </span>

                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="user" value="<?php echo $hoTenDefault; ?>"
                        placeholder="Số điện thoại">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 ">
                    <input class="input100" type="password" name="pass" value="<?php echo $soDienThoaiDefault; ?>"
                        placeholder="Mật khẩu">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <?php
                    if (isset($txt) && ($txt != "")) {
                        echo "<div style='color: red; text-align: center;'>$txt</div>";
                    }
                    ?>
                <div class="container-login100-form-btn">
                    <input type="submit" style="background: #7fad39" class=" login100-form-btn" name="submit"
                        value="Đăng nhập">
                </div>

                <div class="text-center p-t-12">
                    <a class="txt2" href="./quenmatkhau.php">
                        Quên mật khẩu
                    </a>
                </div>

                <div class="text-center p-t-12">
                    <a class="txt2" href="../view/logincode.php">
                        Bạn chưa có tài khoản? Đăng ký tại đây
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>