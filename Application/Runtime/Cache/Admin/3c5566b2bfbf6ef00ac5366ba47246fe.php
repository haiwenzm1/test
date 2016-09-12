<?php if (!defined('THINK_PATH')) exit();?><html lang="cn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理系统</title>
    <link href="/Public/Framework/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Stylesheet/Admin/login.css" rel="stylesheet">
    <script src="/Public/Javascript/Public/jquery-1.10.2.min.js"></script>
    <script src="/Public/Framework/Bootstrap/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 login">
                <div class="panel panel-primary">
                    <div class="panel-heading">后台管理系统</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                                        <input type="text" class="form-control" name="username" placeholder="用户名" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
                                        <input type="password" class="form-control" name="passwd" placeholder="密码" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></div>
                                        <input type="text" class="form-control" name="vertifycode" placeholder="验证码" autocomplete="off">
                                        <div class="input-group-addon reloadverify">换一张</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <img class="verifyimg reloadverify col-lg-12 col-md-12 col-sm-12 col-xs-12" alt="点击切换" src="/index.php?s=/Admin/Index/verify.html"
                                    title="点击切换">
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-default btn-block">登录</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            //初始化选中用户名输入框
            $(".form-horizontal").find("input[name=username]").focus();
 
            //刷新验证码
            var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function() {
                if (verifyimg.indexOf('?') > 0) {
                    $(".verifyimg").attr("src", verifyimg + '&random=' + Math.random());
                } else {
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
                }
            });
        });
    </script>
</body>

</html>