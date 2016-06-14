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
                <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
                <ul class="navbar-list clearfix">
                    <li><a class="on" href="index.html">首页</a></li>
                    <li><a href="#" target="_blank">网站首页</a></li>
                </ul>
            </div>
            <div class="top-info-wrap">
                <ul class="top-info-list clearfix">
                    <li><a href="http://www.mycodes.net">管理员</a></li>
                    <li><a href="http://www.mycodes.net">修改密码</a></li>
                    <li><a href="http://www.mycodes.net">退出</a></li>
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
        <!--/sidebar-->
        <div class="main-wrap">

            <div class="crumb-wrap">
                <div class="crumb-list"><i class="icon-font"></i>
                    <a href="/jscss/admin/design/">首页</a>
                    <span class="crumb-step">&gt;</span>
                    <a class="crumb-name" href="/jscss/admin/design/">职员管理</a>
                    <span class="crumb-step">&gt;</span>
                    <span>新增职员</span>
                    <input class="btn btn6" onclick="history.go(-1)" value="返回上一页" type="button">
                    <a href="/index.php/Admin/User/showList" class="btn btn6">返回职员信息列表</a>
                </div>
            </div>

            <div class="result-wrap">
                <div class="result-content">

                    <form action="/index.php/Admin/User/addOk" method="post">
                        <table class="insert-tab" width="100%">
                            <tbody>
                                <tr>
                                    <th>用户名：</th>
                                    <td><input class="common-text" name="username" size="50"  type="text" /></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>头像：</th>
                                    <td><input name="smallimg" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                                </tr>
                                <tr>
                                    <th>密码：</th>
                                    <td><input class="common-text" name="password" size="50"  type="password" /></td>
                                </tr>
                                <tr>
                                    <th>昵称：</th>
                                    <td><input class="common-text" name="nickname" size="50"  type="text" /></td>
                                </tr>
                                <tr>
                                    <th>姓名：</th>
                                    <td><input class="common-text" name="truename" size="50"  type="text" /></td>
                                </tr>
                                <tr>
                                    <th width="120"><i class="require-red">*</i>所属部门：</th>
                                    <td>
                                        <select name="dept_id">
                                            <option value="-1">请选择</option>
                                            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo (str_repeat('&emsp;',$vo["level"]*2)); echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>性别：</th>
                                    <td>
                                        <input name="sex" type="radio" value="男" checked='checked' />男
                                        <input name="sex" type="radio" value="女" />女
                                    </td>
                                </tr>
                                <tr>
                                    <th>生日：</th>
                                    <td>
                                        <input name="birthday" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>联系电话：</th>
                                    <td><input class="common-text" name="tel" size="50"  type="text" /></td>
                                </tr>
                                <tr>
                                    <th>邮箱：</th>
                                    <td><input class="common-text" name="email" size="50"  type="email" /></td>
                                </tr>
                                <tr>
                                    <th>备注：</th>
                                    <td>
                                        <textarea name="remark" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <a href="javascript:;" class="btn btn-primary btn6 mr10" id='btnSubmit'>确定</a>
                                        <a href="javascript:;" class="btn btn-primary btn6 mr10" id='btnReset'>清空内容</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!--/main-->
    </div>
</body>
<script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript">
    $(function(){
        $('#btnSubmit').on('click',function(){
            $('form').submit();
        });

        $('#btnReset').on('click',function(){
            $('form')[0].reset();
        });
    });

    $(".select-title").on("click",function(){
        $(".select-list").toggle();
        return false;
    });
    $(".select-list").on("click","li",function(){
        var txt = $(this).text();
        $(".select-title").find("span").text(txt);
    });

    showRemind('input[type=text], textarea','placeholder');
</script>
</html>