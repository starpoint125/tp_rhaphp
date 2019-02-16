<?php /*a:3:{s:52:"D:\wamp\www\rhaphp-master\themes/pc/mp/app\view.html";i:1537234068;s:54:"D:\wamp\www\rhaphp-master\themes/pc/mp/.\app\base.html";i:1537234068;s:64:"D:\wamp\www\rhaphp-master\themes/pc/mp/..\admin\common\base.html";i:1537234068;}*/ ?>
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
    <dt><i class="type-ico ico-trade rha-icon">&#xe617;</i>应用配置</dt></dt>
    <dd class="<?php if($action_name == 'index'): ?>selected<?php endif; ?>"><a href="<?php echo url('mp/App/index',['name'=>$addonInfo['addon'],'type'=>'news']); ?>">入口配置</a></dd>
    <?php if(isset($addonInfo['config']) && !empty($addonInfo['config'])): endif; ?>
    <!--暂保留原判断-->
    <?php if($isShowConfigMenu == true): ?>
    <dd class="<?php if($action_name == 'config'): ?>selected<?php endif; ?>"><a href="<?php echo url('mp/App/config',['name'=>$addonInfo['addon']]); ?>">参数设置</a></dd>
    <?php endif; ?>
</dl>
<dl>
    <dt><i class="type-ico ico-trade rha-icon">&#xe670;</i>业务菜单</dt></dt>
    <div id="addon_menu" class="addon_menu-left-container">
        <div class="addon_menu-left">
            <ul class="addon_menu-left-nav">
                <?php if(is_array($addonMenu) || $addonMenu instanceof \think\Collection || $addonMenu instanceof \think\Paginator): $i = 0; $__LIST__ = $addonMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(isset($v['child']) && is_array($v['child'])): ?>
                <li class="addon_menu-left-nav-item addon_menu_parent <?php if($v['show'] =='1'): ?>on<?php endif; ?>">
                    <a class="addon_menu-left-nav-a" href="javascript:void(0);">
                        <i class="item-icon type-ico ico-trade rha-icon"  width="25px" height="25px"><?php echo $v['icon']; ?></i>
                        <span><?php echo htmlentities($v['name']); ?></span>
                        <span class="addon_menu-left-a-icon <?php if($v['show'] =='1'): ?>addon_menu_down<?php else: ?>addon_menu_up<?php endif; ?>"></span>
                    </a>
                    <ul class="child-item-nav" style="display: <?php if($v['show'] =='1'): ?>block<?php else: ?>none<?php endif; ?> ">
                        <?php if(is_array($v['child']) || $v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator): $k = 0; $__LIST__ = $v['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($k % 2 );++$k;?>
                        <li class="addon_menu-left-nav-item <?php if($node == $c['url']): ?>selected<?php endif; ?>">
                        <a class="addon_menu-left-nav-a" href="<?php echo url('mp/App/toview',['name'=>$addonInfo['addon'],'node'=>$c['url']]); ?>"><?php echo htmlentities($c['name']); ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <?php else: ?>
                <li class="addon_menu-left-nav-item addon_menu_parent <?php if($node == $v['url']): ?>selected<?php endif; ?>">
                <a class="addon_menu-left-nav-a" href="<?php echo url('mp/App/toview',['name'=>$addonInfo['addon'],'node'=>$v['url']]); ?>">
                    <i class="item-icon type-ico ico-trade rha-icon"  width="25px" height="25px"><?php echo $v['icon']; ?></i>
                    <span><?php echo htmlentities($v['name']); ?></span>
                </a>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</dl>
<script>
    $('#addon_menu').on('click','.addon_menu-left-nav-a',function(){

        if($(this).parents('.addon_menu-left-nav-item').hasClass('on')){
            $(this).parents('.addon_menu-left-nav-item').removeClass('on');
            $(this).parents('.addon_menu-left-nav-item').find('.addon_menu-left-a-icon').removeClass('addon_menu_down').addClass('addon_menu_up');
            $(this).siblings('.child-item-nav').hide();
        }else{
            $('.addon_menu-left-nav-item .addon_menu-left-a-icon').removeClass('addon_menu_down').addClass('addon_menu_up');
            $(this).parents('.addon_menu-left-nav-item').addClass('on').siblings('#addon_menu .addon_menu-left-nav-item ').removeClass('on');
            $(this).parents('.addon_menu-left-nav-item').find('.addon_menu-left-a-icon').addClass('addon_menu_down').removeClass('addon_menu_up');
            $('#addon_menu .addon_menu-left-nav-item .child-item-nav').hide();
            $(this).siblings('#addon_menu .addon_menu-left-nav-item .child-item-nav').show();
        }

    })
</script>


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
        <?php endif; if(isset($addonInfo['name']) OR $menu_title != ''): ?>
<div class="content-hd">
    <h2><img class="rhaphp-addon-admin-logo" src="<?php echo htmlentities($addonInfo['logo']); ?>"><?php echo htmlentities($addonInfo['name']); ?></h2>
</div>
<?php endif; if(isset($tips) && $tips != ''): ?>
<div class="rha-10">
    <blockquote  class="layui-elem-quote layui-text">
        <?php echo htmlentities($tips); ?>
    </blockquote>
</div>
<?php endif; ?>
<iframe id="iframe" onload="reinitIframe()" frameborder="no" border="0" width="100%"  marginwidth="0" marginheight="0"  allowtransparency="yes" src="<?php echo htmlentities($url); ?>"></iframe>
<script type="text/javascript">
    function reinitIframe(){
        var iframe = document.getElementById("iframe");
        var bodyHeight = $("#iframe").contents().find("body").height();
        if(bodyHeight<500) bodyHeight=500;
        iframe.height = bodyHeight+50;
    }
    window.setInterval("reinitIframe()", 1);
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