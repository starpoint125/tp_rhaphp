<?php /*a:1:{s:64:"D:\wamp\www\rhaphp-master\themes/pc/admin/appstore\app_info.html";i:1537234068;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/public/static//admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/public/static//admin/css/admin_base.css" />
    <script type="text/javascript" src="/public/static//jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/public/static//layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/static//layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static//icon/icon.css" />
</head>
<body style="background: #ffffff;">
<div class="layui-row" id="apps-info">
   <div class="layui-col-xs2 pd">
       <div class="apps-info-logo">
           <img src="<?php echo htmlentities($info['logo']); ?>" style="width: 100%;" />
       </div>
   </div>
    <div class="layui-col-xs8 pd">
        <div class="layui-row">
            <div class="layui-col-xs10">
                <span class="apps-info-title"><?php echo htmlentities($info['title']); ?>
                    <span class="layui-badge layui-bg-gray"><?php echo htmlentities($info['type']); ?></span>
                    <span class="layui-badge layui-bg-blue"><?php if(($info['money']>0)): ?>
                                        <?php echo htmlentities($info['money']); ?> 元
                                        <?php else: ?>
                                        免费
                                        <?php endif; ?></span>
                </span>
                <div class="apps-info-desc">
                    <p>作者：<?php echo htmlentities($info['author']); ?></p>
                    <p>版本：<?php echo htmlentities($info['version']); ?></p>
                    <p>分类：<?php echo htmlentities($info['cate']); ?></p>
                    <p>创建时间：<?php echo htmlentities($info['create_time']); ?></p>
                    <p>更新时间：<?php echo htmlentities($info['update_time']); ?></p>
                </div>
            </div>
            <div class="layui-col-xs2">
                <div class="apps-into-install">
                    <button onclick="downloadApp('<?php echo htmlentities($info['id']); ?>')" class="layui-btn layui-btn-sm layui-btn-normal">
                        <i class="layui-icon">&#xe601;</i>
                        立即下载
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-col-xs2 pd preview-qrcode">
        <?php if($info['preview_url'] != ''): ?>
            <img style="width: 100%;" src="<?php echo url('showPreviewQrcode','',''); ?>?url=<?php echo urlencode($info['preview_url']); ?>">
            <span class="apps-info-preview_text">扫码预览</span>
        <?php else: endif; ?>
    </div>
</div>
<hr>
<div style="padding: 0px 10px;">
    小提示
    <hr>
    <blockquote style="border-left:5px solid  #ea6e0c;" class="layui-elem-quote"><?php echo $info['warning']; ?></blockquote>
    应用简介
    <hr>
    <blockquote class="layui-elem-quote"><?php echo htmlentities($info['description']); ?></blockquote>
    <div class="layui-tab layui-tab-card">
        <ul class="layui-tab-title">
            <li class="layui-this">应用详情</li>
            <li>升级日志</li>
        </ul>
        <div class="layui-tab-content" style="height: auto;">
            <div class="layui-tab-item layui-show">
                <div class="apps-info-content">
                    <?php echo $info['content']; ?>
                </div>
            </div>
            <div class="layui-tab-item">
                <ul class="layui-timeline">
                    <?php if(isset($info['upgrade'])): if(is_array($info['upgrade']) || $info['upgrade'] instanceof \think\Collection || $info['upgrade'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['upgrade'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                        <div class="layui-timeline-content layui-text">
                            <h3 class="layui-timeline-title"><?php echo htmlentities(date("Y-m-d H:i",!is_numeric($v['create_time'])? strtotime($v['create_time']) : $v['create_time'])); ?></h3>
                            <p>
                                <?php echo $v['description']; ?>
                            </p>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>

        </div>
    </div>
    <br>
    <br>
</div>
<script>
    var layer;
    var form;
    var element
    layui.use(['layer','form','element'], function() {
        element = layui.element;
        layer = layui.layer;
        form = layui.form;
    })
    var window_index = parent.layer.getFrameIndex(window.name);
    function downloadApp(id) {
        layer.confirm('<?php if(($info['money']>0)): ?>你确定付费<?php echo htmlentities($info['money']); ?>元下载使用此应用吗？<?php else: ?>此应用是免费的，你确定要下载使用吗？<?php endif; ?>', {
            btn: ['是的','不的']
        }, function(){
            var index = layer.load(1);
            $.post("<?php echo url('download'); ?>",{app_id:id},function (res) {
                if(res.errcode=='0'){
                    layer.msg(res.errmsg,{time:3000},function () {
                        parent.parent.redirect(res.type);
                        parent.layer.close(index);
                    });
                }else{
                    layer.close(index)
                    layer.alert(res.errmsg);
                }
            }).error(function (error) {
                layer.alert('500 Internal Server Error');
                layer.close(index)
            })
        }, function(){

        });
        return false;
    }
</script>
</body>
</html>