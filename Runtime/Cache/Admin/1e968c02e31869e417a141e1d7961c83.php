<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LEFT后台管理</title>
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
                        <li><a href="<?php echo U('Designer/index');?>"><i class="icon-font">&#xe052;</i>设计师信息</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">message管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="<?php echo U('index');?>" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择查询选项:</th>
                            <td>
                                <select name="sort" >
                                    <option value="0">全选</option>
                                    <option value="name">发信人</option>
                                    <option value="email">Email</option>
                                    <option value="tel">电话</option>    
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="javascript:;" id="btndel" ><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th> <input type="checkbox" value="" /></th>
                            <th>ID</th>
                            <th>发信人</th>
                            <th>Email</th>
                            <th>信息内容</th>
                            <th>电话</th>
                            <th>发信时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($str)): $i = 0; $__LIST__ = $str;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
                            <td> <input type="checkbox" value="<?php echo ($vol["id"]); ?>" /></td>
                            <td><?php echo ($vol["id"]); ?></td>
                            <td><?php echo ($vol["name"]); ?></td>
                            <td><?php echo ($vol["email"]); ?></td>
                            <td><?php echo (msubstr(htmlspecialchars_decode(html_entity_decode($vol["message"])),0,20)); ?></td>
                            <td><?php echo ($vol["tel"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vol["addtime"])); ?></td>
                            <td>
                                <?php if($vol["isread"] == 1): ?><a href="/index.php/Admin/Age/edit/id/<?php echo ($vol["id"]); ?>/isread/1" style="color: red" >未回复</a><?php endif; ?>
                                <?php if($vol["isread"] == 2): ?><a href="/index.php/Admin/Age/edit/id/<?php echo ($vol["id"]); ?>/isread/2" style="color: green" >已回复</a><?php endif; ?>
                            </td>
                            <td>

                                <a href ='javascript:;' class="view" data="<?php echo ($vol["id"]); ?>" data-name="<?php echo ($vol["name"]); ?>">查看</a>
                                <a href="/index.php/Admin/Age/del/ids/<?php echo ($vol["id"]); ?>" s>删除</a>
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
        window.location.href = '/index.php/Admin/Age/del/ids/' + id;
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
        content: '/index.php/Admin/Age/content/id/' + docID,
        });
    });

})
</script>
</html>