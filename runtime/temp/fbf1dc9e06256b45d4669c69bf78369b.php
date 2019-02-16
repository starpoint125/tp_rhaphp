<?php /*a:3:{s:56:"D:\wamp\www\rhaphp-master\themes/pc/mp/mp\autoreply.html";i:1537234068;s:64:"D:\wamp\www\rhaphp-master\themes/pc/mp/..\admin\common\base.html";i:1537234068;s:65:"D:\wamp\www\rhaphp-master\themes/pc/mp/common\autoreplay_nav.html";i:1537234068;}*/ ?>
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
            <h2><?php echo htmlentities($menu_title); ?>
    <div class="layui-row">
        <div class="layui-col-md10">
            <form class="layui-form" action="">
                <div class="layui-col-md2">
                    <div class="layui-form-item">
                        <select name="search_type" lay-filter="types" lay-verify="required">
                            <option <?php if($search_type==1): ?> selected <?php endif; ?> value="1">全部</option>
                            <option <?php if($search_type==2): ?> selected <?php endif; ?> value="2">当前类型</option>
                        </select>
                    </div>
                </div>
                <div class="layui-col-md5" style="margin-left: 5px; line-height: 38px;">
                    <div class="layui-form-item">
                        <input name="keyword" placeholder="请输入关键词" value="<?php echo input('keyword'); ?>" class="layui-input" type="text">
                    </div>
                </div>
                <div class="layui-col-md4" style="margin-left: 5px; line-height: 38px;">
                    <button class="layui-btn layui-btn-primary" lay-submit="" lay-filter="formDemo">搜索内容</button>
                </div>
            </form>
        </div>
        <div class="layui-col-md2">
            <a href="<?php echo url('addKeyword'); ?>" id="addkw" class="layui-btn layui-btn-normal layui-btn-sm" style="float: right;margin-top: 5px;">增加关键词</a>
        </div>
    </div>
</h2>
        </div>
        <?php endif; ?>
        
<div class="layui-tab" style="padding: 0px 10px 0px 10px;">
    <ul class="layui-tab-title">
        <li <?php if($action_name == 'autoreply'): ?>class="layui-this"<?php endif; ?>> <a href="<?php echo url('autoreply'); ?>">关键词回复</a></li>
        <li <?php if($action_name == 'special'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('special'); ?>">特殊消息/事件</a></li>
        <!--<li <?php if($action_name == 'autoreply'): ?>class="layui-this"<?php endif; ?>>事件回复</li>-->
        <!--<li <?php if($action_name == 'autoreply'): ?>class="layui-this"<?php endif; ?>>未识别回复</li>-->
    </ul>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
    <ul class="layui-tab-title">
        <li <?php if($type == 'text'): ?>class="layui-this"<?php endif; ?> ><a href="<?php echo url('mp/Mp/autoReply',['type'=>'text']); ?>">回复文字</a></li>
        <li <?php if($type == 'news'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'news']); ?>">回复图文</a></li>
        <li <?php if($type == 'addon'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'addon']); ?>">回复应用</a></li>
        <li <?php if($type == 'voice'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'voice']); ?>">回复语音</a></li>
        <li <?php if($type == 'image'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'image']); ?>">回复图片</a></li>
        <li <?php if($type == 'video'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'video']); ?>">回复视频</a></li>
        <li <?php if($type == 'music'): ?>class="layui-this"<?php endif; ?>><a href="<?php echo url('mp/Mp/autoReply',['type'=>'music']); ?>">回复音乐</a></li>
        <?php if(input('keyword')): ?>
        <li <?php if($type == 'search'): ?>class="layui-this"<?php endif; ?>><a>搜索全部</a></li>
        <?php endif; ?>
    </ul>
    <div class="layui-tab-content">

        <?php switch($type): case "text": ?>
        <table class="layui-table" lay-skin="line">
            <colgroup>
                <col width="120">
                <col >
                <col width="100" >
                <col width="150">
            </colgroup>
                    <thead>
                    <tr>
                        <th>关键词</th>
                        <th>回复内容</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo htmlentities($vo['keyword']); ?></td>
                        <td><?php echo htmlentities($vo['content']); ?></td>
                        <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                        <td>
                            <div class="">
                                <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                                <?php if($vo['status']=='1'): ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                                <?php else: ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                                <?php endif; ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            <?php echo $data->render(); break; case "news": ?>
                <table class="layui-table" lay-skin="line">
                    <col width="120">
                    <col width="200">
                    <col width="150">
                    <col width="">
                    <col width="100" >
                    <col width="150">
                    <thead>
                    <tr>
                        <th>关键词</th>
                        <th>标题</th>
                        <th>封面图</th>
                        <th>图文描述</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo htmlentities($vo['keyword']); ?></td>
                        <td><?php echo htmlentities($vo['title']); ?></td>
                        <td>
                            <div  style="padding: 1px; border: #e6e6e6 solid 1px; width:120px; float: left; ">
                            <img class="form_logo" src="<?php echo htmlentities($vo['url']); ?>" style="max-width: none" width="120" height="60">
                            </div>
                        </td>
                        <td><?php echo htmlentities($vo['content']); ?></td>
                        <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                        <td>
                            <div class="">
                                <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                                <?php if($vo['status']=='1'): ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                                <?php else: ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                                <?php endif; ?>
                                <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
        <?php echo $data->render(); break; case "addon": ?>
        <table class="layui-table" lay-skin="line">
            <col width="120">
            <col width="200">
            <col width="" >
            <col width="100">
            <col width="150">
            <thead>
            <tr>
                <th>关键词</th>
                <th>应用名称</th>
                <th>应用简介</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td>
                    <div  style=" float: left; ">
                        <img class="form_logo" src="<?php echo htmlentities($vo['logo']); ?>" width="30" height="30"><?php echo htmlentities($vo['name']); ?>
                    </div>
                    </td>
                <td><?php echo htmlentities($vo['desc']); ?></td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <?php break; case "voice": ?>
        <table class="layui-table" lay-skin="line">
            <col width="">
            <col width="">
            <col width="" >
            <col width="100">
            <col width="150">
            <thead>
            <tr>
                <th>关键词</th>
                <th>语音名称</th>
                <th>语音资源|媒体ID</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td><?php echo htmlentities($vo['title']); ?></td>
                <td><?php echo htmlentities($vo['url']); ?></td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "image": ?>
        <table class="layui-table" lay-skin="line">
            <col width="">
            <col width="100">
            <col width="" >
            <col width="100">
            <col width="150">
            <thead>
            <tr>
                <th>关键词</th>
                <th>类型</th>
                <th>封面图</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td><?php if($vo['status_type'] == '1'): ?> 永久
                    <?php elseif($vo['status_type'] == '0'): ?>临时
                    <?php endif; ?></td>
                <td>
                    <div  style="padding: 1px; border: #e6e6e6 solid 1px; width:120px; float: left; ">
                        <img class="form_logo" src="<?php echo htmlentities($vo['url']); ?>" style="max-width: none" width="120" height="60">
                    </div>
                </td>

                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "video": ?>
        <table class="layui-table" lay-skin="line">
            <col width="">
            <col width="100">
            <col width="" >
            <col width="" >
            <col width="100">
            <col width="150">
            <thead>
            <tr>
                <th>关键词</th>
                <th>类型</th>
                <th>视频标题|媒体ID</th>
                <th>视频地址</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td><?php if($vo['status_type'] == '1'): ?> 永久
                    <?php elseif($vo['status_type'] == '0'): ?>临时
                    <?php endif; ?></td>
                <td>
                    <?php echo htmlentities($vo['title']); ?>
                </td>
                <td>
                    <?php echo htmlentities($vo['url']); ?>
                </td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>

                </td>

            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "music": ?>
        <table class="layui-table" lay-skin="line">
            <col width="80">
            <col width="100">
            <col width="" >
            <col width="" >
            <col width="100">
            <col width="150">
            <thead>
            <tr>
                <th>关键词</th>
                <th>音乐标题</th>
                <th>链接地址</th>
                <th>音乐描述</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td><?php echo htmlentities($vo['title']); ?></td>
                <td>
                    <?php echo htmlentities($vo['url']); ?>
                </td>
                <td><?php echo htmlentities($vo['content']); ?></td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                    <?php if($vo['status']=='1'): ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                    <?php else: ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                    <?php endif; ?>
                    <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>

                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; case "search": ?>
        <table class="layui-table" lay-skin="line">
            <colgroup>
                <col width="120">
                <col >
                <col width="100" >
                <col width="150">
            </colgroup>
            <thead>
            <tr>
                <th>关键词</th>
                <th>类型</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['keyword']); ?></td>
                <td><?php echo getRuleTypeName($vo['type']); ?></td>
                <td><?php if($vo['status']=='1'): ?>使用中<?php else: ?>已停用<?php endif; ?></td>
                <td>
                    <div class="">
                        <a class="rha-bt-a" href="javascript:;" onclick="editReply('<?php echo htmlentities($vo['id']); ?>')">修改</a>
                        <?php if($vo['status']=='1'): ?>
                        <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','0')">停用</a>
                        <?php else: ?>
                        <a class="rha-bt-a" href="javascript:;" onclick="updateReply('<?php echo htmlentities($vo['id']); ?>','1')">开启</a>
                        <?php endif; ?>
                        <a class="rha-bt-a" href="javascript:;" onclick="delReply('<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); break; endswitch; ?>
    </div>
</div>
<script>
    var layer;
    var form;
    layui.use(['layer','form'], function() {
        layer = layui.layer;
        form = layui.form;
        form.on('select(types)', function(data){
            $.post("",{search_type:data.value},function (res) {})
        });
    })
    function delReply(id) {
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.confirm('你确定需要删除吗？', {
                btn: ['是','不'] //按钮
            }, function(){
                $.post("<?php echo url('mp/Mp/delRule'); ?>",{'id':id},function (res) {
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
    function updateReply(id,status) {
        layui.use('layer', function(){
            var layer = layui.layer;
                $.post("<?php echo url('mp/Mp/updateRule'); ?>",{'id':id,'status':status},function (res) {
                    if(res.status==1){
                        layer.msg(res.msg,{icon:1,time:2000},function (index) {
                            window.location.reload();

                        })

                    }else{
                        layer.alert(res.msg)
                    }
                })
        });
    }
    var layer;
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    function editReply(id) {
        layer.open({
            type: 2,
            title: '修改回复内容',
            shadeClose: true,
            shade: 0.5,
            area: ['680px', '550px'],
            content: '<?php echo url("mp/mp/editAutoreply"); ?>?id='+id,
            cancel: function(index, layero){
                window.location.reload();
            }
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