<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert title here</title>
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script>
    function Jumppage(page){
        var pagesize = 20;
        var url = '/index.php/Admin/Furniture/text';
        $("<div></div>").load(url,{page:page,pagesize:pagesize},function(){

            var data = $(this).find("#tablelist").html();
            $('#tablelist').html(data);
            $(this).remove();
        });


    }
    </script>
</head>
<body>
    <!-- 页码 -->
    <div id="pages">
        <?php $__FOR_START_31759__=1;$__FOR_END_31759__=$pagenum;for($i=$__FOR_START_31759__;$i < $__FOR_END_31759__;$i+=1){ ?> <span><a onclick="Jumppage(<?php echo ($i); ?>);" href="#"><?php echo ($i); ?></a></span>   <?php } ?>
    </div>
    <!-- 内容 -->
    <div id="tablelist">
        <table border=1>
            <tr>
                    <td>uid</td>
                    <td>名称</td>
                </tr>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>            <tr>
                    <td><?php echo ($user["uid"]); ?></td>
                    <td><?php echo ($user["username"]); ?></td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
</body>
</html>