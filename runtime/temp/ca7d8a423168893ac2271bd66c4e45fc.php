<?php /*a:3:{s:54:"D:\wamp\www\rhaphp-master\themes/pc/mp/app\config.html";i:1537234068;s:54:"D:\wamp\www\rhaphp-master\themes/pc/mp/.\app\base.html";i:1537234068;s:64:"D:\wamp\www\rhaphp-master\themes/pc/mp/..\admin\common\base.html";i:1537234068;}*/ ?>
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
<form class="layui-form" action="" style="padding: 0px 10px 0px 10px;">
    <div class="layui-tab">
        <ul class="layui-tab-title ">
            <li class="layui-this">参数设置</li>
        </ul>
        <div class="layui-tab-content">
            <br>
            <div class="layui-tab-item layui-show">
                <?php if(is_array($config) || $config instanceof \think\Collection || $config instanceof \think\Paginator): $key1 = 0; $__LIST__ = $config;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($key1 % 2 );++$key1;switch($v['type']): case "text": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                                <div class="layui-input-block">
                                    <input name="<?php echo htmlentities($v['name']); ?>" autocomplete="off" placeholder="<?php echo htmlentities($v['placeholder']); ?>" value="<?php echo htmlentities($v['value']); ?>" class="layui-input" type="text">
                                    <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                                </div>
                            </div>
                        <?php break; case "password": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                                <div class="layui-input-block">
                                    <input name="<?php echo htmlentities($v['name']); ?>" autocomplete="off" placeholder="<?php echo htmlentities($v['placeholder']); ?>" value="<?php echo htmlentities($v['value']); ?>" class="layui-input" type="password">
                                    <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                                </div>
                            </div>
                        <?php break; case "date": ?>
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                                    <div class="layui-input-inline">
                                        <input name="<?php echo htmlentities($v['name']); ?>" class="layui-input" id="<?php echo htmlentities($v['name']); ?>" placeholder="yyyy-MM-dd HH:mm:ss" value="<?php echo htmlentities($v['value']); ?>" type="text">
                                        <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <script>
                                layui.use(['laydate'], function(){
                                    laydate = layui.laydate;
                                    laydate.render({
                                        elem: '#<?php echo htmlentities($v['name']); ?>'
                                        ,type: 'datetime'
                                    });
                                });
                            </script>
                        <?php break; case "radio": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                                <div class="layui-input-block">
                                    <?php if(is_array($v['value']) || $v['value'] instanceof \think\Collection || $v['value'] instanceof \think\Paginator): $k = 0; $__LIST__ = $v['value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rd): $mod = ($k % 2 );++$k;?>
                                    <input type="radio" name="<?php echo htmlentities($v['name']); ?>" value="<?php echo htmlentities($rd['value']); ?>" <?php if($rd['checked'] == '1'): ?>checked<?php endif; ?>  title="<?php echo htmlentities($rd['title']); ?>">
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                                </div>
                            </div>
                        <?php break; case "select": ?>
                <div class="layui-form-item">
                    <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                    <div class="layui-input-block">
                        <select name="<?php echo htmlentities($v['name']); ?>">
                            <?php if(is_array($v['value']) || $v['value'] instanceof \think\Collection || $v['value'] instanceof \think\Paginator): $k = 0; $__LIST__ = $v['value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rd): $mod = ($k % 2 );++$k;?>
                            <option value="<?php echo htmlentities($rd['value']); ?>" <?php if(isset($rd['selected'])): if($rd['selected'] == '1'): ?>selected<?php endif; endif; ?>><?php echo htmlentities($rd['title']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                    </div>
                </div>
                <?php break; case "checkbox": ?>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                                <div class="layui-input-block">
                                    <?php if(is_array($v['value']) || $v['value'] instanceof \think\Collection || $v['value'] instanceof \think\Paginator): $k = 0; $__LIST__ = $v['value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rd): $mod = ($k % 2 );++$k;?>
                                    <input name="<?php echo htmlentities($v['name']); ?>[<?php echo htmlentities($rd['name']); ?>]" value="<?php echo htmlentities($rd['value']); ?>" lay-skin="primary" title="<?php echo htmlentities($rd['title']); ?>" <?php if($rd['checked'] == '1'): ?>checked<?php endif; ?> type="checkbox">
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                                </div>
                            </div>
                <?php break; case "textarea": ?>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                                <div class="layui-input-block">
                                    <textarea name="<?php echo htmlentities($v['name']); ?>" placeholder="<?php echo htmlentities($v['placeholder']); ?>" class="layui-textarea"><?php echo _trim($v['value']); ?></textarea>
                                    <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                                </div>

                            </div>
                        <?php break; case "file": ?>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                    <div class="layui-input-block">
                        <?php echo hook('Upload',['type'=>'file','name'=>$v['name'],'bt_title'=>'选择文件','value'=>$v['value']]); ?>
                        <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                    </div>

                </div>
                <?php break; case "image": ?>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                    <div class="layui-input-block">
                        <?php echo hook('Upload',['type'=>'image','name'=>$v['name'],'material'=>true,'value'=>$v['value']]); ?>
                        <div class="rhaphp-upload-image">
                            <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                        </div>
                    </div>

                </div>
                <?php break; case "images": ?>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
                    <div class="layui-input-block">
                        <?php echo hook('Upload',['type'=>'images','name'=>$v['name'],'material'=>true,'value'=>$v['value']]); ?>
                        <div class="rhaphp-upload-image">
                            <p class="tip_for_p"><?php echo htmlentities($v['tip']); ?></p>
                        </div>
                    </div>

                </div>
                <?php break; endswitch; endforeach; endif; else: echo "" ;endif; if(!(empty($themes) || (($themes instanceof \think\Collection || $themes instanceof \think\Paginator ) && $themes->isEmpty()))): ?>
                <div class="layui-form-item">
                    <label class="layui-form-label">模板主题</label>
                    <div class="layui-input-block">
                        <select name="theme">
                            <?php if(is_array($themes) || $themes instanceof \think\Collection || $themes instanceof \think\Paginator): $k = 0; $__LIST__ = $themes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($k % 2 );++$k;?>
                            <option value="<?php echo htmlentities($m); ?>" <?php if($selected == $m): ?>selected<?php endif; ?>><?php echo htmlentities($m); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <p class="tip_for_p">小提示：系统会自动获取view下的目录作为主题名称</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input hidden name="addonName" value="<?php echo htmlentities($addonInfo['addon']); ?>">
            <button class="layui-btn" lay-submit="" lay-filter="ADDC">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;
        var editIndex = layedit.build('LAY_demo_editor');
        laydate.render({
            elem: '#rha-date'
            ,type: 'datetime'
        });
        form.on('submit(ADDC)', function(data){
            var index = layer.load(1);
            $.post('',data.field,function (res) {
                if(res.status=='0'){
                    layer.msg(res.msg);
                }
                if(res.status=='1'){
                    layer.msg(res.msg,{time:1000},function () {
                        // location.href="<?php echo url('System/menuList'); ?>";
                    });

                }
                layer.close(index)
            })
            return false;
        });
    });
    layui.use('element', function(){
        var element = layui.element;
    });
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