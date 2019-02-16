<?php /*a:2:{s:53:"D:\wamp\www\rhaphp-master\themes/pc/mp/mp\qrcode.html";i:1537234068;s:64:"D:\wamp\www\rhaphp-master\themes/pc/mp/..\admin\common\base.html";i:1537234068;}*/ ?>
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
    
<script type="text/javascript" src="/public/static//zclip/jquery.zclip.min.js"></script>

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
            <h2><?php echo htmlentities($menu_title); ?>
<a href="<?php echo url('qrcodeAdd'); ?>" id="addkw" class="layui-btn layui-btn-normal layui-btn-sm rha-nav-title">增加二维码</a>
</h2>
        </div>
        <?php endif; ?>
        
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
    <ul class="layui-tab-title">
        <li <?php if($type == 'list'): ?>class="layui-this"<?php endif; ?> ><a href="<?php echo url('mp/Mp/qrcode',['type'=>'list']); ?>">二维码列表</a></li>
        <li <?php if($type == 'statistics'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/qrcode',['type'=>'statistics']); ?>">二维码扫描统计</a></li>
    </ul>
    <div class="layui-tab-content">
        <?php switch($type): case "list": ?>

        <table class="layui-table" lay-skin="line">
            <thead>
            <tr>
                <th>二维码</th>
                <th>场景名称</th>
                <th>对应关键字</th>
                <th>类型</th>
                <th>到期时间</th>
                <th>短链接</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><div  style="padding: 1px; border: #e6e6e6 solid 1px; width:50px; float: left; ">
                    <img  class="form_logo" src="<?php echo htmlentities($vo['qrcode_url']); ?>" width="50" height="50">
                </div></td>
                <td><?php echo htmlentities($vo['scene_name']); ?></td>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td><?php if($vo['qr_type'] == '0'): ?>临时
                    <?php else: ?> 永久
                    <?php endif; ?></td>
                <td><?php if($vo['qr_type'] == '0'): ?><?php echo htmlentities($vo['create_time']); else: ?> 长期有效
                    <?php endif; ?></td>
                <td>
                    <?php echo htmlentities($vo['short_url']); ?>
                </td>
                <td>
                    <a class="rha-bt-a" href="javascript:;" onclick="delQrcode('<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    <a target="_blank" href="<?php echo htmlentities($vo['short_url']); ?>" class="rha-bt-a">查看</a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "statistics": ?>
        <table class="layui-table" lay-skin="line">
            <thead>
            <tr>
                <th>二维码</th>
                <th>场景名称</th>
                <th>触发关键字</th>
                <th>类型</th>
                <th>被扫总数</th>
                <th>粉丝增加</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><div  style="padding: 1px; border: #e6e6e6 solid 1px; width:50px; float: left; ">
                    <img class="form_logo" src="<?php echo htmlentities($vo['qrcode_url']); ?>" width="50" height="50">
                </div></td>
                <td><?php echo htmlentities($vo['scene_name']); ?></td>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td><?php if($vo['qr_type'] == '0'): ?>临时
                    <?php else: ?> 永久
                    <?php endif; ?></td>
                <td><?php echo htmlentities($vo['scan_count']); ?></td>
                <td><?php echo htmlentities($vo['gz_count']); ?></td>
                <td>
                    <a href="<?php echo url('qrcode',['scene_id'=>$vo['scene_id'],'type'=>'friend']); ?>" class="rha-bt-a">查看增加粉丝</a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "friend": ?>
        <table class="layui-table" lay-skin="line">
            <thead>
            <tr>
                <th>场景 ID</th>
                <th>呢称</th>
                <th>头像</th>
                <th>扫码次数</th>
                <th>扫码时间</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['scene_id']); ?></td>
                <td><?php echo htmlentities($vo['nickname']); ?></td>
                <td><img height="38" width="38" style="border-radius: 3px;" src="<?php echo htmlentities($vo['headimgurl']); ?>"></td>
                <td><?php echo htmlentities($vo['scan_count']); ?></td>
                <td><?php echo date('Y-m-d H:s:i',$vo['create_time']); ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; endswitch; ?>
    </div>
</div>
<script>
    function delQrcode(id) {
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.confirm('你确定需要删除吗？', {
                btn: ['是','不'] //按钮
            }, function(){
                $.post("<?php echo url('mp/Mp/delQrcode'); ?>",{'id':id},function (res) {
                    if(res.status==1){
                        layer.alert(res.msg,function (index) {
                            window.location.reload();
                            layer.close(index);
                        })

                    }else{
                        layer.alert(res.msg)
                    }
                })
            }, function(){

            });
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