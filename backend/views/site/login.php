
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="/assets/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/assets/inspinia/css/animate.css" rel="stylesheet">
    <link href="/assets/inspinia/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LX</h1>

            </div>
            <h3>后台管理系统</h3>
            <p>
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p></p>
            <form class="m-t" role="form" action="/site/login" method="post">
            	<input type="hidden" name="_csrf-backend" value="<?=Yii::$app->request->csrfToken?>" />
                <div class="form-group">
                    <input type="username" name="LoginForm[username]" class="form-control" placeholder="用户名" required="" >
                </div>
                <div class="form-group">
                    <input type="password" name="LoginForm[password]" class="form-control" placeholder="密码" required="">
                </div>
                <div class="form-group field-loginform-rememberme text-left">
					<div class="checkbox">
						<label for="loginform-rememberme">
							<input type="hidden" name="LoginForm[rememberMe]" value="0">
							<input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked>
							记住我
						</label>
						<p class="help-block help-block-error"></p>
					</div>
				</div>
                <button type="submit" class="btn btn-primary block full-width m-b">登录</button>

                
            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/assets/inspinia/js/jquery-3.1.1.min.js"></script>
    <script src="/assets/inspinia/js/bootstrap.min.js"></script>

</body>

</html>
