<?php /*a:2:{s:54:"D:\wamp\www\rhaphp-master\themes/pc/mp/mp\addnews.html";i:1537234068;s:64:"D:\wamp\www\rhaphp-master\themes/pc/mp/..\admin\common\base.html";i:1537234068;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="/public/static//admin/css/media_news.css" />
<script type="text/javascript" src="/public/static//admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/public/static//admin/ueditor/ueditor.all.js"></script>
<script type="text/javascript" src="/public/static//js/ajax_file_upload.js"></script>
<style>
    #edui1_iframeholder img{ width: 100%;}
    #edui1_iframeholder{
        height: 450px !important;}
</style>

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
        

<div class="set-style">
    <dl>
        <dt>消息类型:</dt>
        <dd>
            <div style="margin-left: 10px;">
            <label class="check-box"><input type="radio" name="type" id="type1" value="1">&nbsp;文本</label>
            <label class="check-box"><input type="radio" name="type" id="type2" value="2">&nbsp;单图文</label>
            <label class="check-box"><input type="radio" name="type" id="type3" value="3" checked>&nbsp;多图文</label>
            </div>
        </dd>
    </dl>
</div>
<div class="set-style type1" style="display: none;">
    <dl>
        <dt>内容:</dt>
        <dd>
            <p>
                <textarea id="type1_desc"></textarea>
            </p>

        </dd>
    </dl>
</div>
<div class="type2 media" style="display: none;">
    <div class="media-left">
        <div class="media-border">
            <h5 class="type-title">标题</h5>
            <div style="text-align:center;">
                <img class="type2-img" src="" style="max-width:218px;max-height:120px;display:none;">
                <span class="img-text">封面图片</span>
            </div>
        </div>
    </div>
    <div class="media-right">
        <p><span style="color:red;"> * </span> 标题 </p>
        <input style="width: 98%;" type="text" id="title" value="">
        <p>作者（选填）</p>
        <input style="width: 98%;" type="text" id="author" value="">
        <p>
            <span style="color:red;"> *</span> 封面
        </p>
        <div>
            <div class="class-logo" style="background: #f8f8f8;">
                <p style="width: 270px; height: 150px;">
                    <img id="imgLogo" src="" style="max-width:270px;max-height:150px;">
                </p>
            </div>
            <p class="hint">
                <span style="color: orange;">建议上传小于1M的图片。</span>
            </p>
            <input type="hidden" id="type2-img-hidden" value=""/>
            <div class="rhaphp-upload-btn">
                <a href="javascript:void(0);"><span> <input
                        hidefocus="true" size="1" class="input-file" name="file_upload"
                        id="uploadImg" nc_type="change_store_label" type="file"
                        onchange="imgUpload(this, 'type2-img', 'type2-img-hidden');"> <input type="hidden" id="Logo"
                                                                                             value=""/></span>
                    <p class="layui-btn layui-btn-sm layui-btn-normal">
                        <i  class="fa fa-upload "></i>上传图片
                    </p></a>
            </div>
        </div>
        <p></p>
        <p class="isshowcover">
            <input type="checkbox" id="show_cover_pic"
                   style="margin-top: -2px; margin-right: 5px;"><label
                for="show_cover_pic"
                style="font-weight: normal; display: inline-block;">封面图片显示在正文中</label>
        </p>
        <p class="rha_news_content"><span style="color:red;"> *</span> 摘要</p>
        <p>
            <textarea id="desc" style="width: 98%;"></textarea>
        </p>
        <p class="rha_news_content"><span style="color:red;"> *</span> 正文</p>
        <div class="controls" id="discripContainer">
            <textarea id="tareaProductDiscrip1" name="discripArea" style=" width: 100%; display: none;"></textarea>
            <script id="editor" type="text/plain" style="width: 380px; height: 400px;"></script>
        </div>
        <p></p>
        <p>原文链接</p>
        <input style="width: 98%;" type="text" id="content_source_url" value="">
    </div>
</div>
<div class="type3 media">
    <div class="media-left">
        <div class="media-border-title js-action action" onmouseover="show(this)" onmouseout="hide(this)"
             onclick="edit(this, 0)">
            <div style="position: relative;text-align:center;">
                <img class="type3-img-0" src="" style="max-width:275px;max-height:150px;display:none;">
                <span class="img-text">封面图片</span>
                <h5 class="type3-title-0"
                    style="position: absolute; bottom: 0; width: 100%; background: #000; opacity:0.5; color: #fff; margin: 0; padding: 5px 0;text-align:left;">
                    标题</h5>
            </div>
            <div class="actions"><span class="edit">编辑</span></div>
            <span class="editting">编辑中</span>
            <input type="hidden" name="hidden0" id="title0" value="">
            <input type="hidden" name="hidden0" id="author0" value="">
            <input type="hidden" name="hidden0" id="cover0" value="">
            <input type="hidden" name="hidden0" id="show_cover_pic0" value="0">
            <input type="hidden" name="hidden0" id="summary0" value="">
            <input type="hidden" name="hidden0" id="content0" value="">
            <input type="hidden" name="hidden0" id="content_source_url0" value="">
        </div>
        <div class="media-body js-action" onmouseover="show(this)" onmouseout="hide(this)" onclick="edit(this, 1)">
            <p class="type3-title-1">标题</p>
            <div class="media-body-div">
                <img class="type3-img-1" src="" style="width: 100%;max-height:62px;display:none;">
                <span class="img-text">缩略图</span>
            </div>
            <div class="actions"><span class="edit">编辑</span></div>
            <span class="editting">编辑中</span>
            <input type="hidden" name="hidden1" id="title1" value="">
            <input type="hidden" name="hidden1" id="author1" value="">
            <input type="hidden" name="hidden1" id="cover1" value="">
            <input type="hidden" name="hidden1" id="show_cover_pic1" value="0">
            <input type="hidden" name="hidden1" id="summary1" value="">
            <input type="hidden" name="hidden1" id="content1" value="">
            <input type="hidden" name="hidden1" id="content_source_url1" value="">
        </div>
        <div class="media-body">
                <span class="media-plus"><a href="javascript:;"><i
                        class="fa fa-plus layui-icon ">&#xe654;</i></a></span>
        </div>
    </div>
    <div class="media-right" id="dir" dir="0">
        <p><span style="color:red;"> * </span>标题</p>
        <input style="width: 98%;" type="text" id="form_title" value=""
               onchange="changeElement('title')">
        <p>
        <p>作者</p>
        <input style="width: 98%;" type="text" id="form_author" value=""
               onchange="changeElement('author')">
        <p><span style="color:red;"> * </span>
            封面<span></span>
        </p>
        <div>
            <div class="class-logo" style="background: #f8f8f8;">
                <p style="width: 270px; height: 150px;">
                    <img id="imgLogo1" src="" style="max-width:270px;max-height:150px;">
                </p>
            </div>
            <p class="hint">
                <span style="color: orange;">建议上传小于1M的图片。</span>
            </p>
            <div class="rhaphp-upload-btn">
                <a href="javascript:void(0);"><span> <input
                        hidefocus="true" size="1" class="input-file" name="file_upload"
                        id="uploadImg1" nc_type="change_store_label" type="file"
                        onchange="imgUpload(this, 'type3-img-', 'cover');"> <input type="hidden"
                                                                                   id="Logo1" value=""/></span>
                    <p class="layui-btn layui-btn-sm layui-btn-normal">
                        <i class="fa fa-upload"></i>上传图片
                    </p></a>
            </div>
        </div>
        <p></p>
        <p class="isshowcover">
            <input type="checkbox" id="form_show_cover_pic" onchange="changeElement('show_cover_pic')"
                   style="margin-top: -2px; margin-right: 5px;"><label
                for="show_cover_pic"
                style="font-weight: normal; display: inline-block;">封面图片显示在正文中</label>
        </p>
        <p class="rha_news_content"><span style="color:red;"> * </span>摘要</p>
        <p>
            <textarea id="form_summary" style="width: 98%;" onchange="changeElement('summary')"></textarea>
        </p>
        <p class="rha_news_content"><span style="color:red;"> * </span>正文</p>
        <div class="controls" id="discripContainer">
                <textarea id="tareaProductDiscrip" name="discripArea" style=" width: 100%; display: none; "></textarea>
            <script id="editor1" type="text/plain" style="width: 380px; height: 400px !important;"></script>
        </div>
        <p></p>
        <p>原文链接</p>
        <input style="width: 98%;" type="text" id="form_content_source_url"
               value="" onchange="changeElement('content_source_url')">
    </div>
</div>
<div class="layui-form-item" style="margin-top: 20px;">
    <div class="layui-input-block">
        <button class="layui-btn" style="margin-left: 300px;" onclick="save();">立即提交</button>
    </div>
</div>
<script>
    UE.Editor.prototype._bkGetActionUrl = UE.Editor.prototype.getActionUrl;
    UE.Editor.prototype.getActionUrl = function(action) {
        if (action == 'uploadimage' || action == 'uploadscrawl' || action == 'uploadimage') {
            return '<?php echo htmlentities($uploadImg); ?>';
        } else if (action == 'uploadvideo') {
            return 'video';
        }else if (action == 'listimage') {
            return "<?php echo url('getNewsMediaMeterial'); ?>";
        }
        else {
            return this._bkGetActionUrl.call(this, action);
        }
    }
    UE.getEditor('editor1').addListener("selectionchange", function () {
        changeElement('content');
    });
    var l_index;
    function changeElement(name) {
        var dir = $("#dir").attr('dir');
        if (name == 'show_cover_pic') {
            if ($("#form_" + name).prop("checked")) {
                var form_show_cover_pic = 1;
            } else {
                var form_show_cover_pic = 0;
            }
            $("#" + name + dir).val(form_show_cover_pic);
        } else if (name == 'content') {
            var content = UE.getEditor('editor1').getContent();
            $("#" + name + dir).val(content);
        } else {
            $("#" + name + dir).val($("#form_" + name).val());
        }
        if (name == 'title') {
            if ($("#form_" + name).val() == '') {
                $(".type3-title-" + dir).html('标题');
            } else {
                $(".type3-title-" + dir).html($("#form_" + name).val());
            }
        }
    }

    function edit(event, num) {
        $(".js-action").removeClass('action');
        $(event).addClass('action');
        $("#dir").attr('dir', num);
        var title = $("#title" + num).val();
        var author = $("#author" + num).val();
        var cover = $("#cover" + num).val();
        var show_cover_pic = $("#show_cover_pic" + num).val();
        var summary = $("#summary" + num).val();
        var content = $("#content" + num).val();
        var content_source_url = $("#content_source_url" + num).val();
        $("#form_title").val(title);
        $("#form_author").val(author);
        $("#imgLogo1").attr('src', '');
        if (cover != "") {
            $("#imgLogo1").attr('src', cover);
        }
        if (show_cover_pic == 1) {
            $("#form_show_cover_pic").prop("checked", "checked");
        } else {
            $("#form_show_cover_pic").prop("checked", "");
        }
        $("#form_summary").val(summary);
        UE.getEditor('editor1').setContent(content);
        $("#form_content_source_url").val(content_source_url);
    }

    function save() {

        var type = $("input[type='radio'][name='type']:checked").val();
        if (type == 1) {
            var title = $("#type1_desc").val();
            var content = '';
            if (title == '') {
                showMessage('error', '内容不能为空');
                return false;
            }
        } else if (type == 2) {
            var title = $("#title").val();
            var author = $("#author").val();
            var cover = $("#type2-img-hidden").val();
            if ($("#show_cover_pic").prop("checked")) {
                var show_cover_pic = 1;
            } else {
                var show_cover_pic = 0;
            }
            var summary = $("#desc").val();
            var content = UE.getEditor('editor').getContent();
            var content_source_url = $("#content_source_url").val();
            var contents = title + '`|`' + author + '`|`' + cover + '`|`' + show_cover_pic + '`|`' + summary + '`|`' + content + '`|`' + content_source_url;
            if (title == '') {
                showMessage('error', '标题不能为空');
                return false;
            } else if (cover == '') {
                showMessage('error', '请上传封面图片');
                return false;
            } else if (summary == '') {
                showMessage('error', '摘要不能为空');
                return false;
            } else if (content == '') {
                showMessage('error', '正文不能为空');
                return false;
            }
        } else if (type == 3) {
            var title = $("#title0").val();
            var contents = '';
            var num = $(".js-action").length;
            var lok=true;
            for (var i = 0; i < num; i++) {
                var content_new = '';
                $("input[name='hidden" + i + "']").each(function () {
                    if ($("input[name='hidden" + i + "']").eq(0).val() == "") {
                        showMessage('error', '第' + (i + 1) + '篇文章的标题不能为空');
                        lok=false;
                        return false;
                    } else if ($("input[name='hidden" + i + "']").eq(2).val() == "") {
                        showMessage('error', '第' + (i + 1) + '篇文章的封面图片不能为空');
                        lok=false;
                        return false;
                    } else if ($("input[name='hidden" + i + "']").eq(4).val() == "") {
                        showMessage('error', '第' + (i + 1) + '篇文章的摘要不能为空');
                        lok=false;
                        return false;
                    } else if ($("input[name='hidden" + i + "']").eq(5).val() == "") {
                        showMessage('error', '第' + (i + 1) + '篇文章的正文不能为空');
                        lok=false;
                        return false;
                    } else {
                        content_new = content_new + '`|`' + $(this).val();
                    }
                });
                content_new = content_new.substring(3);
                contents = contents + '`$`' + content_new;
            }
            contents = contents.substring(3);


        } else {
            showMessage('error', '请选择消息类型');
            return false;
        }
        if(lok==false){
            return false;
        }
        var load;
        $.ajax({
            type: "post",
            url: "<?php echo url('addNews'); ?>",
            async: true,
            data: {
                "type": type, "title": title, "content": contents
            },
            success: function (res) {
                layer.close(load);
                if (res.status == 1) {
                    layer.msg(res.msg,{time:2000},function () {
                        window.location.href="<?php echo url('newsList'); ?>";
                    });
                }
                if (res.status != 3){
                    layer.alert(res.msg)
                    return false;
                }
            },beforeSend:function(res){
                 load = layer.load(1);
                 return load;
            },error:function (res) {
                layer.close(load);
            }
        });
    }

    function showMessage(type, msg, url) {

        layer.alert(msg);
        return false;

    }

    $(".media-plus").click(
        function () {
            var num = $(this).parents(".media-left").find(
                ".media-body").length;
            if (num > 7) {
                showMessage('error', '最多只可以加入8条图文消息。');
                return false;
            }
            var html = '';
            html += '<div class="media-body js-action" onmouseover="show(this)" onmouseout="hide(this)" onclick="edit(this, ' + num + ')">';
            html += '<p class="type3-title-' + num + '">标题</p><div class="media-body-div"><img class="type3-img-' + num + '" src="" style="max-width:62px;max-height:62px;display:none;"><span class="img-text">缩略图</span></div>';
            html += '<div class="actions"><span class="edit">编辑</span><span class="del" onclick="removeMedia(this)">删除</span></div>';
            html += '<span class="editting">编辑中</span>';
            html += '<input type="hidden" name="hidden' + num + '" id="title' + num + '" value="">';
            html += '<input type="hidden" name="hidden' + num + '" id="author' + num + '" value="">';
            html += '<input type="hidden" name="hidden' + num + '" id="cover' + num + '" value="">';
            html += '<input type="hidden" name="hidden' + num + '" id="show_cover_pic' + num + '" value="0">';
            html += '<input type="hidden" name="hidden' + num + '" id="summary' + num + '" value="">';
            html += '<input type="hidden" name="hidden' + num + '" id="content' + num + '" value="">';
            html += '<input type="hidden" name="hidden' + num + '" id="content_source_url' + num + '" value="">';
            html += '</div>';
            $(this).parents(".media-left").find(".media-body").eq(num - 2).after(html);
        });


    function removeMedia(event) {
        $(event).parents(".media-body").remove();
    }

    function imgUpload(event, imgsrc, imghidden) {
        if (imghidden == 'cover') {
            var dir = $("#dir").attr('dir');
            imgsrc = imgsrc + dir;
            imghidden = imghidden + dir;
        }
        var fileid = $(event).attr("id");
        var str = $(event).next().attr("id");
        var url = 'UPLOAD_URL';
        var path = '';
        var result = '';
        var imgpath = "#img" + str;
        var imgval = "#" + str;

        var data = {'file_path': 'uploads/media/'};
        uploadFile(fileid, data, function (res) {
            if (res.code) {
                $("." + imgsrc).attr("src", res.data);
                $("." + imgsrc).show();
                $("." + imgsrc).next(".img-text").hide();
                $("#" + imghidden).val(res.data);
                $(imgpath).attr("src", res.data);
                $(imgval).val(res.data);
                showTip(res.message, "success");
            } else {
                showTip(res.message, "error");
            }
        });
    }

    $("#title").change(function () {
        if ($(this).val() == '') {
            $(this).parents(".media").find("h5.type-title").html('标题');
        } else {
            $(this).parents(".media").find("h5.type-title").html($(this).val());
        }
    });

    $("input[type=radio][name='type']").click(function () {
        var type = $(this).val();
        $(".type1").hide();
        $(".type2").hide();
        $(".type3").hide();
        $(".type" + type).show();
    });
    var ue = UE.getEditor('editor', {scaleEnabled: false});
    var ue1 = UE.getEditor('editor1', {scaleEnabled: false});

    function show(event) {
        $(event).children('.actions').show();
    }

    function hide(event) {
        $(event).children('.actions').hide();
    }

    var upload;
    layui.use('upload', function () {
        upload = layui.upload;
    });

    function uploadFile(fileid, data, callBack) {
        var dom = document.getElementById(fileid);
        var file = dom.files[0];
        $.ajaxFileUpload({
            url: "<?php echo url('Upload/uploaderMediaNewsImg'); ?>",
            secureuri: false,
            fileElementId: fileid,
            dataType: 'json',
            data: data,
            async: false,
            contentType: "text/json;charset=utf-8",
            success: function (res) {
                callBack.call(this, res);
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