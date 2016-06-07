<?php
header('content-type:text/html;charset=utf-8');
define('APP_DEBUG', true );

//获取入口文件、站点根目录的工作目录地址
define('WORKING_PATH', str_replace("\\", '/', __DIR__));
//定义文件上传的存储目录
define('UPLOAD_ROOT_PATH', '/Public/Uploads/');


require './ThinkPHP/ThinkPHP.php';