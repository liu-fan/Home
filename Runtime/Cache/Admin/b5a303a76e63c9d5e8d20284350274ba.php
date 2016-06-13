<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="http://www.mycodes.net/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="#">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Furniture/furniture');?>"><i class="icon-font">&#xe008;</i>家居管理</a></li>
                        <li><a href="<?php echo U('Category/index');?>"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="<?php echo U('Dept/dept');?>"><i class="icon-font">&#xe005;</i>职位管理</a></li>
                        <li><a href="<?php echo U('User/showList');?>"><i class="icon-font">&#xe012;</i>用户管理</a></li>
                        <li><a href="<?php echo U('Age/index');?>"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>


    <!--/sidebar........华丽的分割线.....................-->

    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">商品分类管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('add');?>"><i class="icon-font"></i>新增分类</a>
                        <a href="javascript:;" id="btndel" ><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th> <input type="checkbox" value="" /></th>
                            <th>ID</th>
                            <th>分类</th> 
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($str)): $i = 0; $__LIST__ = $str;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
                            <td> <input type="checkbox" value="<?php echo ($vol["id"]); ?>" /></td>
                            <td><?php echo ($vol["id"]); ?></td>
                            <td>
                                <?php echo (str_repeat('&emsp;',$vol["level"] * 2)); ?>
                                <?php echo ($vol["name"]); ?>
                            </td>
                            <td>
                                <a href="/index.php/Admin/Category/del/ids/<?php echo ($vol["id"]); ?>" s>  删除</a>
                                <a href="/index.php/Admin/Category/edit/id/<?php echo ($vol["id"]); ?>" s> | 编辑</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="result-list">共 <?php echo ($count); ?> 条记录</div>
                    <div class="list-page"><?php echo ($show); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
<script type="text/javascript">
$(function(){
    $('#btndel').on('click',function(){
        var ids = $(':checkbox:checked');
        var id = '';
        for (var i = 0; i < ids.length; i++) {
            id = id + ids[i].value + ',';
        }
        id = id.substring(0,id.length-1);
        window.location.href = '/index.php/Admin/Category/del/ids/' + id;
    })

    $('.view').on('click',function(){
        var docID = $(this).attr('data');
        var docName = $(this).attr('data-name');
        layer.open({
        type: 2,
        title: "发信人：" + docName,
        shadeClose: true,
        shade: 0,
        area: ['550px', '90%'],
        content: '/index.php/Admin/Category/content/id/' + docID,
        });
    });
})
</script>
</html>