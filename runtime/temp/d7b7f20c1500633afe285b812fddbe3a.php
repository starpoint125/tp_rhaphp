<?php /*a:1:{s:59:"D:\wamp\www\rhaphp-master\themes/pc/admin/system\login.html";i:1537234068;}*/ ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>RhaPHP · 二哈微信平台管理系统</title>
    <link rel="stylesheet" type="text/css" href="/public/static//admin/css/admin_base.css" />
    <link rel="stylesheet" type="text/css" href="/public/static//layui/css/layui.css" />
    <script type="text/javascript" src="/public/static//jquery.js"></script>
    <script type="text/javascript" src="/public/static//layui/layui.js"></script>
</head>
<body class="login_body">
<div id="login_wrapper">
    <div class="rha_login">
        <div class="mod-body ">
            <div class="content">
                <h2>RhaPHP · 二哈微信平台管理系统</h2>
                <form class="layui-form" id="loginform">
                    <ul>
                        <li>
                            <input name="user_name" lay-verify="required" placeholder="请输入登录用户名" type="text"
                                   autocomplete="off" class="layui-input">
                        </li>
                        <li>
                            <input name="password" lay-verify="required" placeholder="请输入登录密码" type="password"
                                   autocomplete="off" class="layui-input">
                        </li>

                        <li>
                            <div class="layui-row">
                                <div class="layui-col-md5">
                                    <input name="verify" lay-verify="required" placeholder="请输入验证码" type="text"
                                           autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-col-md6" style="padding-left: 10px;">
                                    <img src="<?php echo url('verify'); ?>" onclick="this.src='<?php echo url('verify'); ?>?'+Math.random();">
                                </div>
                            </div>
                        </li>
                        <li class="alert alert-danger collapse error_message">
                            <i class="icon icon-delete"></i> <em></em>
                        </li>
                        <li class="last">
                            <div class="layui-input-inline login-btn">
                                <button type="submit" lay-submit="" lay-filter="login" class="layui-btn">登录</button>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="footer" style="position: fixed;bottom: 0;left: 0;right: 0;">
    <div class="wrap">
        <!--请遵守安装使用协议，未经允许不得删除或者屏蔽有关RhaPHP字样-->
        <a href="http://www.rhaphp.com" target="_blank">官方社区</a>
        <i class="vs">|</i>
        Powered By RhaPHP 二哈系统 Copyright © <?php echo date('Y'); ?> All Rights Reserved.
    </div>
</div>

<script>

    layui.use('form', function () {
        (function () {
            var isIE = function () {
                var U = navigator.userAgent,
                    IsIE = U.indexOf('MSIE') > -1,
                    a = IsIE ? /\d+/.exec(U.split(';')[1]) : 'no ie';
                return a <= 8;
            }();
            if (isIE) {
                layer.alert('你的浏览器内核版本过低,若有极速模式请选择使用极速模式或者使用谷歌、火狐浏览器。');
            }
        })();
        var form = layui.form;
        form.on('submit(login)', function (data) {
            $.post(
                "<?php echo url('Login/index'); ?>",
                data.field,
                function (obj) {
                    if (obj.code == 200) {
                        layer.msg(obj.msg, {icon: 1, time: 2000}, function () {
                            location.href = "<?php echo url('mp/Mp/index'); ?>";
                        });
                    } else {
                        layer.alert(obj.msg);
                    }
                },
                "json"
            );
            return false;
        });
    });
</script>
</body>
</html>
