<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="../index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="../index.html">首页</a></li>
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
                        <li><a href="<?php echo U('Designer/index');?>"><i class="icon-font">&#xe052;</i>设计师信息</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="../system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="../system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="../system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="../system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list">
                <i class="icon-font"></i>
                <a href="../index.html">首页</a>
                <span class="crumb-step">&gt;</span>
                <span class="crumb-name">职员管理</span>
            </div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/index.php/Admin/User/add" class="add"><i class="icon-font"></i>添加职员信息</a>
                        <a href="javascript:;" id="btnDel" class="del" ><i class="icon-font"></i>删除职员信息</a>
                        <a href="javascript:;" id="btnedit" class="edit"><i class="icon-font"></i>编辑职员信息</a>
                        <a href="/index.php/Admin/User/chart" class="count"><i class="icon-font"></i>职员信息统计图表</a>
                        <a href="javascript:;" class="check"><i class="icon-font"></i>审核信息</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <thead>
                        <tr>
                            <th class="operate">操作</th>
                            <th class="id">序号</th>
                            <th class="name">姓名</th>
                            <th class="nickname">昵称</th>
                            <th class="dept_id">所属部门</th>
                            <th class="sex">性别</th>
                            <th class="birthday">生日</th>
                            <th class="tel">电话</th>
                            <th class="email">邮箱</th>
                            <th class="addtime">添加时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td class="operate">
                                    <input type="checkbox" value="<?php echo ($vo["id"]); ?>"/>
                                </td>
                                <td class="id"><?php echo ($vo["id"]); ?></td>
                                <td class="name"><?php echo ($vo["username"]); ?></td>
                                <td class="nickname"><?php echo ($vo["nickname"]); ?></td>
                                <td class="dept_id"><?php echo ($vo["dept_name"]); ?></td>
                                <td class="sex"><?php echo ($vo["sex"]); ?></td>
                                <td class="birthday"><?php echo ($vo["birthday"]); ?></td>
                                <td class="tel"><?php echo ($vo["tel"]); ?></td>
                                <td class="email"><?php echo ($vo["email"]); ?></td>
                                <td class="addtime"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination ue-clear">
                    <div class="pagin-list">
                        <?php echo ($show); ?>
                    </div>
                    <div class="pxofy">显示第 1 条到 10 条记录，总共<?php echo ($count); ?>条记录</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript">
    $(".select-title").on("click",function(){
        $(".select-list").hide();
        $(this).siblings($(".select-list")).show();
        return false;
    })
    $(".select-list").on("click","li",function(){
        var txt = $(this).text();
        $(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
    })

    $("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

    showRemind('input[type=text], textarea','placeholder');
    //定义页面的载入事件
    $(function(){
        //给编辑按钮添加点击事件
        $('#btnedit').on('click',function(){
            //指定的事件处理程序
            var id = $(':checkbox:checked').val();	//获取复选框的值
            //跳转到编辑方法并且传递参数展示原有的信息
            window.location.href = '/index.php/Admin/User/edit/id/' + id;
        });

        //给删除按钮添加点击事件
        $('#btnDel').on('click',function(){
            //事件处理程序
            var ids = $(':checkbox:checked');	//获取全部被选中的复选框
            var id = '';	//空字符串，用于存储多个id
            for(var i = 0;i < ids.length;i++){
                id = id + ids[i].value + ',';	//拼接id字符串
            }
            //去除最后一个英文逗号
            id = id.substring(0,id.length-1);
            //跳转到删除方法，实现删除指定id的记录
            window.location.href = '/index.php/Admin/User/delUser/id/' + id;
        });
    });
</script>
</html>