<?php /*a:1:{s:56:"D:\wamp\www\rhaphp-master\themes/pc/mp/material\syc.html";i:1537234068;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        #progress{
            width: 96%;
            height: 30px;
            border:1px solid #ccc;
            border-radius: 15px;
            margin: 50px 10px 0 10px;
            overflow: hidden;
            box-shadow: 0 0 5px 0px #ddd inset;
        }

        #progress span {
            display: inline-block;
        width: <?php echo htmlentities($jdtCss); ?>;
        height: 100%;
        background: #2989d8; /* Old browsers */
        background: -moz-linear-gradient(45deg, #2989d8 33%, #7db9e8 34%, #7db9e8 59%, #2989d8 60%); /* FF3.6+ */
        background: -webkit-gradient(linear, left bottom, right top, color-stop(33%,#2989d8), color-stop(34%,#7db9e8), color-stop(59%,#7db9e8), color-stop(60%,#2989d8)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(45deg, #2989d8 33%,#7db9e8 34%,#7db9e8 59%,#2989d8 60%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(45deg, #2989d8 33%,#7db9e8 34%,#7db9e8 59%,#2989d8 60%); /* Opera 11.10+ */
        background: -ms-linear-gradient(45deg, #2989d8 33%,#7db9e8 34%,#7db9e8 59%,#2989d8 60%); /* IE10+ */
        background: linear-gradient(45deg, #2989d8 33%,#7db9e8 34%,#7db9e8 59%,#2989d8 60%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2989d8', endColorstr='#2989d8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        background-size: 60px 30px;
        text-align: center;
        color:#fff;
        line-height: 30px;

        }
    </style>
</head>
<body>
<div id="progress">
    <span><?php echo htmlentities($text); ?></span>
</div>
<script language="javascript" type="text/javascript">
    <?php if($url != ''): ?>
    window.location.href="<?php echo htmlentities($url); ?>";
    <?php endif; ?>
</script>
</html>