<!DOCTYPE html>
<html lang="en">

<head>
    <title>dgsign.id Member Area</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/util_login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main_login.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <form class="login100-form validate-form flex-sb flex-w" action="../function_login.php" id="login" name="login" method="post">
                    <span class="login100-form-title p-b-32">
						dgsign.id Account Login
					</span>

                    <span class="txt1 p-b-11">
						Username
					</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
						Password
					</span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                        <span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
						Facing Camera
					</span>
                    <div >
                        <select class="form-control" id="facam" name="facam">
                        <option value="0">Facing Front</option>
                        <option value="1">Facing Back</option>

                        </select>
                    </div>

                    <div class="flex-sb-m w-full p-b-48">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
                        </div>

                        <div>
                            <a href="#" class="txt3">
								Forgot Password?
							</a>
                        </div>
                    </div>
                </form>

                <div class="container-login100-form-btn">
                    <button type="submit" id="login" name="loagin" form="login" class="login100-form-btn">
							Login
						</button>
                </div>


            </div>
        </div>
    </div>

</body>

</html>