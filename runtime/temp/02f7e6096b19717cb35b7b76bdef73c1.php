<?php /*a:2:{s:61:"D:\wamp\www\rhaphp-master\themes/pc/admin/appstore\index.html";i:1537234068;s:58:"D:\wamp\www\rhaphp-master\themes/pc/admin/common\base.html";i:1537234068;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <title>RhaPHP 二哈微信平台管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/public/static//admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/public/static//admin/css/admin_base.css" />
    <script type="text/javascript" src="/public/static//jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/public/static//layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/static//layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static//icon/icon.css" />
    
</head>
<body class="trade-order">
<div class="topbar" id="gotop">
    <div class="wrap">
        <ul>
            <li>你好，<a class="name" href="" id="username"><?php echo htmlentities($admin['admin_name']); ?></a>
                <?php if(!(empty($mpInfo) || (($mpInfo instanceof \think\Collection || $mpInfo instanceof \think\Paginator ) && $mpInfo->isEmpty()))): ?>
                <span class="quit">当前公众号：<a href="<?php echo url('mp/index/index',['mid'=>$mpInfo['id']]); ?>"><?php echo htmlentities($mpInfo['name']); ?></a><i style="font-size: 9px; margin-left: 5px;"><?php echo getMpType($mpInfo['type']); ?></i>
                    <?php if($mpInfo['valid_status'] == '1'): ?>
                    <i style="font-size: 9px; margin-left: 5px;">已接入</i>
                    <?php else: ?>
                    <i style="font-size: 9px; margin-left: 5px; color: red">未接入</i>
                    <?php endif; ?>
                </span>
                <a class="quit" href="<?php echo url('mp/index/mplist'); ?>">切换公众号</a>
                <a href="<?php echo url('mp/Message/messagelist'); ?>"><i class="layui-icon">&#xe645;</i>用户消息<span class="num-feed rhaphp-msg-user show" style="display: none;">0</span></a>
                <?php endif; ?>

                <a href="javascript:;" onclick="cacheClear()"><i class="layui-icon">&#xe640;</i>清空缓存</a>
                <a class="quit" href="<?php echo url('admin/Login/out'); ?>"><i class="rha-icon">&#xe696;</i>退出</a>
            </li>
        </ul>
    </div>
</div>
<div class="header">
    <div class="wrap">
        <div class="logo">
            <h1 class="main-logo"><a href="<?php echo url('mp/mp/index'); ?>">RhaPHP</a></h1>
            <div class="sub-logo"></div>
        </div>
        <div class="nav">
            <ul>
                <?php if(is_array($t_menu) || $t_menu instanceof \think\Collection || $t_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $t_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
                <li class="<?php if($topNode == $t['url']): ?>selected<?php endif; ?>"><a href="<?php echo url($t['url']); ?>"><?php echo htmlentities($t['name']); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="container_body wrap">
    <div class="sidebar">
        <div class="menu">
            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
            <dl>
                <dt><i class="type-ico ico-trade rha-icon <?php if($t['shows'] == '1'): endif; ?>"><?php echo $t['icon']; ?></i><?php echo htmlentities($t['name']); ?></dt>
                <?php if(is_array($t['child']) || $t['child'] instanceof \think\Collection || $t['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $t['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                <dd class="<?php if($c['shows'] == '1'): ?>selected<?php endif; ?>"><a href="<?php echo url($c['url']); ?>"><?php echo htmlentities($c['name']); ?></a></dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            
            <dl>
                <?php  if(!isset($menu_app))$menu_app=null; if($menu_app != ''): ?><dt><i class="type-ico ico-trade rha-icon">&#xe6f0;</i><?php echo htmlentities($menu_app_title); ?></dt><?php endif; if(is_array($menu_app) || $menu_app instanceof \think\Collection || $menu_app instanceof \think\Paginator): $i = 0; $__LIST__ = $menu_app;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <dd class=""><a href="<?php echo url('mp/App/index',['name'=>$v['addon'],'type'=>'news','mid'=>$mid]); ?>"><?php echo htmlentities($v['name']); ?></a></dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
        </div>
    </div>
    <div class="content" id="tradeSearchBd">
        <?php if(isset($menu_tile) OR $menu_title != ''): ?>
        <div class="content-hd">
            <h2><?php echo htmlentities($menu_title); ?></h2>
        </div>
        <?php endif; ?>
        
<style>
    .app_nav > * {
        font-size: 15px;
    }

</style>
<div style="padding:0px 10px;">
    <div class="layui-row">
        <div class="hreader">
            <form class="layui-form" action="">
                <div class="layui-col-md2">
                    <div class="layui-form-item">
                        <select name="type2" lay-filter="types" lay-verify="required">
                            <option <?php if($type==1): ?> selected <?php endif; ?> value="1">公众号</option>
                            <option <?php if($type==2): ?> selected <?php endif; ?> value="2">小程序</option>
                        </select>
                    </div>
                </div>
                <div class="layui-col-md4" style="margin-left: 5px;">
                    <div class="layui-form-item">
                        <input type="text" name="title" placeholder="请输入应用名称"
                               value="<?php echo htmlentities($title); ?>" class="layui-input">
                    </div>
                </div>
                <div class="layui-col-md1" style="margin-left: 5px;">
                    <button class="layui-btn layui-btn-primary" lay-submit lay-filter="formDemo">搜索应用</button>
                </div>
            </form>
            <div class="layui-row" style="background: #ffffff;">
                <div class="layui-col-md8">
                    <span id="apps-cate-lists" class="layui-breadcrumb app_nav" lay-separator="|">
                        <a href="<?php echo url('index',['type'=>$type,'cate'=>0]); ?>"><?php if($cate_id == 0): ?> <span class="cite">全部</span><?php else: ?>全部<?php endif; ?></a>
                        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                      <a href="<?php echo url('index',['type'=>$type,'cate'=>$v['cid']]); ?>">
                          <?php if($cate_id == $v['cid']): ?> <span class="cite"><?php echo htmlentities($v['cate_name']); ?></span><?php else: ?><?php echo htmlentities($v['cate_name']); endif; ?>
                          </a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                </div>
                <div class="layui-col-md4" id="account">
                    <?php if(!empty($user)): ?>
                    <span class="layui-breadcrumb" lay-separator="|">
                      <a><?php echo htmlentities($user['nickname']); ?></a>
                      <a><?php echo htmlentities($user['balance']); ?>元</a>
                      <a href="javascript:deposit();">充值</a>
                      <a href="<?php echo url('logout'); ?>">退出</a>
                    </span>
                    <?php else: ?>
                    <span class="layui-breadcrumb" lay-separator="|">
                      <a href="<?php echo url('register'); ?>">注册</a>
                      <a href="<?php echo url('login'); ?>">登录</a>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr>
        <div id="app-body">
            <div id="apps">
                <div class="layui-row">
                    <?php if(is_array($apps) || $apps instanceof \think\Collection || $apps instanceof \think\Paginator): $i = 0; $__LIST__ = $apps;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <div class="layui-col-md4 apps-volist" onclick="openAppWin('<?php echo htmlentities($v['id']); ?>','<?php echo htmlentities($v['title']); ?>')">
                            <div class="apps-volists">
                                <div class="apps-icon">
                                    <img src="<?php echo htmlentities($v['logo']); ?>">
                                </div>
                                <div class="app-desc">
                                    <h2><?php echo htmlentities($v['title']); ?>
                                    <span class="apps-money layui-badge layui-bg-blue">
                                        <?php if(($v['money']>0)): ?>
                                        <?php echo htmlentities($v['money']); else: ?>
                                        免费
                                        <?php endif; ?>
                                    </span>
                                    </h2>
                                    <div class="app-desc-body">
                                        <span>分类：<?php if($v['type'] ==1): ?>公众号<?php else: ?>小程序<?php endif; ?></span>
                                        <div class="description"><?php echo mb_substr($v['description'],0,16); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="layui-row">
                <div class="layui-col-md3 layui-col-md-offset9">
                    <div class="apps-page">
                        <a href="<?php echo url('index',['type'=>$type,'cate'=>$cate_id,'page'=>$page-1]); ?>" class="layui-btn layui-btn-sm">
                            <i class="layui-icon">&#xe603;</i>
                            上一页
                        </a>
                        <a href="<?php echo url('index',['type'=>$type,'cate'=>$cate_id,'page'=>$page+1]); ?>" class="layui-btn layui-btn-sm">
                            <i class="layui-icon">&#xe602;</i>
                            下一页
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<script>
    var layer;
    var form;
    layui.use(['layer','form'], function() {
         layer = layui.layer;
         form = layui.form;
        form.on('select(types)', function(data){
            window.location.href="<?php echo url('index','',''); ?>/type/"+data.value
        });
    })

    function openAppWin(id,title) {
        layer.open({
            type: 2,
            title:title,
            area: ['800px', '650px'],
            fixed: false,
            maxmin: true,
            content: "<?php echo url('appInfo','',''); ?>/id/"+id
        });
    }
    
    function redirect(type) {
        if(type==1){
            window.location.href="<?php echo url('admin/app/index',['type'=>'notinstall']); ?>";
        }else if(type==2){
            window.location.href="<?php echo url('admin/miniapp/index',['type'=>'notinstall']); ?>";
        }
    }
    
    function deposit() {
        layer.prompt({title: '请输入充值金额：', formType: 0}, function(money, index){
            layer.close(index);
            window.open("https://user.rhaphp.com/alipay/pay/token/<?php echo htmlentities($token); ?>/money/"+money);
        });
    }
</script>

    </div>
</div>
<div class="footer">
    <div class="wrap">
        <!--请遵守安装使用协议，未经允许不得删除或者屏蔽有关RhaPHP字样与版权-->
        <a href="https://www.rhaphp.com" target="_blank">官方社区</a>
        <i class="vs">|</i>
        Powered By RhaPHP<?php echo htmlentities($copy['version']); ?> 二哈系统 Copyright © <?php echo date('Y'); ?> All Rights Reserved.
    </div>
</div>
</body>
<script>
    layui.use('element', function(){
        var element = layui.element;
    });
    function getMaterial(paramName,type){
        layer.open({
            type: 2,
            title: '选择素材',
            shadeClose: true,
            shade: 0.8,
            area: ['750px', '480px'],
            content: '<?php echo url("mp/Material/getMeterial","",""); ?>/type/'+type+'/param/'+paramName //iframe的url
        });
    }
    function controllerByVal(value,paramName,type) {
        
        $('.form_'+paramName).attr('src',value);
        $("input[name="+paramName+"]").val(value);
    }
    $(function () {
       //  setInterval(getMsgTotal,20000);
        function getMsgTotal() {
            $.get("<?php echo url('mp/Message/getMsgStatusTotal'); ?>",{},function (res) {
                if(res.msgTotal==0){
                    //TODO
                }else{
                    $('.rhaphp-msg-user').show();
                    $('.rhaphp-msg-user').text(res.msgTotal);
                }

            })
        }
    })
    var layer
    layui.use('layer', function(){
        layer = layui.layer;
    });
    function cacheClear() {
        var index =layer.load(1)
        $.post("<?php echo url('admin/system/cacheClear'); ?>",function (res) {
            layer.close(index);
            layer.alert(res.msg);
        })

    }
</script>
</html>