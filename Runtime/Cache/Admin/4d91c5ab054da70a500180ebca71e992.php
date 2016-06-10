<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
    <script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Home/Index/index');?>" target="_blank">网站首页</a></li>
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
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">职位管理</span></div>
        </div>
        <!--<div class="search-wrap">-->
            <!--<div class="search-content">-->
                <!--<form action="<?php echo U('search');?>" method="post">-->
                    <!--<table class="search-tab">-->
                        <!--<tr>-->
                            <!--<th width="120">选择分类:</th>-->
                            <!--<td>-->
                                <!--<select name="search-sort" >-->
                                    <!--<option value="">全部</option>-->
                                    <!--<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                    <!--<option value="<?php echo ($vo["id"]); ?>"><?php echo (str_repeat('&emsp;',$vo["level"]*2)); echo ($vo["name"]); ?></option>-->
                                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                <!--</select>-->
                            <!--</td>-->
                            <!--<th width="70">关键字:</th>-->
                            <!--<td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>-->
                            <!--<td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>-->
                        <!--</tr>-->
                    <!--</table>-->
                <!--</form>-->
            <!--</div>-->
        <!--</div>-->
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('add');?>"><i class="icon-font"></i>新增部门</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>部门名称</th>
                            <th>父级部门</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><a target="_blank" href="#" title=""><?php echo ($vo["name"]); ?></a></td>
                            <td><?php echo ($vo["pname"]); ?></td>
                            <td>
                                <a class="link-del" href="javascript:;" data="<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-update"  href="javascript:;" data="<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
    $('.link-update').on('click',function(){
        var id = $(this).attr('data');
        console.log(id);
         window.location.href = '/index.php/Admin/Dept/del/id/' +id;
    });
    $('#batchDel').on('click',function(){
        var ids = $(":checkbox:checked");
        var id = '';
        for(var i=0;i<ids.length;i++){
            id = id +ids[i].value + ',';
        }
        id = id.substring(0,id.length-1);
        console.log(id);
        window.location.href = '/index.php/Admin/Dept/del/id/' +id;
    });
    $('.link-del').on('click',function(){
        var id = $(this).attr('data');
        console.log(id);
        window.location.href = '/index.php/Admin/Dept/edit/id/' +id;

    });
});

</script>
</html>