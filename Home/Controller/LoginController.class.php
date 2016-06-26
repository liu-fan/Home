<?php
/**
 * Created by PhpStorm.
 * author: 刘帆
 * Date: 2016/6/25
 * Time: 9:16
 */

namespace Home\Controller;


use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {
        if(IS_POST){
            $url = U('Admin/Index/index');
            echo $url;
            header("location:$url");
        }else{
            $this->display();
        }

    }
}