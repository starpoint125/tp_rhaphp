<?php /*a:2:{s:55:"D:\wamp\www\rhaphp-master\themes/pc/mp/mp\newslist.html";i:1537234068;s:64:"D:\wamp\www\rhaphp-master\themes/pc/mp/..\admin\common\base.html";i:1537234068;}*/ ?>
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
<a href="<?php echo url('addNews'); ?>" id="addkw" class="layui-btn layui-btn-normal layui-btn-sm rha-nav-title">增加图文</a>
</h2>
        </div>
        <?php endif; ?>
        
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
    <ul class="layui-tab-title">
        <a href="<?php echo url('newsList',['type'=>3]); ?>"><li <?php if($intype == '3'): ?> class="layui-this" <?php endif; ?>>多图文</li></a>
        <a href="<?php echo url('newsList',['type'=>2]); ?>"><li <?php if($intype == '2'): ?> class="layui-this" <?php endif; ?>>单图文</li></a>
        <a href="<?php echo url('newsList',['type'=>1]); ?>"><li <?php if($intype == '1'): ?> class="layui-this" <?php endif; ?>>文本</li></a>
    </ul>
    <div class="layui-tab-content">
        <?php switch($intype): case "3": ?>
        <div class="layui-tab-item  layui-show">
            <div class="layui-row">
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                <div class="layui-col-md4 rhaphp-media-news">
                    <div class="media-news-body">
                        <div class="media-news-time">
                            发布时间：<?php echo date('Y-m-d : h:i',$val['create_time']); ?>
                            &nbsp;&nbsp;&nbsp;状态:<?php if($val['status_type'] == '0'): ?>未上传<?php elseif($val['status_type'] == '1'): ?>已上传<?php else: ?>已群发<?php endif; ?>
                        </div>
                        <span style="display: block;">
                            <?php if(is_array($val['list']) || $val['list'] instanceof \think\Collection || $val['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($val['list']) ? array_slice($val['list'],0,1, true) : $val['list']->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                            <div class="media-news-content">
                                <div class="media-news-desc"><p
                                        class="media-news-desc-sp"><?php echo htmlentities($item['title']); ?></p></div>
                                <img class="media-news-img"
                                     src="<?php echo htmlentities($item['cover']); ?>">
                            </div>
                             <?php endforeach; endif; else: echo "" ;endif; ?>
                        </span>
                        <div>
                            <ul>
                                <?php if(is_array($val['list']) || $val['list'] instanceof \think\Collection || $val['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($val['list']) ? array_slice($val['list'],1,10, true) : $val['list']->slice(1,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <div class="mdedia-news-lists-box">
                                        <div class="media-news-title-box layui-col-md9">
                                            <?php echo htmlentities($item['title']); ?>
                                        </div>
                                        <div class="media-news-img-box layui-col-md3"><img class="media-news-lists-img" src="<?php echo htmlentities($item['cover']); ?>">
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="media-news-item-type2">
                            <div class="layui-btn-group media-news-btn">
                                <button onclick="sendMediaNews('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe609;</i>
                                    群发
                                </button>
                                <button onclick="Preview('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe610;</i>
                                    预览
                                </button>
                                <button onclick="uploadNews('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe62f;</i>
                                    上传
                                </button>
                                <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('editNews',['news_id'=>$val['news_id'],'type'=>'3']); ?>">
                                    <i class="layui-icon">&#xe642;</i>
                                    编辑&删
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php break; case "2": ?>
        <div class="layui-tab-item  layui-show">
            <div class="layui-row">
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                <div class="layui-col-md4 rhaphp-media-news">
                    <div class="media-news-body">
                        <div class="media-news-time">
                            发布时间：<?php echo date('Y-m-d : h:i',$val['create_time']); ?>
                            &nbsp;&nbsp;&nbsp;状态:<?php if($val['status_type'] == '0'): ?>未上传<?php elseif($val['status_type'] == '1'): ?>已上传<?php else: ?>已群发<?php endif; ?>
                        </div>
                        <span style="display: block;">
                                    <?php if(is_array($val['list']) || $val['list'] instanceof \think\Collection || $val['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($val['list']) ? array_slice($val['list'],0,1, true) : $val['list']->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                    <div class="media-news-content">
                                        <div class="media-news-desc"><p
                                                class="media-news-desc-sp"><?php echo htmlentities($item['title']); ?></p></div>
                                        <img class="media-news-img"
                                             src="<?php echo htmlentities($item['cover']); ?>">
                                    </div>
                                     <?php endforeach; endif; else: echo "" ;endif; ?>
                                </span>
                        <div>
                            <ul>
                                <?php if(is_array($val['list']) || $val['list'] instanceof \think\Collection || $val['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($val['list']) ? array_slice($val['list'],1,10, true) : $val['list']->slice(1,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <div class="mdedia-news-lists-box">
                                        <div class="media-news-title-box layui-col-md9">
                                            <?php echo htmlentities($item['title']); ?>
                                        </div>
                                        <div class="media-news-img-box layui-col-md3"><img class="media-news-lists-img" src="<?php echo htmlentities($item['cover']); ?>">
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="media-news-item-type2">
                            <div class="layui-btn-group media-news-btn">
                                <button onclick="sendMediaNews('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe609;</i>
                                    群发
                                </button>
                                <button onclick="Preview('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe610;</i>
                                    预览
                                </button>
                                <button onclick="uploadNews('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe62f;</i>
                                    上传
                                </button>
                                <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('editNews',['news_id'=>$val['news_id'],'type'=>'2']); ?>">
                                    <i class="layui-icon">&#xe642;</i>
                                    编辑&删
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        </div>
        </div>
        <?php break; case "1": ?>
<div class="layui-tab-item  layui-show">
    <div class="layui-row">
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
        <div class="layui-col-md4 rhaphp-media-news">
            <div class="media-news-body">
                <div class="media-news-time">
                    发布时间：<?php echo date('Y-m-d : h:i',$val['create_time']); ?>
                    &nbsp;&nbsp;&nbsp;状态:<?php if($val['status_type'] == '3'): ?>已群发<?php else: ?>未群发<?php endif; ?>
                </div>
                <div>
                    <?php echo htmlentities($val['title']); ?>
                </div>
                <div class="media-news-item-type2">
                    <div class="layui-btn-group media-news-btn">
                        <button onclick="sendMediaNews('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                            <i class="layui-icon">&#xe609;</i>
                            群发
                        </button>
                        <button onclick="Preview('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                            <i class="layui-icon">&#xe610;</i>
                            预览
                        </button>
                        <button onclick="uploadNews('<?php echo htmlentities($val['news_id']); ?>')" class="layui-btn layui-btn-primary layui-btn-sm">
                            <i class="layui-icon">&#xe62f;</i>
                            上传
                        </button>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="<?php echo url('editNews',['news_id'=>$val['news_id'],'type'=>'1']); ?>">
                            <i class="layui-icon">&#xe642;</i>
                            编辑&删
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
</div>
</div>
<?php break; endswitch; ?>

<div style="clear: both"><?php echo $page; ?></div>
<script>
    layui.use(['layer'],function () {
        var layer=layui.layer;
    })
    function Preview(news_id) {
        layer.prompt({title: '请输入发送预览者微信号', formType: 0}, function(wxid, index){
            layer.close(index);
            var l_index=layer.load(1)
            $.post("<?php echo url('newsPreview'); ?>",{news_id:news_id,wxid:wxid},function (res) {
                if(res.status==1){
                    layer.msg(res.msg);
                }else{
                    layer.alert(res.msg);
                }
                layer.close(l_index);
                return false;
            }).error(function (res) {
                layer.close(l_index);
                layer.alert('服务出错');
            })
        });
    }
        function uploadNews(news_id) {
            var l_index=layer.load(1)
            $.post("<?php echo url('uploadMediaNews'); ?>",{news_id:news_id},function (res) {
                if(res.status==1){

                    layer.msg(res.msg);
                }else{

                    layer.alert(res.msg);
                }
                layer.close(l_index);
                return false;
            }).error(function (res) {
                layer.close(l_index);
                layer.alert('服务出错');
            })
        }

        function sendMediaNews(news_id) {
            layer.confirm('主人，确定要群发了吗？', {
                btn: ['确定','取消']
            }, function(){
                var l_index=layer.load(1)
                $.post("<?php echo url('sendall'); ?>",{news_id:news_id},function (res) {
                    if(res.status==1){

                        layer.msg(res.msg);
                    }else{

                        layer.alert(res.msg);
                    }
                    layer.close(l_index);
                    return false;
                }).error(function (res) {
                    layer.close(l_index);
                    layer.alert('服务出错');
                })
            })

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