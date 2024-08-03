<div class="limiter">
    <div class="container-login100" style="background: #7fad39">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo BASE_URL; ?>/public/img/logo.png" alt="IMG">
            </div>

            <form action="<?php echo BASE_URL; ?>/Register/HandelRegister" class="login100-form validate-form"
                method="post">
                <span class="login100-form-title">
                    Đăng ký tài khoản
                </span>

                <input hidden type="text" name="email" placeholder="Email"
                    value="<?php echo htmlspecialchars($data["data"]) ?> ">

                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="full_name" placeholder="Họ tên">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="phone_number" placeholder="Số điện thoại">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                </div>


                <div class="wrap-input100 ">
                    <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 ">
                    <input class="input100" type="password" name="retype_password" placeholder="Nhập lại mật khẩu">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <input style="background: #7fad39" type="submit" class="login100-form-btn" name="btnRegister"
                        value="Đăng ký">
                </div>

                <div class="text-center p-t-12">
                    <a class="txt2" href="">
                        Bằng việc đăng ký, bạn đã đồng ý về Điều khoản dịch vụ & Chính sách bảo mật
                    </a>
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