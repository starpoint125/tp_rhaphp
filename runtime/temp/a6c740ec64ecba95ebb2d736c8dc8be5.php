<?php /*a:2:{s:65:"D:\wamp\www\rhaphp-master/application/install/view/index\sql.html";i:1537234068;s:67:"D:\wamp\www\rhaphp-master/application/install/view/public\base.html";i:1537234068;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RhaPHP系统安装</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="/public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="/public/static/jquery/jquery-1.9.1.min.js"></script>
<style>
body{font-family: "Microsoft Yahei",'新宋体';}
.container{background: #ffffff; margin: 50px auto; padding: 20px 0; width: 1024px;}
.header-title{border-bottom: 1px solid #dedede; margin-bottom: 10px;}
.progress-tool{padding: 10px;}
.progress{height: 30px;}
.progress-bar{line-height: 30px; font-size: 14px;}
.article{padding: 0 20px;}
h1{font-size: 18px; color: #333333; font-weight: bold;}
h2{font-size: 16px; color: #333333; font-weight: bold;}
</style>
</head>

<body style="background:  rgb(230, 234, 234)">
<div class="container">
	<div class="margin">
		<div class="text-center header-title margin-top">
			<h1>RhaPHP系统<?php if(session('update')): ?>升级<?php else: ?>安装<?php endif; ?></h1>
		</div>
		<div class="progress-tool">
			<div class="progress">
				<div class="progress-bar progress-bar-<?php echo htmlentities($status['index']); ?> progress-bar-striped" style="width: 20%">
					<span>系统安装</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo htmlentities($status['check']); ?> progress-bar-striped" style="width: 20%">
					<span>环境检查</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo htmlentities($status['config']); ?> progress-bar-striped" style="width: 20%">
					<span>系统配置</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo htmlentities($status['sql']); ?> progress-bar-striped" style="width: 20%">
					<span>数据库安装</span>
				</div>
				<div class="progress-bar progress-bar-<?php echo htmlentities($status['complete']); ?> progress-bar-striped" style="width: 20%">
					<span>安装完成</span>
				</div>
			</div>
		</div>
		<div class="article margin-top">
			
<h1 class="text-center">安装数据库</h1>
<div id="show-list" class="install-database list-group" style="height:250px; overflow-y:auto; ">
</div>
<script type="text/javascript">
	var list   = document.getElementById('show-list');
	function showmsg(msg, classname){
		var li = document.createElement('p'); 
		li.innerHTML = msg;
		classname && li.setAttribute('class', 'list-group-item text-' + classname);
		list.appendChild(li);
		document.scrollTop += 30;
	}
</script>


			<div class="margin-top">
				
<div class="text-center">
	<button class="btn btn-warning disabled">正在安装，请稍候...</button>
</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>