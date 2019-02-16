<?php /*a:2:{s:56:"D:\wamp\www\rhaphp-master\themes/pc/admin/app\index.html";i:1537234068;s:58:"D:\wamp\www\rhaphp-master\themes/pc/admin/common\base.html";i:1537234068;}*/ ?>
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
        
<div style="padding: 0px 10px 0px 10px;">
<div class="layui-tab">
    <ul class="layui-tab-title">
        <!--<li <?php if($type == 'index'): ?>class="layui-this"<?php endif; ?>> <a href="<?php echo url('index'); ?>">在使用</a></li>-->
        <li <?php if($type == 'uninstall'): ?>class="layui-this"<?php endif; ?>> <a href="<?php echo url('index',['type'=>'uninstall']); ?>">退出|还原</a></li>
        <li <?php if($type == 'notinstall'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('index',['type'=>'notinstall']); ?>">安装|卸载</a></li>
    </ul>
</div>
<?php switch($type): case "index": ?>
<table class="layui-table" lay-even lay-skin="nob">
    <thead>
    <tr>
        <th width="60">应用Logo</th>
        <th width="60">应用名称</th>
        <th>应用标识</th>
        <!--<th>简介</th>-->
        <th>版本</th>
        <th>新版本</th>
        <th>作者</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($addons) || $addons instanceof \think\Collection || $addons instanceof \think\Paginator): $i = 0; $__LIST__ = $addons;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><img width="30" height="30" src="<?php echo htmlentities($vo['logo']); ?>"></td>
        <td><?php echo htmlentities($vo['name']); ?></td>
        <td><?php echo htmlentities($vo['addon']); ?></td>
        <!--<td><?php echo htmlentities($vo['desc']); ?></td>-->
        <td><?php echo htmlentities($vo['version']); ?></td>
        <td><?php echo getAddonConfigByFile($vo['addon'],'version'); ?></td>
        <td><?php echo htmlentities($vo['author']); ?></td>
        <td>
            <a class="layui-btn layui-btn-xs layui-btn-normal" href="<?php echo url('mp/App/index',['name'=>$vo['addon'],'type'=>'news','mid'=>$mpInfo['id']]); ?>">进入</a>
            <?php if($vo['upgrade'] == '1'): ?>
            <a class="layui-btn layui-btn-xs layui-btn-warm" href="javascript:;" onclick="upgrade('<?php echo htmlentities($vo['addon']); ?>')">升级</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<?php break; case "uninstall": ?>
    <table class="layui-table" lay-even lay-skin="nob">
        <thead>
        <tr>
            <th>应用Logo</th>
            <th>应用名称</th>
            <th>应用标识</th>
            <!--<th>简介</th>-->
            <th>版本</th>
            <th>新版本</th>
            <th>作者</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($addons) || $addons instanceof \think\Collection || $addons instanceof \think\Paginator): $i = 0; $__LIST__ = $addons;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><img width="30" height="30" src="<?php echo htmlentities($vo['logo']); ?>"></td>
            <td><?php echo htmlentities($vo['name']); ?></td>
            <td><?php echo htmlentities($vo['addon']); ?></td>
            <!--<td><?php echo htmlentities($vo['desc']); ?></td>-->
            <td><?php echo htmlentities($vo['version']); ?></td>
            <td><?php echo getAddonConfigByFile($vo['addon'],'version'); ?></td>
            <td><?php echo htmlentities($vo['author']); ?></td>
            <td width="90">
                <button class="layui-btn layui-btn-xs" onclick="closeApp('<?php echo htmlentities($vo['addon']); ?>')">退出</button>
                <button class="layui-btn layui-btn-xs layui-btn-danger" onclick="wipeDataApp('<?php echo htmlentities($vo['addon']); ?>')">还原</button>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php break; case "notinstall": ?>
<table class="layui-table" lay-even lay-skin="nob">
    <thead>
    <tr>
        <th>应用Logo</th>
        <th>应用名称</th>
        <th>应用标识</th>
        <!--<th>简介</th>-->
        <th>版本</th>
        <th>新版本</th>
        <th>作者</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($addons) || $addons instanceof \think\Collection || $addons instanceof \think\Paginator): $i = 0; $__LIST__ = $addons;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr >
        <td><img width="30" height="30" src="<?php echo getAddonLogo($vo['addon']); ?>"></td>
        <td><?php echo htmlentities($vo['name']); ?></td>
        <td><?php echo htmlentities($vo['addon']); ?></td>
        <!--<td><?php echo htmlentities($vo['desc']); ?></td>-->
        <td><?php echo htmlentities($vo['version']); ?></td>
        <td><?php echo getAddonConfigByFile($vo['addon']); ?></td>
        <td><?php echo htmlentities($vo['author']); ?></td>
        <td width="110"><button class="layui-btn layui-btn-xs " onclick="installApp('<?php echo htmlentities($vo['addon']); ?>')">安装|启用</button>
            <button class="layui-btn layui-btn-xs layui-btn-danger" onclick="uninstallApp('<?php echo htmlentities($vo['addon']); ?>')">卸载</button>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<?php break; endswitch; ?>
</div>
<script>
    var layer;
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    function installApp(name) {
            var loadIndex = layer.load(1)
            $.post("<?php echo url('admin/app/install'); ?>",{'name':name},function (res) {
                if(res.status=='0'){
                    layer.close(loadIndex)
                    layer.alert(res.msg);
                }
                if(res.status=='1'){
                    layer.msg(res.msg,{time:1000},function () {
                        location.href="<?php echo url('admin/app/index',['type'=>'notinstall']); ?>";
                    });
                }
            }).error(function (error) {
                layer.alert('500 Internal Server Error');
                layer.close(loadIndex)
            })
            return false;

    }
    function upgrade(name) {
            $.post("<?php echo url('admin/app/upgrade'); ?>",{'name':name},function (res) {
                if(res.status=='0'){
                    layer.alert(res.msg);
                }
                if(res.status=='1'){
                    layer.msg(res.msg,{time:1000},function () {
                        location.href="<?php echo url('admin/app/index'); ?>";
                    });
                }
            })
    }
    function closeApp(name) {
            $.post("<?php echo url('admin/app/close'); ?>",{'name':name},function (res) {
                if(res.status=='0'){
                    layer.alert(res.msg);
                }
                if(res.status=='1'){
                    layer.msg(res.msg,{time:1000},function () {
                        location.href="<?php echo url('admin/app/index',['type'=>'uninstall']); ?>";
                    });
                }
            })
    }

    function uninstallApp(name) {
        layer.confirm('你确定卸载（'+name+'）此应用吗？点击确定将会清空此应用所有数据以及文件', {
            btn: ['确定','不的']
        }, function(load_index){
            layer.close(load_index);
            var index = layer.load(1,{
                shade: [0.1,'#000']
            });
            $.post("<?php echo url('admin/app/uninstall'); ?>",{'name':name},function (res) {
                if(res.status=='0'){
                    layer.close(index)
                    layer.alert(res.msg);
                }
                if(res.status=='1'){
                    layer.msg(res.msg,{time:1000},function () {
                        location.href="<?php echo url('admin/app/index',['type'=>'notinstall']); ?>";
                    });
                }
            }).error(function (error) {
                layer.alert('500 Internal Server Error');
                layer.close(index)
            })
        }, function(){

        });
    }
    function wipeDataApp(name) {
        layer.confirm('你确定还（'+name+'）此应用吗？点击确定将会清空数据以及还原未安装状态', {
            btn: ['确定','不的']
        }, function(load_index){
            layer.close(load_index);
            var index = layer.load(1,{
                shade: [0.1,'#000']
            });
            $.post("<?php echo url('admin/app/wipeData'); ?>",{'name':name},function (res) {
                if(res.status=='0'){
                    layer.close(index)
                    layer.alert(res.msg);
                }
                if(res.status=='1'){
                    layer.msg(res.msg,{time:1000},function () {
                        location.href="<?php echo url('admin/app/index',['type'=>'uninstall']); ?>";
                    });
                }
            }).error(function (error) {
                layer.alert('500 Internal Server Error');
                layer.close(index)
            })
        }, function(){

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